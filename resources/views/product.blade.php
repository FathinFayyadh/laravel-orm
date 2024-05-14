@extends('blademaster.blademaster')
@section('content')
    {{-- content product  --}}
    <div class="container">
        <div class="row my-lg-5 bg-info rounded">
            <div class="col-12 my-5">
                <div class="d-flex align-items-center">
                    {{-- <div class="col-2 ">
                        <a href="{{route('admin.create', ['user' => 1])}}" class="btn btn-dark p-2"> Kehalaman Admin</a>
                    </div> --}}
                    <div class="col-12  text-center">
                        <h1 class="fw-bold ">PRODUCT</h1>
                    </div>
                    {{-- <div class="col-2 ">
                        <a href="{{route('admin.create', ['user' => 2])}}" class="btn btn-success p-2"> Kehalaman  Merchant</a>
                    </div> --}}
                </div>
                <div class="border border-top border-black mx-auto mt-3" style="width: 100px"></div>
                <div class=" row justify-content-center mt-5">
                    @foreach ($products as $product)
                        <div class="col-md-3 mb-4">
                            <div class="card p-1 ">
                                <img src="{{$product->image }}" class="card-img-top image-product rounded" alt="...">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text bg-success p-1 rounded text-white @if (strtolower($product->kondisi) == 'baru') bg-success @else bg-warning @endif">
                                            {{ $product->kondisi }}
                                    </div>
                                    <div class="d-flex justify-content-between m-1 mt-2">
                                        <p class="bg-success rounded text-white p-1  ">{{ $product->stock }}</p>
                                        <p class="bg-info  rounded p-1 w-10">Rp.{{ $product->harga }}</p>
                                        <p class="bg-secondary text-white rounded p-1 w-10">{{ $product->berat }} gr</p>
                                    </div>
                                    <p>{{ $product->description  }}</p>
                                    <a href="#" class="btn btn-primary">Pesan sekarang</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- end content product --}}
@endsection
      



   