@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kategori Sparepart <span class="badge badge-pill badge-info">
                                {{ count($category) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="10%">Ikon</th>
                                        <th>Kategori</th>
                                        <th>Slug</th>
                                        <th width="20%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $category as $key => $item )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <span><i class="{{ $item->category_icon }}"
                                                    style="font-size: 20px;"></i></span>
                                        </td>
                                        <td>{{ $item->category_name }}</td>
                                        <td>{{ $item->category_slug }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $item->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('category.delete', $item->id) }}"
                                                class="btn btn-sm btn-danger" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <!--------------------- Add category --------------->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kategori Sparepart</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('category.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Kategori <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name" class="form-control"
                                            placeholder="Nama Kategori Sparepart">
                                        @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Ikon<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control"
                                            placeholder="Ikon Kategori">
                                        @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right mt-3">
                                    <input type="submit" class="btn btn-md btn-info mb-5" value="Tambah">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection
