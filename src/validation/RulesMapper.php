<?php

namespace smsmvcphp2\validation;

use smsmvcphp2\validation\rules\AlnumRule;
use smsmvcphp2\validation\rules\AlRule;
use smsmvcphp2\validation\rules\BetweenRule;
use smsmvcphp2\validation\rules\EmailRule;
use smsmvcphp2\validation\rules\GenderRule;
use smsmvcphp2\validation\rules\MatchRule;
use smsmvcphp2\validation\rules\MaxRule;
use smsmvcphp2\validation\rules\RankRule;
use smsmvcphp2\validation\rules\RequiredRule;
use smsmvcphp2\validation\rules\UniqueRule;

trait RulesMapper
{
    protected static array $map = [
        'required' => RequiredRule::class,
        'alnum' => AlnumRule::class,
        "max" => MaxRule::class,
        "between" => BetweenRule::class,
        "email" => EmailRule::class,
        "rank" => RankRule::class,
        "match" => MatchRule::class,
        'unique' => UniqueRule::class,
        'gender' => GenderRule::class,
        'al' => AlRule::class,
    ];

    public static function resolve(string $rule, $options)
    {
        return new static::$map[$rule](...$options);
    }
}