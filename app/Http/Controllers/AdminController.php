<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(){
    $usuario = Auth::User();
    $role_id=$usuario->role_id;
    if($role_id==1){
     return redirect('/');
    }else{
     return redirect('/homeAdmin');
    }
    }
}
