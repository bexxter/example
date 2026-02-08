<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Car extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('car_model');
        $this->load->model('clients_model');

        if (!has_permission('car', '', 'view')) {
            access_denied('car');
        }
    }

    public function index()
    {
        $data['cars'] = $this->car_model->get();
        $data['client_lookup'] = $this->build_client_lookup();
        $data['title'] = _l('car_list');
        $this->load->view('property/list', $data);
    }

    public function add()
    {
        if (!has_permission('car', '', 'create')) {
            access_denied('car');
        }

        if ($this->input->post()) {
            $data = $this->input->post();
            $this->car_model->add($data);
            set_alert('success', _l('car_added_success'));
            redirect(admin_url('car'));
        }

        $data['clients'] = $this->clients_model->get();
        $data['title'] = _l('add_car');
        $this->load->view('property/add', $data);
    }

    public function edit($id)
    {
        if (!has_permission('car', '', 'edit')) {
            access_denied('car');
        }

        $car = $this->car_model->get($id);
        if (!$car) {
            show_404();
        }

        if ($this->input->post()) {
            $data = $this->input->post();
            $this->car_model->update($id, $data);
            set_alert('success', _l('car_updated_success'));
            redirect(admin_url('car'));
        }

        $data['car'] = $car;
        $data['clients'] = $this->clients_model->get();
        $data['title'] = _l('edit_car');
        $this->load->view('property/edit', $data);
    }

    public function delete($id)
    {
        if (!has_permission('car', '', 'delete')) {
            access_denied('car');
        }

        $this->car_model->delete($id);
        set_alert('success', _l('car_deleted_success'));
        redirect(admin_url('car'));
    }

    private function build_client_lookup()
    {
        $clients = $this->clients_model->get();
        $lookup = [];

        foreach ((array) $clients as $client) {
            $client_id = is_array($client)
                ? ($client['userid'] ?? $client['id'] ?? null)
                : ($client->userid ?? $client->id ?? null);
            if (!$client_id) {
                continue;
            }

            $company = is_array($client)
                ? ($client['company'] ?? '')
                : ($client->company ?? '');
            $first = is_array($client)
                ? ($client['firstname'] ?? '')
                : ($client->firstname ?? '');
            $last = is_array($client)
                ? ($client['lastname'] ?? '')
                : ($client->lastname ?? '');

            $name = trim($company);
            if ($name === '') {
                $name = trim($first . ' ' . $last);
            }
            if ($name === '') {
                $name = '#' . $client_id;
            }

            $lookup[$client_id] = $name;
        }

        return $lookup;
    }
}
