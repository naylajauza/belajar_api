<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\AuthenticatesUsers;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
   use AuthenticatesUsers;

   public function __construct()
   {
    $this->middleware('guest')->except('logout');
    $this->middleware('auth')->only('logout');
   }
}
