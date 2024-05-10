<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="container justify-center mt-5">
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


                <form method="POST" action="#">
                    @csrf

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Input gambar</label>
                        <input class="form-control" type="file" name="image" id="image">
                        <small id="image_error" class="error text-danger"></small>

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="masukkan nama produk">
                        <small id="name_error" class="error text-danger"></small>

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
                        <input type="number" class="form-control" name="stock" id="stock"
                            placeholder="Masukkan stok produk">
                    </div>

                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select" id="kondisi" name="kondisi">
                            <option value="0" selected>Pilih kondisi Barang</option>
                            <option value="baru">Baru</option>
                            <option value="bekas">Bekas</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi" rows="3" placeholder="Masukkan deskripsi produk" name="deskripsi"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-dark align-items-center"
                            id="submitBtn">Submit</button>
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
            var user_id = <?php echo $user->id; ?>;
            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('user_id', user_id);
            formData.append('name', $('#name').val());
            formData.append('berat', $('#berat').val());
            formData.append('harga', $('#harga').val());
            formData.append('kondisi', $('#kondisi').val());
            formData.append('stock', $('#stock').val());
            formData.append('description', $('#deskripsi').val());
            formData.append('image', $('#image')[0].files[0]);

            var url = "{{ route('post.ajax', ['user' => ':id']) }}";
            url = url.replace(':id', user_id);

            $.ajax({
                type: "POST",
                cache: false,
                url: url,
                data: formData,
                processData: false,
                contentType: false,

                success: function(response) {
                    var urlRedirect =  "{{ route('admin.create', ['user' => ':id']) }}";
                    urlRedirect = urlRedirect.replace(':id', user_id);

                    window.location.href = urlRedirect;
                },
                error: function(error) {
                    if (error.responseJSON && error.responseJSON.errors) {
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
