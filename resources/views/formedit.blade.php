<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="conntainer justify-center mt-5 ">
        <div class="row">
            <div class="col-12 h-100">
                <div class="card shadow mx-auto p-4" style="width: 25rem;">
                    <h3 class="text-center  mb-4">Tambah Data Produk</h3>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        @break
                    @endforeach
                @endif


                <form  action="{{ route('update.product', ['product' => $product->id, 'user' => $user->id]) }}"method="POST">
                    @csrf
                 @method('PUT')
                    <div class="mb-3">
                    <label for="formFile" class="form-label">Input gambar</label>
                    <input class="form-control" type="file" name="gambar" id="gambar" >
                     </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="masukkan nama produk">

                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="number" class="form-control" name="berat" id="berat"
                            placeholder="Masukkan berat produk">
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga"
                            placeholder="Masukkan harga produk">
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stock" id="stok"
                            placeholder="Masukkan stok produk">
                    </div>

                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select" id="kondisi" name="kondisi">
                            <option value="0" selected>Pilih kondisi Barang</option>
                            <option value="baru">Baru</option>
                            <option value="bekas" >Bekas</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi" rows="3" placeholder="Masukkan deskripsi produk" name="deskripsi"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark align-items-center">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#submitBtn').click(function(e) {
            // e.prevenDefault();
            let name = $('#title').val();
            let image = $("#image").val();
            let berat = $("#berat").val();
            let harga = $("#harga").val();
            let kondisi = $("#kondisi").val();
            let stock = $("#stock").val();
            let description = $("#description").val();
            let user_id = $("#user_id").val();

            let token = $('meta[name="csrf-token"]').attr('content');


            $.ajax({
                type: "PUT",
                cache: false,
                url: "{{ route('post.ajaxUpdate') }}",
                data: {
                    "_token": token,
                     'user_id': user_id,
                    'image': image,
                    'name': name,
                    'berat': berat,
                    'harga': harga,
                    'kondisi': kondisi,
                    'stock': stock,
                    'description': description,
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        $.each(error.responseJSON.errors, function(key, value) {
                            $("#" + key + "_error").html(value);
                        });
                    }
                }
            });
        });
    });
</script>
</body>

</html>