<?php

namespace App\models;

class School extends Model
{
    protected $allowedColumns = [
        'school',
        'date',
    ];

    protected $beforeInsert = [
        'make_user_id',
        'make_school_id',
    ];

    protected $afterSelect = [
        'get_user',
    ];

    public function make_user_id($data)
    {
        if(isset($_SESSION["USER"]['user_id'])) {
            $data['user_id'] = $_SESSION["USER"]['user_id'];
        }
        return $data;
    }

    public function make_school_id($data)
    {
        $data['school_id'] = random_string(60);
        return $data;
    }

    public function get_user($data)
    {
        $user = new User();

        foreach ($data as $key => $row) {
            // code...

            $result = $user->where('*', User::getTableName(), ['user_id', '=', $row['user_id']]);

            $data[$key]['user'] = is_array($result) ? $result[0] : false;

        }

        return $data;
    }

}