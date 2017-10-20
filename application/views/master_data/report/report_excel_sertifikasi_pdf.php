<div style="margin-left: 2%; margin-right: 2%;">

<br>
<div style="text-align: center; font-weight: bold;"><img src="<?php echo base_url('public/images/logo_pjb.jpg'); ?>" alt="" width="10%"></div>
<div style="text-align: right; font-weight: bold;"><u>Sertifikasi Pegawai </u></div>

<table style="color: #000; font-family: Helvetica, Arial, sans-serif; width: 640px; border-collapse: collapse; border-spacing: 0;" border="1">
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

<br>
<hr>

<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>

<td width="33%"><span style="font-weight: bold; font-style: italic;"><u><b>SDM Management</b></u></span></td>



<td width="33%" style="text-align: right; "><?= date("D, d - M - Y"); ?></td>

</tr></table>

</div>