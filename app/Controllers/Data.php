<?php

use App\Models\ServersideModel;

namespace App\Controllers;

class Data extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
        $this->mainUrl = 'Auth';
    }

    public function event()
    {
        $request = \Config\Services::request();
        $list_data = $this->serversideModel;
        $where = 'deleted_at IS NULL';
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array(NULL, 'event_id_list', 'event_code', 'name', 'date', 'auth_key', 'status');
        $column_search = array('event_id_list', 'event_code', 'name', 'date', 'auth_key', 'status');
        $order = array('event_id_list' => 'asc');
        $list = $list_data->get_datatables('event_list', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");

        foreach ($list as $lists) {
            $no++;
            if ($lists->status == '1') {
                $stats = '<span class="float-center label label-success">Aktif</span>';
            } else {
                $stats = '<span class="float-center label label-danger">Non Aktif</span>';
            }

            $row    = array();
            $row[] = $no;
            $row[] = $lists->event_code;
            $row[] = $lists->name;
            $row[] = date('d F Y', strtotime($lists->date));
            $row[] = $stats;
            $row[] = '
            <a href="' . base_url('Apps/participant/' . $lists->event_id_list) . '">
            <button class="btn btn-outline btn-primary btn-sm dim" type="button"><i class="fa fa-address-book-o"></i></button>
            </a>
            <a href="' . base_url('Apps/prize/' . $lists->event_id_list) . '">
            <button class="btn btn-outline btn-info btn-sm dim" type="button"><i class="fa fa-gift"></i></button>
            </a>
            <button class="btn btn-outline btn-warning btn-sm dim" type="button"><i class="fa fa-edit" onclick="edit(' . $lists->event_id_list . ')"></i></button>
            <button class="btn btn-outline btn-danger btn-sm dim" type="button"><i class="fa fa-trash" onclick="die(' . $lists->event_id_list . ')"></i></button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('event_list', $where),
            "recordsFiltered" => $list_data->count_filtered('event_list', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
    }

    public function prize($id)
    {
        $request = \Config\Services::request();
        $list_data = $this->serversideModel;
        $where = 'event_id_list=' . $id . ' AND deleted_at IS NULL';
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array(NULL, 'event_id_prize', 'event_id_list', 'prize', 'count', 'status');
        $column_search = array('event_id_prize', 'event_id_list', 'prize', 'count', 'status');
        $order = array('event_id_prize' => 'asc');
        $list = $list_data->get_datatables('event_prize', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");

        foreach ($list as $lists) {
            $no++;
            if ($lists->status == '1') {
                $stats = '<span class="float-center label label-success">Aktif</span>';
            } else {
                $stats = '<span class="float-center label label-danger">Non Aktif</span>';
            }

            $row    = array();
            $row[] = $no;
            $row[] = $lists->prize;
            $row[] = $lists->count;
            $row[] = $stats;
            $row[] = '
            <a href="' . base_url('Apps/play/' . $lists->event_id_prize) . '" target="blank">
            <button class="btn btn-outline btn-success btn-sm dim" type="button"><i class="fa fa-play-circle-o"></i></button>
            </a>
            <a href="' . base_url('Apps/winner/' . $lists->event_id_prize) . '" target="blank">
            <button class="btn btn-outline btn-primary btn-sm dim" type="button"><i class="fa fa-id-card-o"></i></button>
            </a>
            <button class="btn btn-outline btn-warning btn-sm dim" type="button"><i class="fa fa-edit" onclick="die(' . $lists->event_id_prize . ')"></i></button>
            <button class="btn btn-outline btn-danger btn-sm dim" type="button"><i class="fa fa-trash" onclick="die(' . $lists->event_id_prize . ')"></i></button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('event_prize', $where),
            "recordsFiltered" => $list_data->count_filtered('event_prize', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
    }

    public function participant($id)
    {
        $request = \Config\Services::request();
        $list_data = $this->serversideModel;
        $where = 'event_id_list=' . $id . ' AND deleted_at IS NULL';
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array(NULL, 'mt_id_participant', 'name', 'units', 'alias', 'type', 'status');
        $column_search = array('mt_id_participant', 'name', 'units', 'alias', 'type', 'status');
        $order = array('mt_id_participant' => 'asc');
        $list = $list_data->get_datatables('v_participant', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");

        foreach ($list as $lists) {
            $no++;

            $row    = array();
            $row[] = $no;
            $row[] = $lists->name;
            $row[] = $lists->alias;
            $row[] = $lists->status;
            $row[] = $lists->type;
            $row[] = '
            <button class="btn btn-outline btn-warning btn-sm dim" type="button"><i class="fa fa-edit" onclick="die(' . $lists->mt_id_participant . ')"></i></button>
            <button class="btn btn-outline btn-danger btn-sm dim" type="button"><i class="fa fa-trash" onclick="die(' . $lists->mt_id_participant . ')"></i></button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('v_participant', $where),
            "recordsFiltered" => $list_data->count_filtered('v_participant', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
    }

    public function winner($id)
    {
        $request = \Config\Services::request();
        $list_data = $this->serversideModel;
        $where = 'event_id_prize=' . $id;
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array(NULL, 'mt_id_participant', 'name', 'alias', 'prize', 'status');
        $column_search = array('mt_id_participant', 'name', 'alias', 'prize', 'status');
        $order = array('name' => 'asc');
        $list = $list_data->get_datatables('v_winner', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");

        foreach ($list as $lists) {
            $no++;
            if ($lists->status == '1') {
                $stats = '<span class="float-center label label-success">Aktif</span>';
            } else {
                $stats = '<span class="float-center label label-danger">Non Aktif</span>';
            }

            $row    = array();
            $row[] = $no;
            $row[] = $lists->name;
            $row[] = $lists->alias;
            $row[] = $lists->units;
            $row[] = $lists->prize;
            $row[] = $stats;
            $row[] = '
            <button class="btn btn-outline btn-danger btn-sm dim" type="button"><i class="fa fa-trash" onclick="die(' . $lists->event_id_prize . ')"></i></button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('v_winner', $where),
            "recordsFiltered" => $list_data->count_filtered('v_winner', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
    }
}
