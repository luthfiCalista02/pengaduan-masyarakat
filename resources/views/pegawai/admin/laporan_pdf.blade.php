<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Pengaduan Masyarakat</h2>
    <p>Bulan: {{ $bulan }} | Tahun: {{ $tahun }} | Status: {{ ucfirst($status) }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Masyarakat</th>
                <th>Judul Pengaduan</th>
                <th>Isi Pengaduan</th>
                <th>Lokasi</th>
                <th>Waktu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduan as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $data->nama_masyarakat }}</td>
                    <td>{{ $data->judul_pengaduan }}</td>
                    <td>{{ $data->isi_pengaduan }}</td>
                    <td>{{ $data->lokasi }}</td>
                    <td>{{ $data->waktu }}</td>
                    <td>{{ ucfirst($data->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
