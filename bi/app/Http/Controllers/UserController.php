<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;
use Excel;

class UserController extends Controller
{
    public function importForm()
    {
        return view('import_form');
    }

    public function import(Request $request)
    {
        Excel::import(new UserImport, $request->file);
        return 'success';
    }
}
