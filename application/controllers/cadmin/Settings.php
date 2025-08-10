<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Introduction_model');
        $this->load->model('Visi_misi_model');
        $this->load->model('Services_model');
        $this->load->model('Customers_model');
        $this->load->library('session');
    }

    // Halaman Setting Introduction (termasuk Visi Misi)
    public function introduction()
    {
        $data['introduction'] = $this->Introduction_model->get_all();
        $data['visi_misi'] = $this->Visi_misi_model->get_all();
        
        $this->load->view('vadmin/setting_introduction', $data);
    }

    // Update: Memperbarui data introduction (hanya update, tidak ada store)
    public function update_introduction($id)
    {
        $data = [
            'description' => $this->input->post('description')
        ];

        if ($this->Introduction_model->update($id, $data)) {
            $response = [
                'status' => 'success',
                'message' => 'Introduction updated successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to update introduction'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Update: Memperbarui data visi_misi (hanya update, tidak ada create/delete)
    public function update_visi_misi($id)
    {
        $data = [
            'type' => $this->input->post('type'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'icon' => $this->input->post('icon')
        ];

        if ($this->Visi_misi_model->update($id, $data)) {
            $response = [
                'status' => 'success',
                'message' => 'Visi/Misi updated successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to update visi/misi'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Halaman Setting Customer
    public function customer()
    {
        $data['customers'] = $this->Customers_model->get_all();
        
        $this->load->view('vadmin/setting_customer', $data);
    }

    // Store: Menyimpan data customers
    public function store_customer()
    {
        $data = [
            'name' => $this->input->post('name'),
            'logo_url' => $this->input->post('logo_url')
        ];

        if ($this->Customers_model->create($data)) {
            $response = [
                'status' => 'success',
                'message' => 'Customer created successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to create customer'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Update: Memperbarui data customers
    public function update_customer($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'logo_url' => $this->input->post('logo_url')
        ];

        if ($this->Customers_model->update($id, $data)) {
            $response = [
                'status' => 'success',
                'message' => 'Customer updated successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to update customer'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Delete: Menghapus data customers
    public function delete_customer($id)
    {
        if ($this->Customers_model->delete($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Customer deleted successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to delete customer'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Halaman Setting Service
    public function service()
    {
        $data['services'] = $this->Services_model->get_all();
        
        $this->load->view('vadmin/setting_service', $data);
    }

    // Store: Menyimpan data services
    public function store_service()
    {
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'icon' => $this->input->post('icon')
        ];

        if ($this->Services_model->create($data)) {
            $response = [
                'status' => 'success',
                'message' => 'Service created successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to create service'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Update: Memperbarui data services
    public function update_service($id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'icon' => $this->input->post('icon')
        ];

        if ($this->Services_model->update($id, $data)) {
            $response = [
                'status' => 'success',
                'message' => 'Service updated successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to update service'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Delete: Menghapus data services
    public function delete_service($id)
    {
        if ($this->Services_model->delete($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Service deleted successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to delete service'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}