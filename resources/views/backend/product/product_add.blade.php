@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Produk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Nama Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" placeholder="Nama Produk"
                                                            class="form-control">
                                                        @error('product_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Berat Produk</h5>
                                                    <div class="controls">
                                                        <input type="number" name="product_weight"
                                                            placeholder="Berat Produk (gram)" class="form-control">
                                                        @error('product_weight')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Kode Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <input type="text" name="product_code" id="product_code" placeholder="Kode akan digenerate otomatis"
                                                                class="form-control" readonly>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-info" id="generateCode" onclick="generateProductCode()">
                                                                    <i class="fa fa-refresh"></i> Generate
                                                                </button>
                                                            </div>
                                                        </div>
                                                        @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <small class="text-muted">Kode produk akan digenerate otomatis saat halaman dimuat</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Stok Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="product_qty"
                                                            placeholder="Jumlah Stok Produk" class="form-control" required="">
                                                        @error('product_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Transmisi (Vehicle)</h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_transmission" class="form-control"
                                                            placeholder="Transmisi (Otomatis, Manual)">
                                                        @error('product_transmission')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Bahan Bakar (Vehicle)</h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_fuel_type" class="form-control"
                                                            placeholder="Bahan Bakar (Pertamax/Pertadex)">
                                                        @error('product_fuel_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Kapasitas Mesin (Vehicle)</h5>
                                                    <div class="controls">
                                                        <input type="number" name="product_engine" class="form-control"
                                                            placeholder="Kapasitas Mesin (cc)">
                                                        @error('product_engine')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Tempat Duduk (Vehicle)</h5>
                                                    <div class="controls">
                                                        <input type="number" name="product_seat" class="form-control"
                                                            placeholder="Tempat Duduk">
                                                        @error('product_seat')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Warna Produk (Vehicle)</h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color" class="form-control"
                                                            placeholder="hitam, putih" data-role="tagsinput">
                                                        @error('product_color')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Tag Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags" class="form-control"
                                                            placeholder="Part Engine" data-role="tagsinput" required="">
                                                        @error('product_tags')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Harga Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="product_price"
                                                            placeholder="Harga Produk" class="form-control" required="">
                                                        @error('product_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Harga Diskon </h5>
                                                    <div class="controls">
                                                        <input type="number" name="product_discount" class="form-control"
                                                            id="harga" placeholder="Harga Diskon">
                                                        @error('product_discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Deskripsi Pendek (Short) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="product_short_desc" id="textarea"
                                                            class="form-control" required
                                                            placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Deskripsi Panjang (Long) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="product_long_desc" rows="10"
                                                            cols="80" required="">Deskripsi Panjang (Long)</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End col-7 -->
                                <div class="col-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Pilih Merek <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control">
                                                            <option value="" selected="" disabled="">Pilih Merek
                                                            </option>
                                                            @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Kategori<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected="" disabled="">Pilih Kategori
                                                            </option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5>Sub Kategori <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Pilih Sub Kategori
                                                            </option>
                                                        </select>
                                                        @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="product_promo"
                                                                value="1">
                                                            <label for="checkbox_2">Promo</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="new_product"
                                                                value="1">
                                                            <label for="checkbox_3">Produk Baru</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="new_arrival"
                                                                value="1">
                                                            <label for="checkbox_4">Baru Datang</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="best_seller"
                                                                value="1">
                                                            <label for="checkbox_5">Best Seller</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Produk (Thumbnail) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thambnail" class="form-control"
                                                            id="gambar" onChange="ThumbUrl(this)" required="">
                                                        @error('product_thambnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="" id="mainThmb">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Produk Galeri <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" for="galeri"
                                                            class="form-control" id="multiImg" multiple required="">
                                                        @error('multi_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ml-1 mt-4">
                                                <div class="col-md-6">
                                                    <img src="" id="Thumb">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row ml-1" id="preview_img"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End col-5 -->
                            </div>
                            <div class="card-footer">
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-md btn-primary mb-5" value="Tambah Produk">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Ajax Sub Kategori --}}
<script type="text/javascript">
    // Ajax Sub Kategori
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append(
                            '<option value="" selected>Pilih Sub Kategori</option>');
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subcategory_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

{{-- Ajax Foto Thumbnail --}}
<script type="text/javascript">
    function ThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#Thumb').attr('src', e.target.result).css({
                    'max-width': '200px',
                    'max-height': '200px',
                    'width': 'auto',
                    'height': 'auto',
                    'object-fit': 'contain',
                    'border': '1px solid #ddd',
                    'border-radius': '4px',
                    'padding': '5px'
                });
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

{{-- Ajax Galeri Foto --}}
<script>
    $(document).ready(function () {
        // Generate product code on page load
        generateProductCode();
        
        $('#multiImg').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).css({
                                    'max-width': '100px',
                                    'max-height': '100px',
                                    'width': 'auto',
                                    'height': 'auto',
                                    'object-fit': 'contain',
                                    'border': '1px solid #ddd',
                                    'border-radius': '4px',
                                    'padding': '3px',
                                    'margin': '2px'
                                }); //create image element 
                                $('#preview_img').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });

    // Function to generate product code
    function generateProductCode() {
        var categoryId = $('select[name="category_id"]').val();
        var prefix = 'PR'; // Default prefix
        
        // Check if category is selected to determine prefix
        if (categoryId) {
            // Get category name to determine if it's vehicle or sparepart
            var categoryText = $('select[name="category_id"] option:selected').text().toLowerCase();
            
            // Check if it's a vehicle category
            if (categoryText.includes('vehicle') || categoryText.includes('mobil') || categoryText.includes('motor')) {
                prefix = 'VH';
            } 
            // Check if it's a sparepart category
            else if (categoryText.includes('sparepart') || categoryText.includes('part') || categoryText.includes('suku cadang')) {
                prefix = 'SP';
            }
        }
        
        // Generate random 3-digit number
        var randomNum = Math.floor(Math.random() * 900) + 100; // 100-999
        var productCode = prefix + randomNum;
        
        // Set the generated code to input field
        $('#product_code').val(productCode);
    }

    // Regenerate code when category changes
    $('select[name="category_id"]').on('change', function() {
        generateProductCode();
    });
</script>

@endsection
