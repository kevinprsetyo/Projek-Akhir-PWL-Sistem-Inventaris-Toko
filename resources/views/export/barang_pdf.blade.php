<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h3>Laporan Inventaris Barang</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Supplier</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $i => $b)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $b->namabarang }}</td>
                <td>{{ $b->stok }}</td>
                <td>Rp {{ number_format($b->harga,0,',','.') }}</td>
                <td>{{ $b->supplier }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
