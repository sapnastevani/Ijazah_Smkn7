<?php
include "models/m_siswa.php";

$siswa = new Siswa($connection);
?>
<div class="row">
          <div class="col-lg-12">
            <h1>Siswa <small>Data Siswa</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Siswa</a></li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            
<div class="row">
    <div class="col-ig-12">

    </div class="table-resposive">
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No.</th>
            <th>Nama_Siswa</th>
            <th>No_Induk_Siswa</th>
            <th>Tempat_Tanggal_Lahir</th>
            <th>Alamat_Siswa</th>
            <th>Kelas</th>
            <th>Tahun_Lulus</th>
            <th>Title</th>
            <th>Ekstensi</th>
            <th>size</th>
            <th>berkas</th>
            <th>opsi</th>
        </tr>
        <?php
        $no = 1;
        $tampil = $siswa->tampil();
        while($data = $tampil->fetch_object()){

        ?>
        <tr>
          <td align="center"><?php echo $no++."."; ?></td>
          <td><?php echo $data->Nama_Siswa; ?></td>
          <td><?php echo $data->No_Induk_Siswa; ?></td>
          <td><?php echo $data->Tempat_tanggal_lahir; ?></td>
          <td><?php echo $data->Alamat_Siswa; ?></td>
          <td><?php echo $data->Kelas; ?></td>
          <td><?php echo $data->Tahun_Lulus; ?></td>
          <td><?php echo $data->Title; ?></td>
          <td><?php echo $data->Ekstensi; ?></td>
          <td><?php echo $data->size; ?></td>
          <td><?php echo $data->berkas; ?></td>
          <td align="center">

          <button class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</button>
          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</button>
        </td>
        </tr>
        <?php
        } ?>
    </table>
</div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>

        <div id="tambah" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah Data Siswa</h4>

          </div>
          <form action="" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="Nama_Siswa">Nama Siswa</label>
                  <input type="text" name="Nama_siswa" class="form-control" id="Nama_siswa" required>
          </div>
                <div class="form-group">
                  <label class="control-label" for="No_Induk_Siswa">No Induk siswa</label>
                  <input type="number" name="No_Induk_Siswa" class="form-control" id="No_Induk_Siswa" required>
          </div>
          <div class="form-group">
                  <label class="control-label" for="Tempat_Tanggal_Lahir">Tempat tanggal lahir</label>
                  <input type="text" name="Tempat_Tanggal_Lahir" class="form-control" id="Tempat_Tanggal_Lahir" required>
          </div>
          <div class="form-group">
                  <label class="control-label" for="Alamat_Siswa">Alamat Siswa</label>
                  <input type="text" name="Alamat_Siswa" class="form-control" id="Alamat_Siswa" required>
          </div>
          <div class="form-group">
                  <label class="control-label" for="Kelas">Kelas</label>
                  <input type="text" name="Kelas" class="form-control" id="Kelas" required>
          </div>
          <div class="form-group">
                  <label class="control-label" for="Tahun_Lulus">Tahun Lulus</label>
                  <input type="number" name="Tahun_Lulus" class="form-control" id="Tahun_Lulus" required>
          </div>
          <div class="form-group">
                  <label class="control-label" for="berkas">Upload file (PDF)</label>
                  <input type="file" name="berkas" class="form-control" id="berkas " required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class = "btn btn-danger">Reset</button>
        <input type="submit" class = "btn btn-success" name="tambah" value="simpan"> 
        </form>
        <?php
        if(@$_POST['tambah']) {
          $Nama_Siswa = $connection->conn->real_escape_string($_POST['Nama_Siswa']);
          $No_Induk_Siswa = $connection->conn->real_escape_string($_POST['No_Induk_Siswa']);
          $Tempat_Tanggal_Lahir = $connection->conn->real_escape_string($_POST['Tempat_Tanggal_Lahir']);
          $Alamat_Siswa = $connection->conn->real_escape_string($_POST['Alamat_Siswa']);
          $Kelas = $connection->conn->real_escape_string($_POST['Kelas']);
          $Tahun_Lulus = $connection->conn->real_escape_string($_POST['Tahun_Lulus']);
          $berkas = $connection->conn->real_escape_string($_POST['berkas']);

          $ekstensi = explode(".". $_FILES['berkas']['name']);
          $berkas = "berkas-". round(microtime(true)).".".end($ekstensi);
          $sumber = $_FILES['berkas']['tmp_name'];
          $upload = move_uploaded_file($sumber, "assets/img/siswa/".$berkas);
          if($upload){
            $siswa-> tambah($Nama_Siswa, $No_Induk_Siswa, $Tempat_Tanggal_Lahir, $Alamat_Siswa, $Kelas, $Tahun_Lulus, $berkas);
            header("location: ?page=siswa");
          } else {
            echo "<script>alert('Upload berkas gagal!')</script>";
          }
        }
        ?>

        </div>
        </div>
        </div>

        </div>
        </div>