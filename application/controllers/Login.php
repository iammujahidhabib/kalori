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
        if ($this->input->post()) {
            $cek = $this->M_template->view_where('akun', ['email' => $this->input->post('email')])->row();
            if (!empty($row)) {
                $akun = $this->M_template->insert_id('akun', [
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'role' => 3,
                    'status' => 1,
                ]);
                $customer = $this->M_template->insert_id('customer', [
                    'nama_customer' => $this->input->post('nama_customer'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'phone_number' => $this->input->post('phone_number'),
                    'alamat' => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('gender'),
                    'id_akun' => $akun,
                ]);
                $this->session->set_flashdata('message', "<script>alert('Anda berhasil mendaftar. Silahkan login.')</script>");
                redirect('login');
            }else{
                $this->session->set_flashdata('message', "<script>alert('Email sudah digunakan pengguna lain.')</script>");
            $this->load->view('auth/register');
        }
        } else {
            $this->load->view('auth/register');
        }
    }
    public function register_vendor()
    {
        if ($this->input->post()) {
            $akun = $this->M_template->insert_id('akun', [
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' => 2,
                'status' => 1,
            ]);
            $data = [
                'nama_vendor' => $this->input->post('nama_vendor'),
                'deskripsi' => $this->input->post('deskripsi'),
                'phone_number' => $this->input->post('phone_number'),
                'alamat' => $this->input->post('alamat'),
                'id_akun' => $akun,
            ];
            if ($_FILES['foto']['name'] != "") {
                $config = array(
                    'upload_path' => './asset/logo/',
                    'overwrite' => false,
                    'remove_spaces' => true,
                    'allowed_types' => 'png|jpg|gif|jpeg',
                    'max_size' => 10000,
                    'xss_clean' => true,
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')) {
                    $file_data = $this->upload->data();
                    $data['foto'] = $file_data['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $customer = $this->M_template->insert_id('vendor', $data);
            $this->session->set_flashdata('message', "<script>alert('Anda berhasil mendaftar. Silahkan login.')</script>");
            redirect('login');
        } else {
            $this->load->view('auth/register_vendor');
        }
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
                echo $_GET['url'];
            }
            $this->session->set_userdata($session);
            // print_r($this->session->userdata());
            if (isset($_GET['url'])) {
                $explode = explode(base_url(), $_GET['url']);
                redirect($explode[1]);
            } else {
                // print_r($this->session->userdata);
                redirect($_to);
            }
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
