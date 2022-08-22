<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdministrationController extends Controller
{
    public function index()
    {
        $members = User::with('profile')->where('user_type', 'member')->get();

        return view('backend.administration.index', compact('members'));
    }

}
