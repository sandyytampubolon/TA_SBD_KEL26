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
                    <a class="nav-link" href="{{route('merk-index')}}">Merk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('trans-index')}}">Transaksi</a>
                </li>

            </ul>

        </div>
    </div>
</nav>



<div class="container mt-5">
    <h2>Transaction Table</h2>
    <a type="button" class="btn btn-info" href="{{route('trans-create')}}">ADD TRANSAKSI</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Transaction</th>
                <th>Item Name</th>
                <th>Transaction Date</th>
                <th>Customer ID</th>
                <th>Item Amount</th>
            </tr>
        </thead>

        @php $no = 1; @endphp
        @foreach($dataTrans as $row)
            <tbody>
                <tr>
                    <th scope="row">{{$row->id_transaction}}</th>
                    <td>{{$row->fk_id_item}}</td>
                    <td>{{$row->transaction_date}}</td>
                    <td>{{$row->fk_id_pelanggan}}</td>
                    <td>{{$row->item_amount}}</td>
                    <td>
                        <a type="button" class="btn btn-danger" href="{{route('trans-delete', $row->id_transaction)}}">Delete</a>
                        <a type="button" class="btn btn-danger" href="{{route('trans-softdelete', $row->id_transaction)}}">Soft Delete</a>
                        <a type="button" class="btn btn-info" href="{{route('trans-show',$row->id_transaction)}}">Edit</a>
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
