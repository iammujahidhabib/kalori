<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
        if ($this->session->isLogin != TRUE) {
            redirect('login');
        } else {
            if ($this->session->role != 3) {
                redirect('home');
            }
        }
    }
    public function index()
    {
        $data['active'] = 'profil';
        $data['akun'] = $this->M_template->view_where('akun', ['id_akun' => $this->session->id_akun])->row();
        if ($this->session->role == 2) {
            // echo $login['id_akun'];
            $data['profile'] = $this->M_template->view_where('vendor', ['id_akun' => $this->session->id_akun])->row();
        } elseif ($this->session->role == 3) {
            $data['profile'] = $this->M_template->view_where('customer', ['id_akun' => $this->session->id_akun])->row();
        }
        // echo "<pre>";
        // print_r($data);

        $this->load->view('template/header', $data);
        $this->load->view('home/profile', $data);
        $this->load->view('template/footer', $data);
    }
}
