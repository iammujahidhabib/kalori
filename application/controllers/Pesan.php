<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
        if ($this->session->level == 1) {
            redirect('admin/');
        } elseif ($this->session->level == 2) {
            redirect('guru/');
        }
        if ($this->session->isLogin == false) {
            if ($this->session->isSiswa == false) {
                redirect('auth/');
            }
        }
    }
    public function pesan($id, $id_guru = NULL)
    {
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $data['kelas'] = $this->M_template->view('kelas')->result();
        $data['harga'] = $this->M_template->view('daftar_harga')->result();
        $data['hari'] = $this->M_template->view('hari')->result();
        $data['guru'] = $this->M_template->query("SELECT guru.* FROM bidang JOIN guru ON guru.id_guru=bidang.id_guru WHERE bidang.id_matpel =$id")->result();
        $data['id'] = $id;
        if ($id_guru) {
            $data['id_guru'] = $id_guru;
        }
        $this->load->view('template/header');
        $this->load->view('home/pesan', $data);
        $this->load->view('template/footer');
    }
    public function get_harga($id_mp, $id_kelas)
    {
        $data = $this->M_template->view_where('daftar_harga', ['id_mp' => $id_mp, 'id_kelas' => $id_kelas])->result();

        echo json_encode($data);
    }
    public function save()
    {
        $insert = [
            'kode_pesanan' => date('Ymdhis'),
            'tanggal_mulai_belajar' => $this->input->post('tanggal'),
            'jumlah_siswa' => $this->input->post('jumlah_siswa'),
            'jumlah_pertemuan' => $this->input->post('jumlah_pertemuan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_guru' => $this->input->post('guru'),
            'id_mp' => $this->input->post('mata_pelajaran'),
            'id_hari' => $this->input->post('hari'),
            'id_kelas' => $this->input->post('kelas'),
            'id_siswa' => $this->session->id_siswa,
            'id_harga' => $this->input->post('harga'),
            'metode_pembayaran' => $this->input->post('metode'),
            'status_pesanan' => 'Guru Belum Konfirmasi',
            'status_pembayaran' => 'Belum bayar',
        ];
        echo "<pre>";
        print_r($this->input->post());
        echo "</pre>";
        $this->M_template->insert('pesanan', $insert);
        redirect('pesan/pesanan/');
    }
    public function pesanan()
    {
        $data['pesanan'] = $this->M_template->view_pesanan_siswa()->result();
        $this->load->view('template/header');
        $this->load->view('home/pesanan', $data);
        $this->load->view('template/footer');
    }
    public function pesananku($id)
    {
        $data['pesanan'] = $this->M_template->view_pesananku($id)->result();
        $data['matpel'] = $this->M_template->view('mata_pelajaran')->result();
        $data['testimoni'] = $this->M_template->query('SELECT * FROM `jadwal` JOIN absen USING(id_absen) WHERE id_pesanan =' . $id . ' AND absen.waktu_absen IS NULL')->result();
        $data['testi'] = $this->M_template->view_where('testimoni', ['id_pesanan' => $id])->result();
        $this->load->view('template/header');
        $this->load->view('home/detail_pesanan', $data);
        $this->load->view('template/footer');
    }
    // jadwal
    public function jadwal()
    {
        $data['jadwal'] = $this->M_template->view_jadwal_siswa_pesanan()->result();
        $this->load->view('template/header');
        $this->load->view('home/jadwal', $data);
        $this->load->view('template/footer');
    }

    //bukti pembayaran
    public function upload_pembayaran()
    {
        $config = array(
            'upload_path' => './bukti_pembayaran/',
            'overwrite' => false,
            'remove_spaces' => true,
            'allowed_types' => 'png|jpg|gif|jpeg',
            'max_size' => 5000,
            'xss_clean' => true,
        );
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();
            $this->M_template->update(
                'pesanan',
                ['id_pesanan' => $this->input->post('id_pesanan')],
                [
                    'foto_pembayaran' => $file_data['file_name'],
                    'status_pembayaran' => 'Belum konfirmasi',
                ]
            );
            redirect('pesan/pesanan');
        } else {
            echo $this->upload->display_errors();
        }
    }
}
