<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MembershipController extends Controller
{


    public function index()
    {
        $members = User::with('profile','nationality')->where('user_type', 'member')->get();
        return view('backend.member.index', compact('members'));
    }
}
