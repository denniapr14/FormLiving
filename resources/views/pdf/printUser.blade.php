<!DOCTYPE html>
<html>

<head>
	<title>Laporan User Formsliving via Admin Formsliving</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<style type="text/css">
		table tr td,
		table tr th {
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>laporan User Forms Living Per Tanggal {{ $waktuNow }}</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode User</th>
				<th>Nama</th>
				<th>Email</th>
				<th> Nomor Telepon</th>
				<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($userAll as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $p->code_id_ua }}</td>
				<td>{{$p->nama_ua}}</td>
				<td>{{$p->email_ua}}</td>
				<td>{{$p->no_tlp_ua}}</td>
				<td>{{ date("d M Y", strtotime($p->tgl_input_ua)) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>

</html>