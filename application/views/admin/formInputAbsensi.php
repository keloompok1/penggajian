<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
</div>
<div class="card mb-3">
  <div class="card-header" bg-primary texxt-white>
    Input Absensi Karyawan
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
        <button type="submit" class="btn btn-primary ml-3 ml-auto"><i class="fas fa-eye"></i>Generate</button>
        
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
    Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> 
    Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
</div>

<form method="POST">
<button class="btn btn-success mb-3" type="submit" name="submit" value="submit">Simpan</button>
<table class="table table-bordered table-striped">
    <tr>
        <td class="text-center">No</td>
        <td class="text-center">NIP</td>
        <td class="text-center">Nama Karyawan</td>
        <td class="text-center">Jenis Kelamin</td>
        <td class="text-center">Jabatan</td>
        <td class="text-center" width="8%">Hadir</td>
        <td class="text-center" width="8%">Sakit</td>
        <td class="text-center" width="6%">Tanpa Keterangan</td>
    </tr>

    <?php $no=1; foreach($input_absensi as $b) : ?>
        <tr>
            <input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulantahun ?>">
            <input type="hidden" name="nip[]" class="form-control" value="<?php echo $b->nip ?>">
            <input type="hidden" name="nama_karyawan[]" class="form-control" value="<?php echo $b->nama_karyawan ?>">
            <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?php echo $b->jenis_kelamin ?>">
            <input type="hidden" name="nama_jabatan[]" class="form-control" value="<?php echo $b->nama_jabatan ?>">
            


            <td><?php echo $no++ ?></td>
            <td><?php echo $b->nip ?></td>
            <td><?php echo $b->nama_karyawan ?></td>
            <td><?php echo $b->jenis_kelamin ?></td>
            <td><?php echo $b->nama_jabatan ?></td>
            <td><input type="number" class="form-control" name="hadir[]" value="0"></td>
            <td><input type="number" class="form-control" name="sakit[]" value="0"></td>
            <td><input type="number" class="form-control" name="tanpa_keterangan[]" value="0"></td>
        </tr>
        
    <?php endforeach; ?>
</table><br><br><br><br><br>
</form>

</div>





