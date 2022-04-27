@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sizes</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sizes List</li>
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
                                <h5 class="card-title">Sizes List</h5><br />
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('sizes.create') }}">
                                    <i class="fa fa-plus"></i> Create size</a><br /><br />

                            </div>
                            {{-- <table class="table table-bordered datatable1"> --}}
                              <table id="example1" class="table table-bordered table-striped datatable1 ">

                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sizes)
                                        @foreach ($sizes as $key => $size)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $size->size ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('sizes.edit',$size->id) }}" class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i> Edit</a>
                                                    <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id = "size-delete{{ $size->id }}">
                                                        <i class="fa fa-trash"></i> Delete</a>
                                                        <form id="size-delete{{ $size->id }}" action="{{ route('sizes.destroy',$size->id) }}" method="POST" >
                                                        
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
