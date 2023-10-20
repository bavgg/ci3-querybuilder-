<?php
class Flower extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("flowers_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Flower Listings';

        $data['flowers'] = $this->flowers_model->getFlowers();
        
        $this->load->view('flowers', $data);
        
    }
    public function edit($flower_id = '')
    {
        echo 'hello'.$this->uri->segment(3);
        if ($flower_id) {
            $data['title'] = 'Edit Flower';
            $this->load->model('flowers_model'); // Corrected method call
            $data['flower'] = $this->flowers_model->getFlowers($flower_id); // Corrected method call
            if ($data['flower']) {
                $this->load->view('flower_edit', $data); // Corrected view name
            }
        } else {
            redirect(base_url('Flowers'));
        }
    }

    public function verifyEdit()
    {
        $flower_id = $this->uri->segment(3);
        $this->form_validation->set_rules('flower_name', 'Flower Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|decimal');

        if ($this->form_validation->run() == TRUE) {
            $isUpdated = $this->flowers_model->update($flower_id); // corrected method call

            if ($isUpdated) {
                echo "Updated!";
            } else {
                echo "Not Updated!";
            }
        } else {
            $this->edit($flower_id);
        }
    }

    public function delete($flower_id = '') {
       
    
        $data['flower'] = $this->flowers_model->getFlowers($flower_id); // Corrected variable name and method call
    
        if ($data['flower']) {
            $isDeleted = $this->flowers_model->delete($flower_id); // Corrected method call
            
            if ($isDeleted) {
                
                echo "Deleted!";
            } else {
                echo "Not Deleted!";
            }
        } else {
            redirect(base_url('Flowers'));
        }
    }
    
}
