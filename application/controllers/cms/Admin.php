<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_template');
        // echo $this->session->userdata('isLogin');
        // print_r($this->session->userdata());
        // if ($this->session->isLogin == FALSE) {
        //     redirect('login');
        // }
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
    // AKUN
    public function akun()
    {
        $data['akun'] = $this->M_template->view('akun')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/akun/index', $data);
        $this->load->view('admin/footer');
    }
    public function akunku($id)
    {
        $data['akun'] = $this->M_template->view_where('akun', ['id' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/akun/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_akun()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/akun/create');
        $this->load->view('admin/footer');
    }
    public function edit_akun($id)
    {
        $data['akun'] = $this->M_template->view_where('akun', ['id' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/akun/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_akun()
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

        $this->M_template->insert('akun', $data);
        redirect('cms/admin/akun');
    }
    public function update_akun($id)
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
        $this->M_template->update('akun', ['id' => $id], $data);
        // $this->M_template->insert('akun', $data);
        redirect('cms/admin/akun');
    }
    public function delete_akun($id)
    {
        $this->M_template->update('akun', ['id_akun' => $id], ['status' => 0]);
        redirect('cms/admin/akun');
    }
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // CUSTOMER
    public function customer()
    {
        $data['customer'] = $this->M_template->query("SELECT * FROM customer JOIN akun USING (id_akun)")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer/index', $data);
        $this->load->view('admin/footer');
    }
    public function customerku($id)
    {
        $data['customer'] = $this->M_template->view_where('customer', ['id_customer' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_customer()
    {
        $data['akun'] = $this->M_template->query("SELECT akun.* FROM akun LEFT JOIN customer USING (id_akun) WHERE customer.id_akun IS NULL AND akun.role = 3")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer/create', $data);
        $this->load->view('admin/footer');
    }
    public function edit_customer($id)
    {
        $data['customer'] = $this->M_template->view_where('customer', ['id_customer' => $id])->result();
        $data['akun'] = $this->M_template->query("SELECT akun.* FROM akun LEFT JOIN customer USING (id_akun) WHERE customer.id_akun IS NULL AND akun.role = 3")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/customer/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_customer()
    {
        $data = $this->input->post();
        $this->M_template->insert('customer', $data);
        redirect('cms/admin/customer');
    }
    public function update_customer($id)
    {
        $data = $this->input->post();
        $this->M_template->update('customer', ['id_customer' => $id], $data);
        // $this->M_template->insert('customer', $data);
        redirect('cms/admin/customer');
    }
    public function delete_customer($id)
    {
        $customer = $this->M_template->view_where('customer', ['id_customer' => $id])->row();
        $this->M_template->update('akun', ['id_akun' => $customer->id_akun], ['status' => 0]);
        redirect('cms/admin/customer');
    }
    // ------------------------------
    // ------------------------------
    // ------------------------------
    // vendor
    public function vendor()
    {
        $data['vendor'] = $this->M_template->query("SELECT * FROM vendor JOIN akun USING (id_akun)")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/vendor/index', $data);
        $this->load->view('admin/footer');
    }
    public function vendorku($id)
    {
        $data['vendor'] = $this->M_template->view_where('vendor', ['id_vendor' => $id])->result();
        $this->load->view('admin/header');
        $this->load->view('admin/vendor/detail', $data);
        $this->load->view('admin/footer');
    }
    public function create_vendor()
    {
        $data['akun'] = $this->M_template->query("SELECT akun.* FROM akun LEFT JOIN vendor USING (id_akun) WHERE vendor.id_akun IS NULL AND akun.role = 2")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/vendor/create', $data);
        $this->load->view('admin/footer');
    }
    public function edit_vendor($id)
    {
        $data['vendor'] = $this->M_template->view_where('vendor', ['id_vendor' => $id])->row();
        $data['akun'] = $this->M_template->query("SELECT akun.* FROM akun LEFT JOIN vendor USING (id_akun) WHERE vendor.id_akun IS NULL AND akun.role = 2")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/vendor/edit', $data);
        $this->load->view('admin/footer');
    }
    public function save_vendor()
    {
        $data = $this->input->post();
        $config = array(
            'upload_path' => './asset/corporate/vendor/',
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
        $this->M_template->insert('vendor', $data);
        redirect('cms/admin/vendor');
    }
    public function update_vendor($id)
    {
        $data = $this->input->post();
        $this->M_template->update('vendor', ['id_vendor' => $id], $data);
        // $this->M_template->insert('vendor', $data);
        redirect('cms/admin/vendor');
    }
    public function delete_vendor($id)
    {
        $this->M_template->delete('vendor', ['id_vendor' => $id]);
        redirect('cms/admin/vendor');
    }
    public function delete_vendor_foto($id)
    {
        $this->M_template->update('vendor', ['id_vendor' => $id], ['foto' => json_encode($this->input->post('foto'))]);
    }
    public function add_vendor_foto($id)
    {
        $vendor = $this->M_template->view_where('vendor', ['id_vendor' => $id])->row();
        $foto_array = json_decode($vendor->foto);

        $config = array(
            'upload_path' => './asset/corporate/vendor/',
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
        $this->M_template->update('vendor', ['id_vendor' => $id], ['foto' => json_encode($foto_array)]);
        redirect('cms/admin/edit_vendor/' . $id);
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
