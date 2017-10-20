
<div style="margin-left: 2%; margin-right: 2%;">

<br>
<div style="text-align: center; font-weight: bold;"><img src="<?php echo base_url('public/images/logo_pjb.jpg'); ?>" alt="" width="10%"></div>
<div style="text-align: right; font-weight: bold;"><u>Pegawai Per Bidang</u></div>

<table style="color: #000; font-family: Helvetica, Arial, sans-serif; width: 640px; border-collapse: collapse; border-spacing: 0;" border="1">
	<caption>Tabel Laporan Pegawai Per Bidang</caption> <br> <hr> <br>
	<thead style="border: 1px solid #CCC; height: 30px; background: #F3F3F3; font-weight: bold;">
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
	<tbody style="background: #FAFAFA; text-align: center; font-weight: bold;">
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

<br>
<hr>

<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>

<td width="33%"><span style="font-weight: bold; font-style: italic;"><u><b>SDM Management</b></u></span></td>



<td width="33%" style="text-align: right; "><?= date("D, d - M - Y"); ?></td>

</tr></table>

</div>