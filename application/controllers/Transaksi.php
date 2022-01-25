<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $data['active'] = 'produk';
        $customer = $this->M_template->view_where('customer', ['id_akun' => $this->session->id_akun])->row();
        $sql = "SELECT * FROM transaksi JOIN menu USING(id_menu) JOIN vendor USING(id_vendor) WHERE id_customer = $customer->id_customer";
        $data['transaksi'] = $this->M_template->query($sql)->result();
        $this->load->view('template/header', $data);
        $this->load->view('home/transaksi', $data);
        $this->load->view('template/footer', $data);
    }
    public function detail($id)
    {
        $data['active'] = 'produk';
        $sql3 = "SELECT * FROM transaksi JOIN menu USING(id_menu) JOIN vendor USING(id_vendor) WHERE id_transaksi = $id";
        $data['transaksi'] = $this->M_template->query($sql3)->row();
        $id_menu = $data['transaksi']->id_menu;
        $sql = "SELECT * FROM menu JOIN nutrisi USING(id_nutrisi) WHERE id_menu = $id_menu";
        $data['menu'] = $this->M_template->query($sql)->row();
        $id_vendor = $data['menu']->id_vendor;
        $sql2 = "SELECT * FROM vendor JOIN kota USING(id_kota) WHERE id_vendor = $id_vendor";
        $data['vendor'] = $this->M_template->query($sql2)->row();
        $this->load->view('template/header', $data);
        $this->load->view('home/transaksi-detail', $data);
        $this->load->view('template/footer', $data);
    }

    public function upload($id)
    {
        $config = array(
            'upload_path' => './asset/bukti//',
            'overwrite' => false,
            'remove_spaces' => true,
            'allowed_types' => 'png|jpg|gif|jpeg',
            'max_size' => 10000,
            'xss_clean' => true,
        );
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('bukti')) {
            $file_data = $this->upload->data();
            $this->resizeImage($file_data['file_name']);
            $data['bukti'] = $file_data['file_name'];
            $data['status_transaksi'] = 1;
            $this->M_template->update('transaksi', ['id_transaksi' => $id], $data);
        } else {
            echo $this->upload->display_errors();
        }
        redirect('transaksi/detail/' . $id);
    }
    public function resizeImage($filename)
    {
        $source_path = $_SERVER['DOCUMENT_ROOT'] . '/asset/bukti/' . $filename;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/asset/bukti/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => './asset/bukti/' . $filename,
            'maintain_ratio' => TRUE,
            'quality' => '60%',
            'width' => '1000',
            'new_image' => './asset/bukti/',
        );

        $this->load->library('image_lib', $config_manip);
        $this->image_lib->resize();
    }
}
