<?php

namespace smsmvcphp2\database;

use PDO;
use smsmvcphp2\database\concerns\ConnectTo;
use smsmvcphp2\database\managers\contracts\DatabaseManager;

class Database
{
    protected DatabaseManager $manager;

    /**
     */
    public function __construct($manager)
    {
        $this->manager = $manager;
    }

    public function init()
    {
        return ConnectTo::connect($this->manager);
    }


    protected function query($query,$data = array(),$data_type = "object")
    {

        $con = $this->init();
        $stm = $con->prepare($query);

        if($stm){
            $check = $stm->execute($data);
            if($check){
                if($data_type == "object"){
                    $data = $stm->fetchAll(PDO::FETCH_OBJ);
                }else{
                    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                }

                if(is_array($data) && count($data) >0){
                    return $data;
                }
            }
        }
        return false;
    }

    protected function create(array $data, $table)
    {
        return $this->manager->create($data, $table);
    }

    public function update($id, array $attributes)
    {
        return $this->manager->update($id, $attributes);
    }

    protected function delete($id)
    {
        return $this->manager->delete($id);
    }

    protected function read($columns, $table, $filter = null)
    {
        return $this->manager->read($columns, $table, $filter);
    }

    protected function raw($query, $value = [])
    {
        return $this->manager->query($query, $value);
    }

    public function __call(string $name, array $arguments)
    {
        if(method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        }
    }

}