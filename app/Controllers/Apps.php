<?php

namespace App\Controllers;

class Apps extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
        $this->mainUrl = 'Apps';
    }

    public function index()
    {
        $data['title'] = "Home";
        $data['url'] = $this->mainUrl;
        $data['child'] = "";
        return view('Apps/index', $data);
    }

    public function participant($id)
    {
        if ($id != 0) {
            $data['title'] = "Home";
            $data['url'] = $this->mainUrl;
            $data['child'] = "Participant";
            $data['id'] = $id;
            return view('Apps/participant', $data);
        } else {
            return redirect()->to('Apps');
        }
    }

    public function prize($id)
    {
        if ($id != 0) {
            $data['title'] = "Home";
            $data['url'] = $this->mainUrl;
            $data['child'] = "Prize";
            $data['id'] = $id;
            return view('Apps/prize', $data);
        } else {
            return redirect()->to('Apps');
        }
    }

    public function play($id)
    {
        if ($id != 0) {
            $prize = $this->eventPrize->get($id);
            $data['title'] = "Home";
            $data['url'] = $this->mainUrl;
            $data['child'] = "Hadiah " . $prize[0]['prize'];
            $data['count'] = $prize[0]['count'];
            $data['id'] = $id;
            return view('Apps/play', $data);
        } else {
            return redirect()->to('Apps');
        }
    }

    public function winner($id)
    {
        if ($id != 0) {
            $data['title'] = "Home";
            $data['url'] = $this->mainUrl;
            $data['child'] = "Prize";
            $data['id'] = $id;
            return view('Apps/winner', $data);
        } else {
            return redirect()->to('Apps');
        }
    }
}
