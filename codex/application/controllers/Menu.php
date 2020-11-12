<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_data');;
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New menu added!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {

        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')

            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New submenu added!</div>');
            redirect('menu/submenu');
        }
    }

    function delete()
    {
        $id   = $this->input->post('id');
        $data = $this->m_data->delete_data($id, 'user_sub_menu');

        if ($data) {
            echo json_encode(['success' => 'true', 'message' => 'success delete data, user_sub_menu']);
        } else {
            echo json_encode(['success' => 'false', 'message' => 'success delete data, user_sub_menu']);
        }
    }

    function delete_menu()
    {
        $id   = $this->input->post('id');
        $data = $this->m_data->delete_data($id, 'user_menu');

        if ($data) {
            echo json_encode(['success' => 'true', 'message' => 'success delete data, user_menu']);
        } else {
            echo json_encode(['success' => 'false', 'message' => 'success delete data, user_menu']);
        }
    }

    function edit_data_menu()
    {
        $id    = $this->input->post('id');
        $datum = array('menu' => $this->input->post('menu'));
        $table = 'user_menu';
        $this->m_data->edit_menu($id, $table, $datum);

        redirect('menu');
    }

    function edit_data_submenu()
    {
        $id    = $this->input->post('id');
        $datum = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];
        // echo $id;
        // echo '<pre>' . print_r($datum, true) . '</pre>';

        // die();
        $table = 'user_sub_menu';
        $this->m_data->edit_menu($id, $table, $datum);

        redirect('menu/submenu');
    }

    function edit_data_role()
    {
        $id    = $this->input->post('id');
        $data = array('role' => $this->input->post('role'));
        $table = 'user_role';
        $this->m_data->edit_role($id, $table, $data);

        redirect('admin/role');
    }


    function edit_data_submenu2()
    {
        $id    = $this->input->post('id');
        $data = array('role' => $this->input->post('role'));
        $table = 'user_role';
        $this->m_data->edit_role($id, $table, $data);

        redirect('admin/role');
    }


    public function tampil()
    {
        $data['query'] = $this->menu_model->tampil();
        $this->load->view('user_sub_menu', $data);
    }
}
