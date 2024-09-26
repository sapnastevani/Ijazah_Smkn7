<?php
class Siswa {

    private $mysqli;

    function __construct($conn) {
        $this->mysqli = $conn;

    }
    public function tampil($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_siswa";
        if($id != null) {
            $sql .= " WHERE No_Induk_Siswa = $id"; 
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($Nama_Siswa, $No_Induk_Siswa, $Tempat_Tanggal_Lahir, $Alamat_Siswa, $Kelas, $Tahun_Lulus, $berkas){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO tb_siswa VALUES ('', '$Nama_Siswa', '$No_Induk_Siswa', '$Tempat_Tanggal_Lahir', '$Alamat_Siswa', '$Kelas', '$Tahun_Lulus', '$berkas')") or die ($db->error);
    }
}
?>