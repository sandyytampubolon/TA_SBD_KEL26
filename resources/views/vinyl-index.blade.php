<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinyl Table</title>
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
    <h2>Vinyl Table</h2>
    <a type="button" class="btn btn-info" href="{{route('vinyl-create')}}">ADD VINYL</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Vinyl</th>
                <th>Nama Vinyl</th>
                <th>Price</th>
                <th>ID Category</th>
            </tr>
        </thead>
        @php $no = 1; @endphp @foreach($dataVinyl as $row)
                    <tbody>
                        <tr>
                            <th scope="row">{{$row->id_vinyl}}</th>
                            <td>{{$row->nama_vinyl}}</td>
                            <td>{{$row->price}}</td>
                            <td>{{$row->fk_id_category}}</td>
                            <td>
                                <a type="button" class="btn btn-danger" href="{{route('vinyl-delete', $row->id_vinyl)}}">Delete</a>
                                <a type="button" class="btn btn-danger" href="{{route('vinyl-softdelete', $row->id_vinyl)}}">Soft Delete</a>
                                <a type="button" class="btn btn-info" href="{{route('vinyl-show',$row->id_vinyl)}}">Edit</a>
                            </td>
                    </tbody>
                    @endforeach
    </table>
</div>

<!-- Include Bootstrap JS (you can replace the CDN link with your local file if needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
