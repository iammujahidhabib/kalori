<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $data['active'] = 'produk';
        $data['profile'] = $this->M_template->view('profile')->row();
        $data['produk'] = $this->M_template->view_where('produk', ['status' => 1])->result();
        $this->load->view('template/header', $data);
        $this->load->view('home/product', $data);
        $this->load->view('template/footer', $data);
    }
    public function detail($id)
    {
        $data['active'] = 'produk';
        $data['profile'] = $this->M_template->view('profile')->row();
        $data['produk'] = $this->M_template->view_where('produk', ['status' => 1,'id'=>$id])->row();
        $this->load->view('template/header', $data);
        $this->load->view('home/product-detail', $data);
        $this->load->view('template/footer', $data);
    }
}
