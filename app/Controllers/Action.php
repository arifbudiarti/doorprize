<?php

namespace App\Controllers;

class Action extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
        $this->mainUrl = 'Auth';
    }

    public function event($act, $id = null)
    {
        if ($act == 1) { //insert 
            $data = array(
                'name' => $this->request->getPost('event'),
                'date' => date('Y-m-d', strtotime($this->request->getPost('date'))),
                'status' => 1,
                'auth_key' => 1,
                'event_code' => date('ymHis'),
            );
            $status = $this->eventList->insert($data);
        } elseif ($act == 2) { //update
            $id = $this->request->getPost('event_id_list');
            $data = array(
                'event_id_list' => $this->request->getPost('event_id_list'),
                'name' => $this->request->getPost('event'),
                'date' => $this->request->getPost('date'),
            );
            $status = $this->eventList->update($id, $data);
        } else {
            $status = $this->eventList->where('event_id_list', $id)->delete();
        }

        if ($status) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function prize($act, $id = null)
    {
        if ($act == 1) { //insert 
            $data = array(
                'prize' => $this->request->getPost('prize'),
                'count' => $this->request->getPost('qty'),
                'event_id_list' => $this->request->getPost('id'),
                'status' => 1,
            );
            $status = $this->eventPrize->insert($data);
        } elseif ($act == 2) { //update
            $id = $this->request->getPost('event_id_prize');
            $data = array(
                'event_id_prize' => $this->request->getPost('event_id_prize'),
                'prize' => $this->request->getPost('prize'),
                'event_id_list' => $this->request->getPost('id'),
            );
            $status = $this->eventPrize->update($id, $data);
        } else {
            $status = $this->eventPrize->where('event_id_prize', $id)->delete();
        }

        if ($status) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    function getNomor()
    {
        $data = array();
        $i = 0;
        $get  = $this->db1->query("SELECT * FROM v_doorprize")->getResultArray();
        //print_r($get);
        for ($i = 0; $i < sizeof($get); $i++) {
            $data[$i]['id'] = $get[$i]['id_participant'];
            $data[$i]['units'] = $get[$i]['id_units'];
            $data[$i]['name'] = $get[$i]['name'];
            $data[$i]['status'] = $get[$i]['status_participant'];
            $data[$i]['alias'] = $get[$i]['alias'];
        }
        echo json_encode($data);
    }

    function pushNomor($eventId)
    {
        $id = $this->request->getPost('id');
        $ids = explode(',', $id);
        print_r($ids);

        for ($i = 0; $i < sizeof($ids); $i++) {
            $data = array(
                'mt_id_participant' => $ids[$i],
                'event_id_prize' => $eventId,
                'status' => 1,
            );
            print_r($data);
            $this->doorprize->insert($data);
        }
        //update prize event
        $edit = array('status' => NULL);
        $this->eventPrize->update($eventId, $edit);
    }

    function delNomor($eventId)
    {
        $status = $this->db1->query("DELETE FROM tc_doorprize WHERE event_id_prize=" . $eventId);
        //update prize event
        $edit = array('status' => 1);
        $this->eventPrize->update($eventId, $edit);

        echo json_encode($status);
    }

    function delPrize($id)
    {
    }
}
