<?php

namespace smsmvcphp2\validation;

use smsmvcphp2\validation\rules\contract\Rule;

class Validator
{
    protected array $data = [];
    protected array $rules = [];
    protected array $aliases = [];
    protected ErrorBag $errorBag;

    public function make($data)
    {
        $this->data = $data;
        $this->errorBag = new ErrorBag();
        $this->validate();
    }

    public function validate()
    {
        foreach($this->rules as $field => $rules) {
            foreach (RulesResolver::make($rules) as $rule) {
                $this->applyRule($field, $rule);
            }
        }
    }

    public function getFieldValue($field)
    {
        return $this->data[$field] ?? null;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    public function passes()
    {
        return empty($this->errors());
    }

    public function errors($key = null)
    {
        return $key ? $this->errorBag->errors[$key] : $this->errorBag->errors;
    }

    public function alias($field)
    {
        return $this->aliases[$field] ?? $field;
    }

    public function setAliases(array $aliases)
    {
        $this->aliases = $aliases;
    }

    protected function applyRule($field, Rule $rule)
    {
        if(!$rule->apply($field, $this->getFieldValue($field), $this->data)) {
            $this->errorBag->add($field, Message::generate($rule, $field));
        }
    }

}