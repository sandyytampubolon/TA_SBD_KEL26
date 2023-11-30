@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Selamat Datang!!') }}
                   
                </div>
               
            </div>
            <button type="button" class="btn btn-primary">
                <a href="{{ route('produk-index') }}" style="color: white; text-decoration: none;">
                    {{ __('Ke Halaman Produk') }}
                </a>
            </button>
        </div>
    </div>
</div>
@endsection
