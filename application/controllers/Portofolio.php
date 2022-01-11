<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $data['active'] = 'portofolio';
        $data['profile'] = $this->M_template->view('profile')->row();
        $data['portofolio'] = $this->M_template->view_order('portofolio','tanggal','DESC')->result();
        $this->load->view('template/header', $data);
        $this->load->view('home/portofolio', $data);
        $this->load->view('template/footer', $data);
    }
    
    public function detail($id)
    {
        $data['active'] = 'portofolio';
        $data['profile'] = $this->M_template->view('profile')->row();
        $data['portofolio'] = $this->M_template->view_where('portofolio',['id'=>$id])->row();
        $this->load->view('template/header', $data);
        $this->load->view('home/portofolio-detail', $data);
        $this->load->view('template/footer', $data);
    }
    
}
