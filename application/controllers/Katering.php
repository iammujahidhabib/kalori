<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Katering extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $data['active'] = 'menu';
        $data['kota'] = $this->M_template->view('kota')->result();
        $sql2 = "SELECT * FROM vendor JOIN kota USING(id_kota) order by rand()";
        $data['vendor'] = $this->M_template->query($sql2)->result();
        
        $this->load->view('template/header', $data);
        $this->load->view('home/vendor', $data);
        $this->load->view('template/footer', $data);
        // echo "<pre>";
        // print_r($data);
    }

    public function detail($id)
    {
        $data['active'] = 'menu';
        $data['kategori'] = $this->M_template->view('kategori')->result();
        $sql = "SELECT * FROM menu JOIN vendor USING(id_vendor) JOIN kota USING(id_kota) JOIN nutrisi USING(id_nutrisi) WHERE id_vendor = $id";
        $sql2 = "SELECT * FROM vendor JOIN kota USING(id_kota) order by rand()";
        $data['menu'] = $this->M_template->query($sql)->result();
        $data['vendor'] = $this->M_template->query($sql2)->row();
        $this->load->view('template/header', $data);
        $this->load->view('home/vendor-detail', $data);
        $this->load->view('template/footer', $data);
    }
}
