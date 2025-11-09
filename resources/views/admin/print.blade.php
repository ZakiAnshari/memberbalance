<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        @page {
            margin: 25mm;
        }
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 20px;
            background: #fff;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #444;
            padding: 7px 6px;
        }
        th {
            background: #f0f0f0;
            text-transform: uppercase;
            font-weight: 600;
            text-align: center;
        }
        tr:nth-child(even) td {
            background-color: #fafafa;
        }
        tr:hover td {
            background-color: #f5f5f5;
        }

        .footer {
            margin-top: 50px;
            width: 100%;
        }
        .footer .ttd {
            float: right;
            text-align: center;
            width: 220px;
        }
        .footer .ttd p {
            margin: 3px 0;
        }
        .footer .ttd .name {
            margin-top: 70px;
            font-weight: bold;
            text-decoration: underline;
        }
        .no-print {
            text-align: right;
            margin-bottom: 10px;
        }
        .btn-print {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-print:hover {
            background-color: #0056b3;
        }
        @media print {
            .no-print { display: none; }
            body { margin: 0; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN TRANSAKSI</h2>
        <p>Tanggal Cetak: {{ now()->format('d F Y H:i') }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Member</th>
                <th>Tipe</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $trx)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $trx->member->name ?? '-' }}</td>
                    <td style="text-align: center;">{{ ucfirst($trx->tipe) }}</td>
                    <td style="text-align: right;">Rp {{ number_format($trx->nominal, 0, ',', '.') }}</td>
                    <td>{{ $trx->keterangan ?? '-' }}</td>
                    <td style="text-align: center;">{{ \Carbon\Carbon::parse($trx->created_at)->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #777;">Tidak ada data transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <div class="ttd">
            <p>Jakarta Selatan, {{ now()->translatedFormat('d F Y') }}</p>
            <p><strong>PT Buana Media Teknologi</strong></p>
            <p class="name">_________________________</p>
        </div>
    </div>


    <script>
        window.onload = () => window.print();
    </script>
</body>
</html>
