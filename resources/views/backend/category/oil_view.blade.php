@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub Kategori Oil <span class="badge badge-pill badge-warning">
                                {{ count($subcategory) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>Kategori</th>
                                        <th>Sub Kategori</th>
                                        <th>Slug</th>
                                        <th width="20%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategory as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item['category']['category_name'] }}</td>
                                        <td>{{ $item->subcategory_name }}</td>
                                        <td>{{ $item->subcategory_slug }}</td>
                                        <td>
                                            <a href="{{ route('subcategory.edit', $item->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('subcategory.delete', $item->id) }}"
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
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection
