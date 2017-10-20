<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".date('Y-m-d')."_report_excel_data_sertifikasi.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
	<caption>Tabel Laporan Sertifikasi Pegawai</caption>
	<thead>
		<tr>
			<th>Nama</th>
			<th>NID</th>
			<th>Perusahaan</th>
			<th>Bidang</th>
			<th>Jabatan</th>
			<th>Devisi</th>
			<th>Sertifikasi</th>
			<th>Status</th>
			<th>Lembaga</th>
			<th>TGL E Awal</th>
			<th>TGL E Akhir</th>
		</tr>
	</thead>
	<?php foreach ($data_ser as $item): ?>
	<tbody>
		<tr>
			<td><?=$item['nama']?></td>
			<td><?=$item['nid']?></td>
			<td><?=$item['status_kepegawaian']?></td>
			<td><?=$item['nama_bidang']?></td>
			<td><?=$item['level_jabatan']?></td>
			<td><?=$item['devisi']?></td>
			<td><?=$item['nama_sertifikasi']?></td>
			<td><?=$item['status_sertifikasi']?></td>
			<td><?=$item['lembaga_sertifikasi']?></td>
			<td><?=$item['tanggal_expaired_awal']?></td>
			<td><?=$item['tanggal_expired_akhir']?></td>
		</tr>
	</tbody>
	<?php endforeach ?>
</table>
<br>
<hr>
<p><b>Note : </b></p>
<ol>
	<li>E = Expired</li>
	<li>TGL = Tanggal</li>
</ol>