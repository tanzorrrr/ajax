<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function insert()
    {
        Role::insert(['role_name'=>'user']);
    }

    public function read($id)
    {
        $role = Role::find($id);
        dump($role);
    }

    public function readAll()
    {
        $roles = Role::all();

        return view('role',compact('roles'));
    }
}
