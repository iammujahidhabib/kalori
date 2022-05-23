<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
        // echo $this->session->userdata('isLogin');
        // print_r($this->session->userdata());
        if ($this->session->isLogin == FALSE) {
            redirect('cms/login');
        }
    }
    public function index()
    {
        // $data['profile'] = $this->M_template->view('profile')->row();
        $this->load->view('admin/header');
        // $this->load->view('admin/profile/create', $data);
        $this->load->view('admin/footer');
    }

    public function profile()
    {
        $data['profile'] = $this->M_template->view('profile')->row();
        $this->load->view('admin/header');
        $this->load->view('admin/profile/create', $data);
        $this->load->view('admin/footer');
    }
    public function save($id)
    {
        $data = $this->input->post();
        if ($_FILES['logo']['name'] != "") {
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
            if ($this->upload->do_upload('logo')) {
                $file_data = $this->upload->data();
                $data['logo'] = $file_data['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }
        // echo "<pre>";
        // print_r($data);
        $data['maps'] = str_replace('width="800"', 'style="width:100%"', $this->input->post('maps'));
        $data['video'] = str_replace('youtu.be', 'www.youtube.com/embed', $this->input->post('video'));
        $this->M_template->update('profile', ['id' => $id], $data);
        redirect('cms/admin/profile');
    }
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // MENU
    public function menu()
    {
        $data['menu'] = $this->M_template->join_where('menu', 'kategori', 'menu.id_kategori=kategori.id_kategori', 'left', ['id_vendor' => $this->session->id_vendor])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/menu/index', $data);
        $this->load->view('admin/footer');
    }
    public function menuku($id)
    {
        $data['menu'] = $this->M_template->view_where('menu', ['id' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/menu/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_menu()
    {
        $data['kategori'] = $this->M_template->view('kategori')->result();
        $data['nutrisi'] = $this->M_template->view('nutrisi')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/menu/create');
        $this->load->view('admin/footer');
    }
    public function edit_menu($id)
    {
        $data['kategori'] = $this->M_template->view('kategori')->result();
        $data['nutrisi'] = $this->M_template->view('nutrisi')->result();
        $data['menu'] = $this->M_template->join_where('menu', 'kategori', 'menu.id_kategori=kategori.id_kategori', 'left', ['id_menu' => $id])->row();
        $this->load->view('admin/header');
        $this->load->view('admin/menu/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_menu()
    {
        $data = $this->input->post();
        $config = array(
            'upload_path' => './asset/corporate/foto/',
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

        $this->M_template->insert('menu', $data);
        redirect('cms/vendor/menu');
    }
    public function update_menu($id)
    {
        $data = $this->input->post();
        if ($_FILES['foto']['name'] != "") {
            $config = array(
                'upload_path' => './asset/corporate/foto/',
                'overwrite' => false,
                'remove_spaces' => true,
                'allowed_types' => 'png|jpg|gif|jpeg',
                'max_size' => 10000,
                'xss_clean' => true,
            );
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('logo')) {
                $file_data = $this->upload->data();
                $data['foto'] = $file_data['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->M_template->update('menu', ['id' => $id], $data);
        // $this->M_template->insert('menu', $data);
        redirect('cms/admin/menu');
    }
    public function delete_menu($id)
    {
        $this->M_template->delete('menu', ['id' => $id]);
        redirect('cms/admin/menu');
    }
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // TRANSAKSI
    public function transaksi()
    {
        $vendor = $this->M_template->view_where('vendor', ['id_akun' => $this->session->id_akun])->row();
        $data['transaksi'] = $this->M_template->query("SELECT * FROM transaksi 
        JOIN menu ON menu.id_menu=transaksi.id_menu 
        JOIN nutrisi ON menu.id_nutrisi=nutrisi.id_nutrisi 
        JOIN customer ON customer.id_customer=transaksi.id_customer
        WHERE menu.id_vendor = $vendor->id_vendor")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/transaksi/index', $data);
        $this->load->view('admin/footer');
    }
    public function accept_transaksi($status, $id)
    {
        $this->M_template->update("transaksi", ['id_transaksi' => $id], ['status_transaksi' => $status, 'note_vendor' => null]);
        $transaksi = $this->M_template->view_where("transaksi", ['id_transaksi' => $id])->row();
        $menu = $this->M_template->view_where("menu", ['id_menu' => $transaksi->id_menu])->row();
        $tanggal_pesan = $transaksi->tanggal_pesan;
        for ($i=0; $i <$menu->durasi ; $i++) { 
            $this->M_template->insert("jadwal",[
                'id_transaksi'=>$transaksi->id_transaksi,
                'id_menu'=>$transaksi->id_menu,
                'id_customer'=>$transaksi->id_customer,
                'id_vendor'=>$menu->id_vendor,
                'date_jadwal'=>$tanggal_pesan,
                'status'=>0,
            ]);
            $tanggal_pesan = date('Y-m-d',strtotime($tanggal_pesan . "+1 days"));
        }
        redirect('cms/vendor/transaksi');
    }
    public function tolak_transaksi($id)
    {
        $alasan = $this->input->post('alasan');
        $this->M_template->update("transaksi", ['id_transaksi' => $id], ['status_transaksi' => 4, 'note_vendor' => $alasan]);
        redirect('cms/vendor/transaksi');
    }
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // PRODUK
    public function produk()
    {
        $data['produk'] = $this->M_template->view('produk')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/produk/index', $data);
        $this->load->view('admin/footer');
    }
    public function produkku($id)
    {
        $data['produk'] = $this->M_template->view_where('produk', ['id' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/produk/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_produk()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/produk/create');
        $this->load->view('admin/footer');
    }
    public function edit_produk($id)
    {
        $data['produk'] = $this->M_template->view_where('produk', ['id' => $id])->row();
        $this->load->view('admin/header');
        $this->load->view('admin/produk/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_produk()
    {
        $data = $this->input->post();
        $config = array(
            'upload_path' => './asset/corporate/produk/',
            'overwrite' => false,
            'remove_spaces' => true,
            'allowed_types' => 'png|jpg|gif|jpeg',
            'xss_clean' => true,
        );
        $file_name_array = array();
        $files = $_FILES;
        $cpt = count($_FILES['foto']['name']);
        $this->load->library('upload');
        $this->upload->initialize($config);
        echo $cpt;
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['foto']['name'] = $files['foto']['name'][$i];
            $_FILES['foto']['type'] = $files['foto']['type'][$i];
            $_FILES['foto']['tmp_name'] = $files['foto']['tmp_name'][$i];
            $_FILES['foto']['error'] = $files['foto']['error'][$i];
            $_FILES['foto']['size'] = $files['foto']['size'][$i];

            $this->upload->do_upload('foto');
            $file_data = $this->upload->data();
            $_file_name = $file_data['file_name'];
            array_push($file_name_array, $_file_name);
            // $file_name_array[] = $_file_name;
            echo $_file_name;
        }
        $data['foto'] = json_encode($file_name_array);
        echo "<pre>";
        print_r($data);
        $this->M_template->insert('produk', $data);
        redirect('cms/admin/produk');
    }
    public function update_produk($id)
    {
        $data = $this->input->post();
        $this->M_template->update('produk', ['id' => $id], $data);
        // $this->M_template->insert('produk', $data);
        redirect('cms/admin/produk');
    }
    public function delete_produk($id)
    {
        $this->M_template->delete('produk', ['id' => $id]);
        redirect('cms/admin/produk');
    }
    public function delete_produk_foto($id)
    {
        $this->M_template->update('produk', ['id' => $id], ['foto' => json_encode($this->input->post('foto'))]);
    }
    public function add_produk_foto($id)
    {
        $produk = $this->M_template->view_where('produk', ['id' => $id])->row();
        $foto_array = json_decode($produk->foto);

        $config = array(
            'upload_path' => './asset/corporate/produk/',
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
            array_push($foto_array, $file_data['file_name']);
        } else {
            echo $this->upload->display_errors();
        }
        // echo "<pre>";
        // print_r($foto_array);
        $this->M_template->update('produk', ['id' => $id], ['foto' => json_encode($foto_array)]);
        redirect('cms/admin/edit_produk/' . $id);
    }
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // ------------------------------
    public function cek_login()
    {
        if ($this->session->isLogin == false) {
            redirect('cms/login/');
        }
    }

    // BANNER
    // ======================
    // ======================
    // ======================
    // ======================
    // ======================
    // ======================
    // ======================
    // ======================
    // ======================
    public function banner()
    {
        $data['banner'] = $this->M_template->view_order('banner', 'sort', 'ASC')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/banner/index', $data);
        $this->load->view('admin/footer');
    }
    public function bannerku($id)
    {
        $data['banner'] = $this->M_template->view_where('banner', ['id' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/banner/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_banner()
    {
        $data['banner_all'] = $this->M_template->view('banner')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/banner/create', $data);
        $this->load->view('admin/footer');
    }
    public function edit_banner($id)
    {
        $data['banner_all'] = $this->M_template->view('banner')->result();
        $data['banner'] = $this->M_template->view_where('banner', ['id' => $id])->row();
        $this->load->view('admin/header');
        $this->load->view('admin/banner/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_banner()
    {
        $data = $this->input->post();
        // if ($_FILES['banner']['name'] != "") {
        $config = array(
            'upload_path' => './asset/logo/',
            'overwrite' => false,
            'remove_spaces' => true,
            'allowed_types' => 'png|jpg|gif|jpeg',
            'max_size' => 15000,
            'xss_clean' => true,
        );
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('banner')) {
            $file_data = $this->upload->data();
            $this->resizeImage($file_data['file_name']);
            $data['banner'] = $file_data['file_name'];
        } else {
            echo $this->upload->display_errors();
        }
        // }
        // echo "<pre>";
        // print_r($data);
        $this->M_template->insert('banner', $data);
        // $this->M_template->update('banner', ['id' => $id], $data);
        redirect('cms/admin/banner');
    }
    public function update_banner($id)
    {
        $data = $this->input->post();
        if ($_FILES['banner']['name'] != "") {
            $config = array(
                'upload_path' => './asset/logo//',
                'overwrite' => false,
                'remove_spaces' => true,
                'allowed_types' => 'png|jpg|gif|jpeg',
                'max_size' => 10000,
                'xss_clean' => true,
            );
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('logo')) {
                $file_data = $this->upload->data();
                $this->resizeImage($file_data['file_name']);
                $data['banner'] = $file_data['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->M_template->update('banner', ['id' => $id], $data);
        // $this->M_template->insert('portofolio', $data);
        redirect('cms/admin/banner');
    }
    public function resizeImage($filename)
    {
        $source_path = $_SERVER['DOCUMENT_ROOT'] . '/asset/logo/' . $filename;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/asset/logo/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => './asset/logo/' . $filename,
            'maintain_ratio' => TRUE,
            'quality' => '60%',
            'width' => '1000',
            'new_image' => './asset/logo/',
        );

        $this->load->library('image_lib', $config_manip);
        $this->image_lib->resize();
        // if (!$this->image_lib->resize()) {
        //     echo $this->image_lib->display_errors();
        // }

    }
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // MAIL
    public function mail()
    {
        $data['mail'] = $this->M_template->view('mail')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/mail/index', $data);
        $this->load->view('admin/footer');
    }
}
