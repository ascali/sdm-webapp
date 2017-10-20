<div style="margin-left: 2%; margin-right: 2%;">

<br>
<div style="text-align: center; font-weight: bold;"><img src="<?php echo base_url('public/images/logo_pjb.jpg'); ?>" alt="" width="10%"></div>
<div style="text-align: right; font-weight: bold;"><u>Pelatihan Pegawai</u></div>

<table style="color: #000; font-family: Helvetica, Arial, sans-serif; width: 640px; border-collapse: collapse; border-spacing: 0;" border="1">
	<caption>Tabel Laporan Pelatihan Pegawai</caption>
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

<br>
<hr>

<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>

<td width="33%"><span style="font-weight: bold; font-style: italic;"><u><b>SDM Management</b></u></span></td>



<td width="33%" style="text-align: right; "><?= date("D, d - M - Y"); ?></td>

</tr></table>

</div>