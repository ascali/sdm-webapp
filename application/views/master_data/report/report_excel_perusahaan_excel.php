<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".date('Y-m-d')."_report_excel_data_perusahaan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
	<caption>Tabel Laporan Pegawai Per Perusahaan</caption>
	<thead>
		<tr>
			<th>Nama</th>
			<th>NID</th>
			<th>Perusahaan</th>
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
	<?php foreach ($data2 as $item): ?>
	<tbody>
		<tr>
			<td><?=$item['nama']?></td>
			<td><?=$item['nid']?></td>
			<td><?=$item['status_kepegawaian']?></td>
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