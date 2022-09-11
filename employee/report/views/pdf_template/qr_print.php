<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>QR Code Absensi</title>

	<style type="text/css">
		* {
			font-family: Verdana, Arial, sans-serif;
		}

		table {
			font-size: x-small;
		}

		tfoot tr td {
			font-weight: bold;
			font-size: x-small;
		}

		.gray {
			background-color: #f2c195
		}
	</style>

</head>

<body style="background-image: url('<?php echo base_url() . $page[0]->logo_website ?>'); opacity: 0.1; background-repeat: no-repeat;background-attachment: fixed;background-position: center;">
	<br>
	<table width="100%">
		<thead>
			<tr>
				<th style="font-size:30px">ABSENSI PEGAWAI <?php echo $page[0]->nama_website; ?></th>
			</tr>
		</thead>
	</table>
	<br>
	<table width="100%">
		<tbody>
			<tr>
				<br>
			</tr>
			<tr>
				<br>
			</tr>
			<tr>
				<br>
			</tr>
			<tr>
				<th scope="row" align="center">
					<img width="300" src="<?php echo base_url() . $qrcode[0]->foto_qrcode; ?>">
				</th>
			</tr>
			<tr>
				<br>
			</tr>
			<tr>
				<br>
			</tr>
			<tr>
				<br>
			</tr>
			<tr>
				<br>
			</tr>
			<tr>
				<th style="font-size:16px; font-weight:normal; color:red" scope="row" align="center"><?php echo ucwords(strtolower($qrcode[0]->keterangan_qrcode)); ?></th>
			</tr>
		</tbody>
	</table>
</body>

</html>
