<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $data['active'] = 'katering';
        $data['kategori'] = $this->M_template->view('kategori')->result();
        $data['kota'] = $this->M_template->view('kota')->result();
        // $data['vendor'] = $this->M_template->join('vendor', 'vendor.id_kota=kota.id_kota', 'kota')->result();
        $sql = "SELECT * FROM menu JOIN vendor USING(id_vendor) JOIN kota USING(id_kota) JOIN nutrisi USING(id_nutrisi) ";
        $data['menu'] = $this->M_template->query($sql)->result();

        $this->load->view('template/header', $data);
        $this->load->view('home/menu', $data);
        $this->load->view('template/footer', $data);
        // echo "<pre>";
        // print_r($data);
    }

    public function detail($id)
    {
        $data['active'] = 'katering';
        $sql = "SELECT * FROM menu JOIN nutrisi USING(id_nutrisi) WHERE id_menu = $id";
        $data['menu'] = $this->M_template->query($sql)->row();
        $id_vendor = $data['menu']->id_vendor;
        $sql2 = "SELECT * FROM vendor JOIN kota USING(id_kota) WHERE id_vendor = $id_vendor";
        $data['vendor'] = $this->M_template->query($sql2)->row();
        $this->load->view('template/header', $data);
        $this->load->view('home/menu-detail', $data);
        $this->load->view('template/footer', $data);
    }
    public function pesan($id)
    {
        if ($this->session->isLogin != TRUE) {
            redirect('login?url='.current_url());
        } else {
            if ($this->session->role != 3) {
                redirect('home');
            } else {
                $data['active'] = 'katering';
                $sql = "SELECT * FROM menu JOIN nutrisi USING(id_nutrisi) WHERE id_menu = $id";
                $data['menu'] = $this->M_template->query($sql)->row();
                $id_vendor = $data['menu']->id_vendor;
                $sql2 = "SELECT * FROM vendor JOIN kota USING(id_kota) WHERE id_vendor = $id_vendor";
                $data['vendor'] = $this->M_template->query($sql2)->row();
                if (!$this->input->post()) {
                    $this->load->view('template/header', $data);
                    $this->load->view('home/pesan', $data);
                    $this->load->view('template/footer', $data);
                } else {
                    echo "<pre>";
                    $customer = $this->M_template->view_where('customer', ['id_akun' => $this->input->post('id_customer')])->row();
                    $transaksi = $this->input->post();
                    $transaksi['id_customer'] = $customer->id_customer;
                    $transaksi['status_transaksi'] = 0;
                    print_r($transaksi);
                    $id_transaksi = $this->M_template->insert_id('transaksi', $transaksi);
                    redirect('transaksi/detail/' . $id_transaksi);
                }
            }
        }
    }
}
