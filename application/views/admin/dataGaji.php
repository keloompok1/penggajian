<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
    
</div>

<div class="card mb-3">
  <div class="card-header" bg-primary text-white>
    Filter Data Gaji Karyawan
  </div>
  <div class="card-body">
      
  <form class="form-inline">
      <div class="form-group mb-2">
          <label for="staticEmail2">Bulan:</label>
          <select class="form-control ml-3" name="bulan">
                <option value="">--Pilih Bulan--</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
        </select>
      </div>

      <div class="form-group ml-5">
          <label for="staticEmail2">Tahun: </label>
          <select class="form-control ml-3" name="tahun">
                <option value="">--Pilih Tahun--</option>
                <?php $tahun = date('Y');
                for($i=2017;$i<$tahun+1;$i++) { ?>
                <option value="<?php echo $i?>"><?php echo $i ?></option>
                
            <?php } ?>
        </select>
      </div>
        <button type="submit" class="btn btn-primary ml-3 ml-auto"><i class="fas fa-eye"></i>Tampilkan Data</button>
</form>

  </div>
</div>

<?php 

if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $bulantahun = $bulan.$tahun;

}else{
    $bulan = date('m');
    $tahun = date('Y');
    $bulantahun = $bulan.$tahun;

}

?>


<div class="alert alert-info">
    Menampilkan Data Gaji Pegawai Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> 
    Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
</div>

<?php 
$jml_data = count($gaji);
if($jml_data > 0) { ?>

<div class="table-responsive">
    <table class="table table-bordered table striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tunjangan Karyawan</th>
            <th class="text-center">Pajak Karyawan</th>
            <th class="text-center">Potongan Gaji</th>
            <th class="text-center">Total Gaji</th>
        </tr>

        <?php foreach ($potongan as $p) {
            $tanpa_keterangan=$p->jmlh_potongan;
          }  ?>

        
    <?php $no=1; foreach ($gaji as $g) : ?>
        <?php $potongan = $g->tanpa_keterangan * $tanpa_keterangan ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $g->nip ?></td>
            <td><?php echo $g->nama_karyawan ?></td>
            <td><?php echo $g->jenis_kelamin ?></td>
            <td><?php echo $g->nama_jabatan ?></td>
            <td>Rp.<?php echo number_format ($g->gaji_pokok,0,',','.') ?></td>
            <td>Rp.<?php echo number_format ($g->tj_karyawan,0,',','.') ?></td>
            <td>Rp.<?php echo number_format ($g->pajak_karyawan,0,',','.') ?></td>
            <td>Rp.<?php echo number_format ($potongan,0,',','.') ?></td>
            <td>Rp.<?php echo number_format ($g->gaji_pokok + $g->
            tj_karyawan - $g->pajak_karyawan + $potongan,0,',','.') ?></td>

            

        </tr>

    <?php endforeach; ?>
    </table><br><br><br><br><br>
</div>

<?php }else{ ?>
    <span class="badge badge-danger">
        <i class="fas fa-info-circle"></i>
        Data belum terisi, silahkan input data kehadiran pada bulan dan tahun yang anda pilih!
    </span>
<?php } ?>


</div>

