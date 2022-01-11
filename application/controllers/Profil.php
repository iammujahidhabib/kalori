<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $data['active'] = 'profil';
        $data['profile'] = $this->M_template->view('profile')->row();
        $this->load->view('template/header', $data);
        $this->load->view('home/profile', $data);
        $this->load->view('template/footer', $data);
    }
    
}
