<?php
class Rekap extends CI_Model {
    public function get_all_nilai() {
        $query = $this->db->query("SELECT mahasiswa.id_mahasiswa, mahasiswa.nama, mahasiswa.jurusan, nilai.nilai FROM mahasiswa INNER JOIN nilai ON nilai.id_mahasiswa = mahasiswa.id_mahasiswa;");
        return $query->result_array();
    }

    public function update_nilai($id_mahasiswa, $nilai_baru) {
        // Query update ke tabel nilai
        $this->db->set('nilai', $nilai_baru);
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->update('nilai');
    }
}
