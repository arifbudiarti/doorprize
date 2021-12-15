<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
        $this->mainUrl = 'Home';
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        //$data['modules'] = $this->modulesModel->getModules();
        $data['url'] = $this->mainUrl;
        $data['child'] = "";
        return view('index', $data);
    }
}
