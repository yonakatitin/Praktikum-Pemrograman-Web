<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function index()
    {
        // mengambil data dari table users
        // $users = DB::table('users')->get();

        $users = User::latest() 
                ->orderBy('name', 'asc')
                ->get();
 
        return view('dashboard',['users' => $users]);
 
    }
}
