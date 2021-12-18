<?php

namespace App\Controllers;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
        $this->mainUrl = 'Auth';
    }

    public function index()
    {
        $data['title'] = 'Login';
        return view('Auth/index', $data);
        //return view('pages/auth/login');
    }

    public function authIn()
    {
        return redirect()->to(base_url('Apps'));
    }

    public function authOut()
    {
        return redirect()->to(base_url('Apps'));
    }

    public function users()
    {
        $data['title'] = "Users";
        $data['url'] = $this->mainUrl;
        $data['child'] = "";
        $data['menu'] = getMenu();
        return view('pages/auth/users', $data);
        //return view('pages/auth/login');
    }
}
