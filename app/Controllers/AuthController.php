<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PatientModel;
use App\Models\SystemStatusModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function authenticate()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();
        $systemStatusModel = new SystemStatusModel();
        $status = $systemStatusModel->getStatus();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'user_role' => $user['role'],
                'username' => $user['username']
            ]);

            // Log session values for debugging
            log_message('debug', 'User ID: ' . session()->get('user_id'));
            log_message('debug', 'User Role: ' . session()->get('user_role'));

            if ($status == 'down' && $user['role'] != 'admin') {
                session()->setFlashdata('notification', 'Website is down');
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('notification', 'Login successful');
                return redirect()->to('/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function createAccount()
    {
        $userModel = new UserModel();
        $patientModel = new PatientModel();

        $userData = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'patient'
        ];

        $userModel->insert($userData);
        $userId = $userModel->getInsertID();

        $patientData = [
            'id' => $userId,
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address')
        ];

        $patientModel->insert($patientData);

        return redirect()->to('/login')->with('message', 'Account created successfully. Please log in.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
