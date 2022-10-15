<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function readAll()
    {
        echo $this->helloLaravel();
        return "Read All Students";
    }

    public function read($id)
    {
        echo $this->helloLaravel();
        return "Read Single Student With ID : " . $id;
    }

    public function create(Request $request)
    {

        echo $this->helloLaravel();
        foreach ($request->input() as $key => $value) {
            echo $key . '=>' . $value . "<br>";
        }
        return "Create New Student";
    }

    public function update(Request $request, $id)
    {
        echo $this->helloLaravel();
        foreach ($request->input() as $key => $value) {
            echo $key . '=>' . $value . "<br>";
        }
        return "Update Single Student With ID : " . $id;
    }

    public function delete($id)
    {
        echo $this->helloLaravel();
        return "Delete Single Student With ID : " . $id;
    }

    private function helloLaravel()
    {
        return "Hello Laravel! <br>";
    }
}
