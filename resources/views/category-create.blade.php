<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pelanggan Create</title>
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

    <form method="POST" enctype="multipart/form-data" action="{{ route('category-store') }}">
    @CSRF
    <h2>Form Category</h2>
    <div class="mb-3">
        <label for="id_category" class="form-label">ID Category</label>
        <input type="text" class="form-control" id="id_category" name="id_category">
    </div>
    <div class="mb-3">
        <label for="nama_category" class="form-label">Nama Category</label>
        <input type="text" class="form-control" id="nama_category" name="nama_category">
    </div>
    <div class="mb-3">
        <label for="pop_rate" class="form-label">Pop Rate</label>
        <input type="text" class="form-control" id="pop_rate" name="pop_rate">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>




    </div>


    <!-- Link ke JavaScript Bootstrap (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
