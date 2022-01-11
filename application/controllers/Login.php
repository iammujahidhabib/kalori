<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $this->load->view('auth/login');
    }
    public function register()
    {
        $this->load->view('auth/register');
    }
    public function register_vendor()
    {
        $this->load->view('auth/register_vendor');
    }
    public function login_action()
    {
        $login = $this->M_template->view_where(
            'akun',
            array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            )
        )->row_array();
        // echo md5($this->input->post('password'))."<br>";
        // print_r($login);
        if ($login) {
            $session = $login;
            $session['isLogin'] = TRUE;
            // print_r($session);
            if ($session['role'] == 1) {
                $_to = 'cms/admin';
            } elseif ($session['role'] == 2) {
                // echo $login['id_akun'];
                $lengkap = $this->M_template->view_where('vendor', ['id_akun' => $login['id_akun']])->row_array();
                $_to = 'cms/vendor';
                $this->session->set_userdata($lengkap);
            } elseif ($session['role'] == 3) {
                $lengkap = $this->M_template->view_where('customer', ['id_akun' => $login['id_akun']])->row_array();
                $_to = 'home';
                $this->session->set_userdata($lengkap);
            }
            $this->session->set_userdata($session);
            // print_r($this->session->userdata());
            redirect($_to);
        } else {
            $this->session->set_flashdata('error_log', '<div class="alert alert-danger" role="alert">Username atau Password salah! </div>');
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
