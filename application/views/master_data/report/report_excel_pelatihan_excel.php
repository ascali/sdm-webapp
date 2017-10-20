<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".date('Y-m-d')."_report_excel_data_pelatihan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
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