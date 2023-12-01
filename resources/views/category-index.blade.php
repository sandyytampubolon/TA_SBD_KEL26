<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merk Table</title>
    <!-- Include Bootstrap CSS (you can replace the CDN link with your local file if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


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
    <h2>Category Table</h2>
    <a type="button" class="btn btn-info" href="{{route('category-create')}}">ADD CATEGORY</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Category</th>
                <th>Nama Category</th>
                <th>Pop Rate</th>
            </tr>
        </thead>

        @php $no = 1; @endphp @foreach($dataCategory as $row)
        <tbody>
            <tr>
                <th scope="row">{{$row->id_category}}</th>
                <td>{{$row->nama_category}}</td>
                <td>{{$row->pop_rate}}</td>
                <td>
                    <a type="button" class="btn btn-danger" href="{{route('category-delete', $row->id_category)}}">Delete</a>
                    <a type="button" class="btn btn-danger" href="{{route('category-softdelete', $row->id_category)}}">Soft Delete</a>
                    <a type="button" class="btn btn-info" href="{{route('category-show',$row->id_category)}}">Edit</a>
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
