<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencari Data Desa</title>
</head>
<body>
    <style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

    <p>Cari Data Desa</p>
    <form action="/cariDesa" method="GET">
        <input type="text" name="cari" placeholder="Masukkan Nama Desa">
        <input type="submit" value="CARI">
    </form>

    <br/>

    <table border='1'>
        <tr>No</tr>
        <tr>Nama Desa</tr>

        @foreach($dataDesa as $d)
        <tr>
            <td>{{ $d->nama_desa }}</td>
        </tr>
        @endforeach
    </table>

    {{ $dataDesa->links() }}
</body>
</html>