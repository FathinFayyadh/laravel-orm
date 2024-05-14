@extends('blademaster.blademaster')
@section('content')
<div class="container">
    <div class="row my-lg-5 bg-info rounded p-2">
        <div class="col-12 my-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-3  ">
                    <h3 class="fw-bold ">List produk</h3>
                </div>

                <div class="col-4 text-end ">
                    <a href="{{route('form.product', ['user' => $user->id])}}" class="btn btn-dark">Tambah Produk</a>
                    <a href="{{ route('product.create') }}" class="btn btn-dark">Kembali Ke product</a>
                </div>

            </div>
            </div>
            <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</td>
                <th>Stock</th>
                <th>Berat</th>
                <th>Harga</th>
                <th>Kodisi</td>
                <th>Action </th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        @foreach ($products as $product)
        <tbody>
            <tr class="text-center">

                <td>{{$no}}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->berat }}</td>
                <td>{{ $product->harga }}</td>
                <td>
                    <p class="p-1 rounded text-light @if (strtolower($product->kondisi) == 'baru') bg-success @else bg-dark @endif">
                        {{ $product->kondisi }}
                    </p>
                </td>
                 <td > <a href="{{ route('edit.product', ['product' => $product->id, 'user' => $user->id]) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('delete.product', ['product' => $product->id, 'user' => $user->id]) }}" class="btn btn-danger">Delete</a> </td> 
            </tr>
            </tbody>
                @php
                $no++;
            @endphp
                @endforeach
              </table>

        </div>
    </div>

@endsection