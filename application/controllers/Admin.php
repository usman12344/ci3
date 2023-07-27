<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_Array();

        // echo "selamat datang " . $data['user']['name'];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function role()
    {
        $data['title'] = "Role";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_Array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role_name', "role_name", 'required');

        if ($this->form_validation->run() == false) {
            // echo "selamat datang " . $data['user']['name'];
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role_name')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New role added!
          </div>');
            redirect('admin/role');
        }
    }

    public function roleaccess($role_id)
    {
        $data['title'] = "Role";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_Array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();


        // echo "selamat datang " . $data['user']['name'];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('template/footer', $data);
    }

    public function changeaccess()
    {
        $menu_Id = $this->input->post('menuId');
        $role_Id = $this->input->post('roleId');

        $data = [
            'role_Id' => $role_Id,
            'menu_Id' => $menu_Id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Success Changed!
      </div>');
    }

    public function hapus($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusrole($id);
    }
}
