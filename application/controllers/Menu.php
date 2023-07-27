<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Menu Management";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get("user_menu")->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == FALSE) {

            // echo "selamat datang " . $data['user']['name'];
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New menu added!
          </div>');
            redirect('menu');
        }
    }

    public function subMenu()
    {
        $id = 1;
        $data['title'] = "SubMenu Management";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['submenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get_where("user_menu")->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu_id', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert("user_sub_menu", $data);
            $this->session->set_flashdata('menu', '<div class="alert alert-success" role="alert">
            New Submenu added!
          </div>');
            redirect('menu/submenu');
        }
    }

    public function ubahMenu()
    {
        $data['title'] = "Ubah Sub Management";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');

        // $data['submenu'] = $this->menu->getSubMenu();
        // $data['menu'] = $this->db->get_where("user_menu", ['menu' => $this->input->post('menu_id')])->row_array();
        // $data['menu_id'] = $this->input->post('menu_id');
        // var_dump($data['menu']);
        // var_dump($data['menu_id']);
        // die;
        // var_dump($data['menu']);
        // var_dump($this->input->post('id'));
        // die;
        // $this->form_validation->set_rules('title', 'Title');


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('template/footer', $data);

        $data = [
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('menu_id',  true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('is_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update("user_sub_menu", $data);

        // $this->db->where('menu', $this->input->post('menu_id', true));
        // $this->db->update("user_menu", $data);
        $this->session->set_flashdata('menu', '<div class="alert alert-success" role="alert">
            SubMenu edit success!
          </div>');
        redirect('menu/submenu');
    }

    public function hapusmenu($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusmenu($id);
    }

    public function hapussubmenu($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapussubmenu($id);
    }
}
