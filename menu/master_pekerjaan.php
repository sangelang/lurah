<?php

//Akses tanpa login
if (!isset($_SESSION['username'])) {
		echo '<script>alert("PERHATIAN!! Silahkan Login Dulu!")</script>';
		echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		header('location:../index.php');
	}
	
include "library/koneksi.php";
?>
  <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Master Data Pekerjaan</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
<?php
echo"<form method='POST' action='media.php?mn=master_pekerjaan_tambah'>
<p><button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-plus'></span> Tambah</button></p>
</form>";
?>
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
              <th>No</th>
              <th>Nama Pekerjaan</th>
              <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
<?php
  $no=1;
  $master_pekerjaan = mysql_query("SELECT * from tblpekerjaan");
  while ($mpk=mysql_fetch_array($master_pekerjaan))
  {
    echo"<tr>
          <td>$no</td>
          <td>".strtoupper($mpk['NamaPekerjaan'])."</td>
          <td>
          <div class='btn-group'>
      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
      <span class='glyphicon glyphicon-cog'> Pilih
          <span class='caret'></span>
        </button>
        <ul class='dropdown-menu'>
        <li><a href=?mn=master_pekerjaan_edit&id=$mpk[PekerjaanID]><span class='glyphicon glyphicon-pencil'> Edit</span></a></li>
      <li><a href=?mn=master_pekerjaan_hapus&id=$mpk[PekerjaanID] onclick=\"return confirm('apakah akan menghapus menu $mpk[NamaPekerjaan]')\"><span class='glyphicon glyphicon-trash'> Delete</span></a></li>
      </div></td>
      </tr>";
      $no++;
  } 
  echo"</tbody>
      </table>";
echo"</div></div></div></div></div>";

?>
