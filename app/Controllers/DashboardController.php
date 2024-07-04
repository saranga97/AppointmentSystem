<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $role = session()->get('user_role');
        switch ($role) {
            case 'doctor':
                return view('dashboard/doctor');
            case 'admin':
                return view('dashboard/admin');
            case 'assistant':
                return view('dashboard/assistant');
            default:
                return view('dashboard/patient');
        }
    }
}
