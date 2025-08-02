<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container-fluid">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i
                                    class="icon fa fa-check"></i>Order Traking</a></li>
                        <li>
                            @auth
                            <a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>Akun Saya</a>
                            @else
                            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Masuk/Daftar</a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    @php
                    $setting = App\Models\SiteSetting::find(1);
                    @endphp
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo" height="36px"></a>
                        </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="post" action="{{ route('product.search') }}">
                            @csrf
                            <div class="control-group" style="border: 1px solid #FBEBD8; border-radius: 4px!important;">
                                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()"
                                    id="search" name="search" placeholder="Cari Disini..." />
                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                        <div id="searchProducts"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ===== === SHOPPING CART DROPDOWN ===== == -->
                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                <div class="total-price-basket">
                                    <span class="total-price"> <span class="sign">Rp</span>
                                        <span class="value" id="cartSubTotal"> </span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--   // Mini Cart Start with Ajax -->

                                <div id="miniCart">

                                </div>

                                <!--   // End Mini Cart Start with Ajax -->


                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal"> </span> </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('mycart') }}"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Keranjang</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->



                    <!-- == === SHOPPING CART DROPDOWN : END=== === -->
                </div>

                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container-fluid">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="/">
                                        <i class="fa fa-home"></i> Beranda
                                    </a>
                                </li>

                                <!--   // Get Categories -->
                                @php
                                $vehicleCategory = App\Models\Category::where('category_name', 'Vehicle')->first();
                                $sparepartCategory = App\Models\Category::where('category_name', 'Sparepart')->first();
                                @endphp

                                <!-- Vehicle Menu -->
                                <li> 
                                    <a href="{{ route('vehicles.page') }}">
                                        <i class="fa fa-car"></i> Kendaraan
                                    </a>
                                </li>

                                <!-- Sparepart Menu -->
                                <li> 
                                    <a href="{{ route('spareparts.page') }}">
                                        <i class="fa fa-cogs"></i> Sparepart
                                    </a>
                                </li>

                                <li> 
                                    <a href="{{ route('shop.page') }}">
                                        <i class="fa fa-shopping-bag"></i> Belanja
                                    </a> 
                                </li>
                                
                                <li class="navbar-right"> 
                                    <a href="#">
                                        <i class="fa fa-tags"></i> Promo
                                    </a> 
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

    <!-- Order Traking Modal -->
    <div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lacak Pesanan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="modal-body">
                            <label>Nomor Invoice</label>
                            <input type="text" name="code" required="" class="form-control"
                                placeholder="Masukkan Kode Invoice">
                        </div>

                        <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Cari </button>

                    </form>


                </div>

            </div>
        </div>
    </div>

</header>

<style>
    .search-area {
        position: relative;
    }

    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>
<script>
    function search_result_hide() {
        $("#searchProducts").slideUp();
    }

    function search_result_show() {
        $("#searchProducts").slideDown();
    }
</script>