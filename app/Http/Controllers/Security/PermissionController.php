<?php

namespace App\Http\Controllers\security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index(){
        dd('prueba');
        $permissions = Permission::select('id', 'name');
        return $permission;
    }
}
