<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
                    <td ><p class=" p-1 rounded text-light  @if ($product->kondisi == 'baru') bg-success @else bg-dark @endif">{{ $product->kondisi }}</p>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>