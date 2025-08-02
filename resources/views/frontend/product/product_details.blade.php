@extends('frontend.main_master')
@section('content')

@section('title')
{{ $product->product_name }} Detail Produk
@endsection

<style>
    .checked {
        color: orange;
    }
    
    /* Fix image distortion in product detail gallery */
    .single-product-gallery-item img {
        width: 100% !important;
        height: auto !important;
        max-height: 400px;
        object-fit: contain;
        background: #ffffffff;
    }
    
    /* Hide thumbnail images and replace with circular dots */
    .gallery-thumbs .item img {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        width: 0 !important;
        height: 0 !important;
        position: absolute !important;
        z-index: -1 !important;
    }
    
    .gallery-thumbs .item {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        width: 30px;
        margin: 0 5px;
        position: relative;
        flex-shrink: 0;
    }
    
    .gallery-thumbs {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 15px;
        width: 100%;
        text-align: center;
    }
    
    #owl-single-product-thumbnails {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        text-align: center;
    }
    
    #owl-single-product-thumbnails .owl-wrapper-outer {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 100% !important;
    }
    
    #owl-single-product-thumbnails .owl-wrapper {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 300px !important;
        margin: 0 auto !important;
        position: relative !important;
        left: 0 !important;
        transform: none !important;
    }
    
    #owl-single-product-thumbnails .owl-item {
        width: 35px !important;
    }
    
    .gallery-thumbs .item .horizontal-thumb {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background-color: #ddd;
        border: 2px solid #ccc !important;
        outline: none !important;
        box-shadow: none !important;
        cursor: pointer;
        transition: all 0.3s ease;
        display: block;
        text-decoration: none;
        position: static;
        margin: 0 auto;
    }
    
    .gallery-thumbs .item .horizontal-thumb:hover {
        background-color: #dc3545;
        border: 2px solid #dc3545 !important;
        outline: none !important;
        transform: scale(1.1);
    }
    
    .gallery-thumbs .item .horizontal-thumb.active {
        background-color: #dc3545;
        border: 2px solid #dc3545 !important;
        outline: none !important;
        transform: scale(1.2);
    }
    
    .gallery-thumbs .item .horizontal-thumb:focus {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
    }
    
    /* Fix main image centering */
    .single-product-gallery-item {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 400px;
    }
    
    .single-product-gallery-item a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    
    .single-product-gallery-item img.img-responsive {
        display: block !important;
        margin: auto !important;
        max-width: 100% !important;
        max-height: 400px !important;
        width: auto !important;
        height: auto !important;
        object-fit: contain !important;
        position: absolute !important;
        top: 50% !important;
        left: 50% !important;
        transform: translate(-50%, -50%) !important;
    }
    
    /* Fix related product images */
    .product-image .image {
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #f8f9fa;
    }
    
    .product-image .image img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
    }
    
    /* Color Selection Styles */
    .color-selection-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin: 15px 0;
    }
    
    /* Horizontal Color Selection */
    .color-selection-horizontal {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 10px 0;
    }
    
    .color-selection-section {
        margin: 15px 0;
    }
    
    .color-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .color-option:hover {
        transform: translateY(-2px);
    }
    
    .color-box {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        border: 3px solid transparent;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .color-option.selected .color-box {
        border-color: #dc3545;
        box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.3);
        transform: scale(1.1);
    }
    
    .color-name {
        font-size: 1.5rem;
        margin-top: 8px;
        text-align: center;
        color: #666;
        font-weight: 500;
    }
    
    .color-option.selected .color-name {
        color: #dc3545;
        font-weight: bold;
    }
    
    .selected-color-display {
        margin-top: 15px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #dc3545;
    }
    
    #selected-color-text {
        font-weight: 500;
        color: #333;
    }
    
    /* Product Specifications Grid Styles */
    .product-specs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
        margin: 20px 0;
    }
    
    /* Horizontal Product Specifications Grid Styles */
    .product-specs-grid-horizontal {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin: 20px 0;
        justify-content: center;
    }
    
    .product-specs-grid-horizontal .spec-item {
        flex: 0 1 auto;
        width: 170px;
    }
    
    .spec-item {
        display: flex;
        align-items: center;
        padding: 10px;
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
        color: #000000;
    }
    
    .spec-item:hover {
        background: #ffffff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    
    .spec-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffffff;
        color: #000000;
        border-radius: 8px;
        margin-right: 0px;
        flex-shrink: 0;
    }
    
    .spec-icon i {
        font-size: 1.5rem;
    }
    
    .spec-content {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    
    .spec-label {
        font-size: 1.3rem;
        color: #6c757d;
        margin-bottom: 2px;
        font-weight: 500;
    }
    
    .spec-value {
        font-size: 1.2rem;
        color: #333;
        font-weight: 600;
    }
    
    /* Responsive Design for Specs */
    @media (max-width: 768px) {
        .product-specs-grid {
            grid-template-columns: 1fr;
            gap: 10px;
        }
        
        .spec-item {
            padding: 12px;
        }
        
        .spec-icon {
            width: 40px;
            height: 40px;
            margin-right: 12px;
        }
        
        .spec-icon i {
            font-size: 1.2rem;
        }
        
        .spec-label {
            font-size: 0.8rem;
        }
        
        .spec-value {
            font-size: 0.9rem;
        }
    }
    
    @media (max-width: 480px) {
        .product-specs-grid {
            grid-template-columns: 1fr;
        }
        
        .spec-item {
            padding: 10px;
        }
        
        .spec-icon {
            width: 35px;
            height: 35px;
            margin-right: 10px;
        }
        
        .spec-icon i {
            font-size: 1rem;
        }
    }
</style>

<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Detail Produk</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-12'>
                <div class="detail-block">
                    <div class="row wow fadeInUp">
                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    @php
                                    $colors = $product->product_color ? explode(',', $product->product_color) : [];
                                    @endphp
                                    @foreach($multiImag as $key => $img)
                                    @php
                                    $imageColor = isset($colors[$key]) ? trim($colors[$key]) : 'default';
                                    @endphp
                                    <div class="single-product-gallery-item" id="slide{{ $img->id }}" data-color="{{ $imageColor }}">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="{{ asset($img->photo_name ) }} ">
                                            <img class="img-responsive" alt="" src="{{ asset($img->photo_name ) }} "
                                                data-echo="{{ asset($img->photo_name ) }} " />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                    @endforeach
                                </div><!-- /.single-product-slider -->

                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        @foreach($multiImag as $key => $img)
                                        @php
                                        $imageColor = isset($colors[$key]) ? trim($colors[$key]) : 'default';
                                        @endphp
                                        <div class="item">
                                            <a class="horizontal-thumb {{ $key == 0 ? 'active' : '' }}" 
                                               data-target="#owl-single-product"
                                               data-slide="{{ $key }}" 
                                               data-image-src="{{ asset($img->photo_name) }}"
                                               data-color="{{ $imageColor }}"
                                               href="javascript:void(0);" 
                                               onclick="changeMainImage('{{ asset($img->photo_name) }}', {{ $key }});">
                                                <img class="img-responsive" width="85" alt=""
                                                    src="{{ asset($img->photo_name ) }} "
                                                    data-echo="{{ asset($img->photo_name ) }} "
                                                    style="display: none !important; visibility: hidden !important; opacity: 0 !important; width: 0 !important; height: 0 !important; position: absolute !important; z-index: -9999 !important;" />
                                            </a>
                                        </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->

                        @php
                        $reviewcount =
                        App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                        $avarage =
                        App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                        @endphp

                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name" id="pname">{{ $product->product_name }}</h1>
                                
                                <!-- Price moved here after title -->
                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if ($product->product_discount == NULL)
                                                <span
                                                    class="price">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                                @else
                                                <span
                                                    class="price">Rp{{ number_format($product->product_discount, 0, '', '.') }}</span>
                                                <span
                                                    class="price-strike">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a href="{{ route('wishlist') }}" class="btn btn-primary"
                                                    data-toggle="tooltip" data-placement="right" title="Wishlist"
                                                    href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <!-- Color selection horizontal -->
                                @if($product->product_color != null)
                                <div class="color-selection-section m-t-15">
                                    <label class="info-title control-label">Pilih Warna:</label>
                                    <div class="color-selection-horizontal">
                                        @foreach($product_color as $color)
                                        <div class="color-option" data-color="{{ $color }}" title="{{ ucwords($color) }}">
                                            <div class="color-box" style="background-color: {{ $color == 'hitam' ? '#2c2c2c' : ($color == 'putih' ? '#ffffff' : ($color == 'merah' ? '#dc3545' : ($color == 'silver' ? '#c0c0c0' : ($color == 'abu-abu' ? '#808080' : ($color == 'biru' ? '#007bff' : ($color == 'coklat' ? '#8b4513' : ($color == 'kuning' ? '#ffc107' : '#6c757d'))))))) }}; {{ $color == 'putih' ? 'border: 2px solid #ddd;' : '' }}"></div>
                                            <span class="color-name">{{ ucwords($color) }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" id="color" name="selected_color" value="">
                                </div>
                                @endif

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            @if($avarage == 0)
                                            Tidak ada ulasan
                                            @elseif($avarage == 1 || $avarage < 2) <span class="fa fa-star checked">
                                                </span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif($avarage == 2 || $avarage < 3) <span class="fa fa-star checked">
                                                    </span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    @elseif($avarage == 3 || $avarage < 4) <span
                                                        class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        @elseif($avarage == 4 || $avarage < 5) <span
                                                            class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($avarage == 5 || $avarage < 5) <span
                                                                class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                @endif
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">({{ count($reviewcount) }} Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Atur Jumlah :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows" style="display: none">
                                                        <div class="arrow plus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="number" id="qty" value="1" min="1" max="{{ $product->product_qty }}">
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <input type="hidden" id="product_id" value="{{ $product->id }}">
                                        <div class="col-sm-7">
                                            <button type="submit" onclick="addToCart()" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> Keranjang</button>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->
                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                    
                    <!-- Product Specifications moved below the image and info section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-specs-container m-t-30">
                                <div class="product-specs-grid-horizontal">
                                    @if ($product->product_weight != NULL)
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="fa fa-balance-scale"></i>
                                        </div>
                                        <div class="spec-content">
                                            <span class="spec-label">Berat</span>
                                            <span class="spec-value" id="pweight">{{ $product->product_weight }} kg</span>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if ($product->product_transmission != NULL)
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="fa fa-cogs"></i>
                                        </div>
                                        <div class="spec-content">
                                            <span class="spec-label">Transmisi</span>
                                            <span class="spec-value" id="ptransmission">{{ $product->product_transmission }}</span>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if ($product->product_fuel_type != NULL)
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="fa fa-tint"></i>
                                        </div>
                                        <div class="spec-content">
                                            <span class="spec-label">Bahan Bakar</span>
                                            <span class="spec-value" id="pfueltype">{{ $product->product_fuel_type }}</span>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if ($product->product_engine != NULL)
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="fa fa-car"></i>
                                        </div>
                                        <div class="spec-content">
                                            <span class="spec-label">Mesin</span>
                                            <span class="spec-value" id="pengine">{{ $product->product_engine }} cc</span>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if ($product->product_seat != NULL)
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <div class="spec-content">
                                            <span class="spec-label">Tempat Duduk</span>
                                            <span class="spec-value" id="pseat">{{ $product->product_seat }}</span>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <i class="fa fa-cube"></i>
                                        </div>
                                        <div class="spec-content">
                                            <span class="spec-label">Stok</span>
                                            <span class="spec-value">{{ $product->product_qty }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.product-specs-container -->
                        </div>
                    </div><!-- /.row -->
                </div>
                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">Deskripsi</a></li>
                                <li><a data-toggle="tab" href="#review">Penilaian dan Ulasan</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">{!! $product->product_long_desc !!} </p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">
                                        <div class="product-reviews">
                                            <h4 class="title">Ulasan Pembeli</h4>

                                            @php
                                            $reviews =
                                            App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                                            @endphp
                                            <div class="reviews">
                                                @foreach($reviews as $item)
                                                @if($item->status == 0)

                                                @else
                                                <div class="review">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img style="border-radius: 50%"
                                                                src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}"
                                                                width="40px;" height="40px;"><b>
                                                                {{ $item->user->name }}</b>

                                                            @if($item->rating == NULL)

                                                            @elseif($item->rating == 1)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($item->rating == 2)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($item->rating == 3)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($item->rating == 4)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($item->rating == 5)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">

                                                        </div>
                                                    </div> <!-- // end row -->
                                                    <div class="review-title">
                                                        <span class="date"><i class="fa fa-calendar"></i>
                                                            <span>
                                                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="text">"{{ $item->comment }}"</div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->

                                        <div class="product-add-review">
                                            <h4 class="title">Beri Penilaian dan Ulasan</h4>
                                            <div class="review-table">

                                            </div><!-- /.review-table -->

                                            <div class="review-form">
                                                @guest
                                                <p> <b> Untuk menambahkan ulasan. Anda harus login terlebih dahulu <a
                                                            href="{{ route('login') }}">Login disini</a> </b> </p>
                                                @else
                                                <div class="form-container">

                                                    <form role="form" class="cnt-form" method="post"
                                                        action="{{ route('review.store') }}">
                                                        @csrf

                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell-label">&nbsp;</th>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="cell-label">Rating</td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="1"></td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="2"></td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="3"></td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="4"></td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="5"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputReview">Ulasan <span
                                                                            class="astk">*</span></label>
                                                                    <textarea class="form-control txt txt-review"
                                                                        name="comment" id="exampleInputReview" rows="4"
                                                                        placeholder="Bagaimana pengalaman anda setelah menggunakan produk ini ?"></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->
                                                        <div class="action text-right">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-upper">Kirim Ulasan</button>
                                                        </div><!-- /.action -->
                                                    </form><!-- /.cnt-form -->
                                                </div><!-- /.form-container -->
                                                @endguest
                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ===== ======= UPSELL PRODUCTS ==== ========== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Produk Terkait</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                        @forelse ($relatedProduct as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a
                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"><img
                                                        src="{{ asset($product->product_thambnail) }}" alt=""></a>
                                            </div><!-- /.image -->
                                        </div><!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <a
                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                    {{ $product->product_name }}
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            @if ($product->product_discount == NULL)
                                            <div class="product-price">
                                                <span
                                                    class="price">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                            </div><!-- /.product-price -->
                                            @else
                                            <div class="product-price">
                                                <span class="price">
                                                    Rp{{ number_format($product->product_discount, 0, '', '.') }} </span>
                                                <span
                                                    class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                            </div><!-- /.product-price -->
                                            @endif
                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn"
                                                            type="button">Keranjang</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="{{ route('wishlist') }}"
                                                            title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->
                                </div><!-- /.products -->
                            </div><!-- /.item -->
                        @empty
                        <h5 class="text-danger">Produk Tidak Ditemukan</h5>
                        @endforelse
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>

<script>
// Immediately hide all thumbnail images to prevent flicker
(function() {
    const style = document.createElement('style');
    style.textContent = `
        .gallery-thumbs .item img,
        .gallery-thumbs img,
        #owl-single-product-thumbnails img,
        .horizontal-thumb img {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            width: 0 !important;
            height: 0 !important;
            position: absolute !important;
            z-index: -9999 !important;
            left: -9999px !important;
            top: -9999px !important;
        }
    `;
    document.head.appendChild(style);
})();

// Function to change main image when thumbnail is clicked
function changeMainImage(imageSrc, slideIndex) {
    // Update the main image
    const mainImages = document.querySelectorAll('#owl-single-product .single-product-gallery-item img');
    if (mainImages[slideIndex]) {
        // Hide all main images
        const allSlides = document.querySelectorAll('#owl-single-product .single-product-gallery-item');
        allSlides.forEach(slide => slide.style.display = 'none');
        
        // Show the selected slide
        allSlides[slideIndex].style.display = 'block';
    }
    
    // Update thumbnail active state
    const thumbnails = document.querySelectorAll('.horizontal-thumb');
    thumbnails.forEach(thumb => thumb.classList.remove('active'));
    thumbnails[slideIndex].classList.add('active');
}

// Function to change image based on color selection
function changeImageByColor(selectedColor) {
    const thumbnails = document.querySelectorAll('.horizontal-thumb');
    
    // Find thumbnail that matches the selected color
    let targetThumbnail = null;
    thumbnails.forEach((thumbnail, index) => {
        const thumbnailColor = thumbnail.getAttribute('data-color');
        if (thumbnailColor && thumbnailColor.toLowerCase() === selectedColor.toLowerCase()) {
            targetThumbnail = thumbnail;
            return;
        }
    });
    
    // If we found a matching thumbnail, click it
    if (targetThumbnail) {
        targetThumbnail.click();
    } else {
        // Fallback: if no exact match, try to find the first available image
        if (thumbnails.length > 0) {
            thumbnails[0].click();
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Initialize gallery - show first image by default
    const allSlides = document.querySelectorAll('#owl-single-product .single-product-gallery-item');
    allSlides.forEach((slide, index) => {
        slide.style.display = index === 0 ? 'block' : 'none';
    });
    
    // Color selection functionality
    const colorOptions = document.querySelectorAll('.color-option');
    const colorInput = document.getElementById('color');
    
    if (colorOptions.length > 0) {
        colorOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                colorOptions.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Get selected color
                const selectedColor = this.getAttribute('data-color');
                
                // Update hidden input
                colorInput.value = selectedColor;
                
                // Change the main image based on selected color
                changeImageByColor(selectedColor);
            });
        });
    }
});
</script>
@endsection
