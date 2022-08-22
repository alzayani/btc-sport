<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.dashboard');
    }

    public function page()
    {
        return view('admin');
    }

    public function pageStore(Request $request)
    {
        return $request;
    }

    public function store(Request $request)
    {
        return $request;
    }
}
