@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brands</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Brands List</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-6">

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="card-header">
                                <h5 class="card-title">Brands List</h5><br />
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('brands.create') }}">
                                    <i class="fa fa-plus"></i> Create Brand</a><br /><br />

                            </div>
                            {{-- <table class="table table-bordered datatable1"> --}}
                              <table id="example1" class="table table-bordered table-striped datatable1 ">

                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($brands)
                                        @foreach ($brands as $key => $brand)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $brand->name ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('brands.edit',$brand->id) }}" class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i> Edit</a>
                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id = "brand-delete{{ $brand->id }}">
                                                        <i class="fa fa-trash"></i> Delete</a>
                                                        <form id="brand-delete{{ $brand->id }}" action="{{ route('brands.destroy',$brand->id) }}" method="POST" >
                                                        
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
