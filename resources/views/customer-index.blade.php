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
        <a class="navbar-brand" href="#">VINYL STORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('customer-index')}}">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vinyl-index') }}">Vinyl</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category-index')}}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('trans-index')}}">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('join-index')}}">Join</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-5">
    <h2>Customer Table</h2>
    <a type="button" class="btn btn-info" href="{{ route('customer-create') }}">ADD CUSTOMER</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Customer</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>Age</th>
            </tr>
        </thead>

        @php $no = 1; @endphp
        @foreach($dataCustomer as $row)
            <tbody>
                <tr>
                    <th scope="row">{{ $row->id_customer }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->age }}</td>
                    <td>
                        <a type="button" class="btn btn-danger" href="{{ route('customer-delete', $row->id_customer) }}">Delete</a>
                        <a type="button" class="btn btn-info" href="{{ route('customer-show', $row->id_customer) }}">Edit</a>
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
