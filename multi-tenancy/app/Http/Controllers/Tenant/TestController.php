<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant\User;
use App\Models\Tenant\Department;

class TestController extends Controller
{
    public function index() {
        $departments = Department::all();
        return $departments;
    }

    public function store() {
        $department = new Department;
        $department->name = 'department1';
        $department->save();
        
        return 'success';
    }

}
