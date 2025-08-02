@extends('frontend.main_master')

@section('content')

@section('title')
{{ $category->category_name }} - Sparepart
@endsection

<div class="body-content outer-top-xs">
    <div class="container-fluid">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Kategori Sparepart</div>
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">
                            @foreach($sparepartCategories as $cat)
                            <li class="dropdown menu-item">
                                <a href="{{ route('category.spareparts', ['id' => $cat->id, 'slug' => $cat->category_slug]) }}" 
                                   class="{{ $cat->id == $category->id ? 'active' : '' }}">
                                    {{ $cat->category_name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <!-- ================================== TOP NAVIGATION : END ================================== -->
            </div>
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <div id="category-banner-image">
                    <div class="category-banner">
                        <div class="category-banner-content">
                            <h1>{{ $category->category_name }}</h1>
                            <p>Koleksi {{ strtolower($category->category_name) }} berkualitas untuk kendaraan Anda</p>
                        </div>
                    </div>
                </div>
                <!-- ========================================== SECTION – HERO : END ========================================= -->

                <!-- ============================================== FILTERS AND PRODUCT LISTINGS ============================================== -->
                <div class="search-result-container">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active" id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    @forelse($products as $product)
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                            <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}">
                                                        </a>
                                                    </div>
                                                    
                                                    @php
                                                    $amount = $product->product_price - $product->product_discount;
                                                    $discount = ($amount/$product->product_price) * 100;
                                                    @endphp

                                                    @if ($product->product_discount != NULL)
                                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                    @endif
                                                </div>

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                            {{ $product->product_name }}
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if ($product->product_discount == NULL)
                                                    <div class="product-price">
                                                        <span class="price">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                                    </div>
                                                    @else
                                                    <div class="product-price">
                                                        <span class="price">Rp{{ number_format($product->product_discount, 0, '', '.') }}</span>
                                                        <span class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                                    </div>
                                                    @endif
                                                </div>

                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" type="button" title="Keranjang" 
                                                                        data-toggle="modal" data-target="#exampleModal" 
                                                                        id="{{ $product->id }}" onclick="productView(this.id)">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Keranjang</button>
                                                            </li>
                                                            <button class="btn btn-primary icon" type="button" title="Wishlist" 
                                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                            <li class="lnk">
                                                                <a data-toggle="tooltip" class="add-to-cart" 
                                                                   href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}" 
                                                                   title="Detail Produk">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <div class="no-products-found">
                                            <div class="text-center">
                                                <i class="fa fa-cogs fa-5x" style="color: #ddd; margin-bottom: 20px;"></i>
                                                <h3>Belum Ada Produk</h3>
                                                <p>Produk untuk kategori {{ $category->category_name }} belum tersedia.</p>
                                                <a href="{{ route('spareparts.page') }}" class="btn btn-primary">
                                                    Lihat Kategori Lain
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================== PAGINATION ============================================== -->
                    @if($products->hasPages())
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    {{ $products->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- ============================================== PAGINATION : END ============================================== -->
                </div>
                <!-- ============================================== FILTERS AND PRODUCT LISTINGS : END ============================================== -->
            </div>
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
    </div>
</div>

<style>
.category-banner {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    padding: 60px 0;
    text-align: center;
    margin-bottom: 40px;
    border-radius: 10px;
}

.category-banner-content h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 15px;
}

.category-banner-content p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.side-menu .nav li a.active {
    background: #e74c3c;
    color: white;
    font-weight: bold;
}

.no-products-found {
    padding: 80px 20px;
    background: #f8f9fa;
    border-radius: 10px;
    margin: 40px 0;
}

.no-products-found h3 {
    color: #7f8c8d;
    margin-bottom: 15px;
}

.no-products-found p {
    color: #95a5a6;
    margin-bottom: 25px;
}

@media (max-width: 768px) {
    .category-banner-content h1 {
        font-size: 2rem;
    }
    
    .category-banner-content p {
        font-size: 1rem;
    }
    
    .category-banner {
        padding: 40px 0;
    }
}
</style>

@endsection
