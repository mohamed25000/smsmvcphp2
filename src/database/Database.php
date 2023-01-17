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


    public function query($query,$data = array(),$data_type = "object")
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

    protected function create(array $data)
    {
        return $this->manager->create($data);
    }

}