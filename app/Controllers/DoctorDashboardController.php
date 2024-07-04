<?php

namespace App\Controllers;

class DoctorDashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard/doctor');
    }
}
