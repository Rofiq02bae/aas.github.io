<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Rekap');
    }

    public function index() {
        $data['nilai_mahasiswa'] = $this->Rekap->get_all_nilai();

        $this->load->view('admin/head');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }

    public function edit_nilai() {
        // Tangkap data dari form
        $id_mahasiswa = $this->input->post('id_mahasiswa');
        $nilai_baru = $this->input->post('nilai');

        // Validasi sederhana
        if ($id_mahasiswa && is_numeric($nilai_baru)) {
            // Update nilai ke database
            $this->Rekap->update_nilai($id_mahasiswa, $nilai_baru);
        }

        // Redirect kembali ke dashboard
        redirect('dashboard');
    }
}
