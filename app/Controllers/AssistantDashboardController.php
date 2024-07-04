<?php

namespace App\Controllers;

class AssistantDashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard/assistant');
    }
}
