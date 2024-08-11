<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Hasil Akhir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h5 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h5>Ranking Hasil Akhir</h5>
    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Kode Alternatif</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranking as $index => $kode)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kode }}</td>
                    <td>{{ number_format($vectorV[$kode], 4) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
