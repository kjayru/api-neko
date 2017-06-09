<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Role;
class RoleController extends ApiController
{
    
    public function index()
    {
        $roles = Role::has('roles')->get();
        return $this->showAll($roles);
    }

   
    public function show(Role $role)
    {
        return $this->showOne($role);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'role' => 'required',
           
        ];
        $this->validate($request, $rules);

        $newRole = Role::create($request->all());

        return $this->showOne($newRole,201);
    }

}