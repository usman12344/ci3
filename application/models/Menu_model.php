<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu` FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }

    public function getSubMenubyId($id = 0)
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu` FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        return $this->db->get($query)->row_array();
    }

    public function hapusmenu($id)
    {
        $this->db->delete('user_menu', array('id' => $id));
        $this->session->set_flashdata('menu', '<div class="alert alert-success" role="alert">
            Delete Menu Success
          </div>');
        redirect('menu');
    }

    public function hapussubmenu($id)
    {
        $this->db->delete('user_sub_menu', array('id' => $id));
        $this->session->set_flashdata('menu', '<div class="alert alert-success" role="alert">
            Delete Sub Menu Success
          </div>');
        redirect('menu/submenu');
    }

    public function hapusrole($id)
    {
        $this->db->delete('user_role', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Delete Role Success
          </div>');
        redirect('admin/role');
    }
}
