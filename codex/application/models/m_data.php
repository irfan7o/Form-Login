<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_data extends CI_Model
{
    function appear_data()
    {
        return $this->db->get('user_sub_menu');
    }

    function delete_data($id, $table)
    {
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }

    function delete_datas($id, $table)
    {
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }

    public function tampil()
    {
        $query = $this->db->get('user_sub_menu');
        return $query;
    }

    function edit_menu($id, $table, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function edit_role($id, $table, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function edit_submenu($id, $table, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }
}
