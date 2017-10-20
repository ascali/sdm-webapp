
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
	<thead>
		<tr>
			<th>Nama</th>
			<th>NID</th>
			<th>Perusahaan</th>
			<th>Bidang</th>
			<th>Jabatan</th>
			<th>Devisi</th>
			<th>Judul Pelatihan</th>
			<th>JPP</th>
			<th>JPR</th>
			<th>LP</th>
			<th>TGL P Awal</th>
			<th>TGL P Akhir</th>
			<th>Status Pelatihan</th>
			<th>TGL Permintaan</th>
		</tr>
	</thead>
	<?php foreach ($data_pel as $item): ?>
	<tbody>
		<tr>
			<td><?=$item['nama']?></td>
			<td><?=$item['nid']?></td>
			<td><?=$item['status_kepegawaian']?></td>
			<td><?=$item['nama_bidang']?></td>
			<td><?=$item['level_jabatan']?></td>
			<td><?=$item['devisi']?></td>
			<td><?=$item['judul_pelatihan']?></td>
			<td><?=$item['jumlah_peserta']?></td>
			<td><?=$item['jumlah_peserta_realisasi']?></td>
			<td><?=$item['lembaga_pelatihan']?></td>
			<td><?=$item['pelaksanaan_awal']?></td>
			<td><?=$item['pelaksanaan_akhir']?></td>
			<td><?=$item['status_pelatihan']?></td>
			<td><?=$item['created']?></td>
		</tr>
	</tbody>
	<?php endforeach ?>
</table>
</div>
<br>
<hr>
<p><b>Note : </b></p>
<ol>
	<li>JPP = Jumlah Permintaan Peserta</li>
	<li>JPR = Jumlah Peserta Realisasi</li>
	<li>TGL = Tanggal</li>
	<li>LP  = Lembaga Pelatihan</li>
	<li>P   = Pelaksanaan</li>
</ol>

<hr>
<div class="row">
	<div class="col-md-1">
		<form action="<?=base_url('generate/report2')?>" method="post" accept-charset="utf-8">
			<input type="hidden" name="datareport2" value="pelatihan">
			<button type="submit" class="btn btn-primary">Excel</button>
		</form>
	</div>
	<div class="col-md-1">
		<form action="<?=base_url('generate/report3')?>" method="post" accept-charset="utf-8">
			<input type="hidden" name="datareport3" value="pelatihan">
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
