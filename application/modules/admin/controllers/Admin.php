<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
        public function index()
        {
        $data['title'] = 'Dashboard';
        
        $this->load->view('_templates/admin/header');
        $this->load->view('_templates/admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('_templates/admin/footer');
        }
}        