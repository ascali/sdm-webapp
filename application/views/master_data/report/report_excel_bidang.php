
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report</h3>
              <br>
              <!-- <button class="btn btn-primary" onclick="add()"><span class="fa fa-plus"></span>&nbsp; Tambah</button> -->
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <form action="<?=base_url('generate/report')?>" method="post" accept-charset="utf-8">
                  <div class="form-group">
                    <label for="sel1"><font color="red"><b>*</b></font>  Laporan Berdasarkan : </label>
                    <select class="form-control" id="sel1" name="datareport">
                      <option value="bidang">Bidang</option>
                      <option value="perusahaan">Perusahaan</option>
                      <option value="pelatihan">Pelatihan</option>
                      <option value="sertifikasi">Sertifikasi</option>
                    </select>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary">Generate</button>
                </form>
                <br>
              </div>
            </div> <hr>
<div class="table-responsive">

<table class="table table-striped table-bordered table-hover example">
	<!-- <caption>Tabel Laporan Pegawai Per Bidang</caption> -->
	<thead>
		<tr>
			<th>Nama</th>
			<th>NID</th>
			<th>Bidang</th>
			<th>Jabatan</th>
			<th>Devisi</th>
			<th>Temapat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Agama</th>
			<th>Email</th>
			<th>No. Handphone</th>
			<th>Alamat</th>
			<th>Pendidikan</th>
			<th>Tanggal Masuk</th>
			<th>No. Rekening</th>
			<th>NPWP</th>
			<th>Cost Center</th>
			<th>Grade</th>
			<th>Skala</th>
			<th>Shift</th>
		</tr>
	</thead>
	<?php foreach ($data1 as $item): ?>
	<tbody>
		<tr>
			<td><?=$item['nama']?></td>
			<td><?=$item['nid']?></td>
			<td><?=$item['nama_bidang']?></td>
			<td><?=$item['level_jabatan']?></td>
			<td><?=$item['devisi']?></td>
			<td><?=$item['tempat_lahir']?></td>
			<td><?=$item['tanggal_lahir']?></td>
			<td><?=$item['agama']?></td>
			<td><?=$item['email']?></td>
			<td><?=$item['no_telp']?></td>
			<td><?=$item['alamat']?></td>
			<td><?=$item['pendidikan_terakhir']?></td>
			<td><?=$item['tanggal_masuk']?></td>
			<td><?=$item['no_rekening']?></td>
			<td><?=$item['npwp']?></td>
			<td><?=$item['cost_center']?></td>
			<td><?=$item['grade']?></td>
			<td><?=$item['skala']?></td>
			<td><?=$item['shift']?></td>
		</tr>
	</tbody>
	<?php endforeach ?>
</table>
</div>
<hr>
<div class="row">
	<div class="col-md-1">
		<form action="<?=base_url('generate/report2')?>" method="post" accept-charset="utf-8">
			<input type="hidden" name="datareport2" value="bidang">
			<button type="submit" class="btn btn-primary">Excel</button>
		</form>
	</div>
	<div class="col-md-1">
		<form action="<?=base_url('generate/report3')?>" method="post" accept-charset="utf-8">
			<input type="hidden" name="datareport3" value="bidang">
			<button type="submit" class="btn btn-primary">PDF</button>
		</form>
	</div>	
</div>

<br><br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div> 
        
        <!-- /#page-wrapper -->
