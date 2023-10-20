<?php
class flowers_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getFlowers($flower_id = null)
    {
        if ($flower_id == null) {
            $rs = $this->db->get("flowers");
            return $rs->result_array();
        } else {
            $rs = $this->db->get_where("flowers", array("flower_id" => $flower_id));
            return $rs->row_array();
        }
    }
    public function update($flower_id)
    {
        $data = array(
            'flower_name' => $this->input->post('flower_name'),
            'price' => $this->input->post('price'),
            'isAvailable' => $this->input->post('isAvailable')
        );

        $this->db->where('flower_id', $flower_id);
        return $this->db->update('flowers', $data);
    }

    public function delete($flower_id)
    {
        return $this->db->delete('flowers', array('flower_id' => $flower_id));
    }
}
