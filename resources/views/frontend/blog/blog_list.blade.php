@extends('frontend.main_master')
@section('content')

@section('title')
Blog Page
@endsection




<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Blog</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">



                    @foreach($blogpost as $blog)
                    <div class="blog-post  wow fadeInUp">
                        <a href="blog-details.html"><img class="img-responsive" src="{{ asset($blog->post_image) }}"
                                alt=""></a>

                        <h1><a href="blog-details.html"> @if(session()->get('language') == 'hindi')
                                {{ $blog->post_title_hin }} @else {{ $blog->post_title_en }} @endif</a></h1>

                        <span class="date-time"> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>

                        <p>@if(session()->get('language') == 'hindi') {!! Str::limit($blog->post_details_hin, 200 ) !!}
                            @else {!! Str::limit($blog->post_details_en, 200 ) !!} @endif</p>


                        <a href="{{ route('post.details',$blog->id) }}" class="btn btn-upper btn-primary read-more">read
                            more</a>


                    </div>
                    @endforeach


                    <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                        style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul><!-- /.list-inline -->
                            </div><!-- /.pagination-container -->
                        </div><!-- /.text-right -->

                    </div><!-- /.filters-container -->
                </div>
                <div class="col-md-3 sidebar">



                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>
                                </div>
                            </form>
                        </div>
                        <!-- ======== ====CATEGORY======= === -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Blog Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">

                                    @foreach($blogcategory as $category)
                                    <ul class="list-group">
                                        <a href="{{ url('blog/category/post/'.$category->id) }}">
                                            <li class="list-group-item">@if(session()->get('language') == 'hindi')
                                                {{ $category->blog_category_name_en }} </li>
                                        </a>

                                    </ul>
                                    @endforeach



                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ===== ======== CATEGORY : END ==== = -->
                    </div>
                </div>
            </div>
        </div>

    </div>






    @endsection