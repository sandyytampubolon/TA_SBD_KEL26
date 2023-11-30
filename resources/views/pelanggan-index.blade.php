<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <!-- Include Bootstrap CSS (you can replace the CDN link with your local file if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">TA SBD KEL 10</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pelanggan-index')}}">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk-index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Merk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Transaksi</a>
                </li>

            </ul>

        </div>
    </div>
</nav>



<div class="container mt-5">
    <h2>Pelanggan Table</h2>
    <a type="button" class="btn btn-info" href="{{route('pelanggan-create')}}">ADD PRODUK</a>
    <table class="table">
    <thead>
    <tr>
        <th>ID Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Loyalty Rank</th>
    </tr>
</thead>

        @php $no = 1; @endphp @foreach($dataPelanggan as $row)
    <tbody>
        <tr>
            <th scope="row">{{ $row->id_pelanggan }}</th>
            <td>{{ $row->nama_pelanggan }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->loyalty_rank }}</td>
            <td>
                <a type="button" class="btn btn-danger" href="{{ route('pelanggan-delete', $row->id_pelanggan) }}">Delete</a>
                <a type="button" class="btn btn-info" href="{{ route('pelanggan-show', $row->id_pelanggan) }}">Edit</a>
            </td>
        </tr>
    </tbody>
@endforeach
    </table>
</div>

<!-- Include Bootstrap JS (you can replace the CDN link with your local file if needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
