<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
    }
    public function index()
    {
        $data['active'] = 'home';
        // $data['banner'] = $this->M_template->view_order('banner','sort','ASC')->result();
        $data['catering'] = $this->M_template->view('vendor')->result();
        $this->load->view('template/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function kalori()
    {
        $data['active'] = 'home';
        // $data['banner'] = $this->M_template->view_order('banner','sort','ASC')->result();
        // $data['profile'] = $this->M_template->view('profile')->row();
        if ($this->input->get('gender') == "Men") {
            $kalori = (88.4 + 13.4 * $this->input->get('bb')) + (4.8 * $this->input->get('tb')) - (5.68 * $this->input->get('usia'));
        } elseif ($this->input->get('gender') == "Women") {
            $kalori = (447.6 + 9.25  * $this->input->get('bb')) + (3.1 * $this->input->get('tb')) - (4.33 * $this->input->get('usia'));
            // (88,4 + 13,4 x berat dalam kilogram) + (4,8 x tinggi dalam sentimeter) - (5,68 x usia dalam tahun)
        } else {
            redirect();
        }
        $sql = "SELECT * FROM menu JOIN vendor USING(id_vendor) JOIN nutrisi USING(id_nutrisi) WHERE nutrisi.kalori > $kalori";
        // echo $sql;
        $data['catering'] = $this->M_template->view('vendor')->result();
        $data['suggest_makanan'] = $this->M_template->query($sql)->result();
        $data['inputan'] = $this->input->get();
        $data['kalori'] = $kalori;
        $this->load->view('template/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template/footer', $data);
    }
}
