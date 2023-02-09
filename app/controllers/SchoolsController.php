<?php

namespace App\controllers;

use App\models\Auth;
use App\models\School;
use smsmvcphp2\validation\Validator;
use smsmvcphp2\views\View;

class SchoolsController extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $school = new School();

        $data = $school->all( School::getTableName());

        View::make('schools', ['rows' => $data]);
    }

    public function add()
    {
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Schools', 'schools'];
        $crumbs[] = ['Add', 'schools/add'];
        View::make('addschool', [
            'crumbs' => $crumbs,
        ]);
    }

    public function store()
    {
        // code...
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $data = $_POST;

        $validator = new Validator();
        $validator->setRules([
            'school' => 'required|al'
        ]);

        $validator->make($data);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Schools', 'schools'];
        $crumbs[] = ['Add', 'schools/add'];

        if(!$validator->passes()) {
            $errors = $validator->errors();
            View::make("addschool", [
                'errors' => $errors,
                'crumbs' => $crumbs
            ]);

            return;
        }

        $school = new School();
        $school->insert($data, School::getTableName());
        $this->redirect('schools');
        /*View::make('addschool', [
            'crumbs' => $crumbs,
        ]);*/
    }

    public function edit()
    {
        View::make('editschool');
    }

    public function delete()
    {
        View::make('deleteschool*');
    }

}