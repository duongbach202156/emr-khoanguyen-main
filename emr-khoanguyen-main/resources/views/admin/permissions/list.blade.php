@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">@lang('List of permission group')</h1>
            </div>
            
            <div>
                <a href="{{ route('permission.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> @lang('Add New')</a>
            </div>

            </div><!-- /.row -->

            @include('admin.layouts.alert')
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('List of permission group')</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 loadAjax">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width:15px">ID</th>
                            <th>@lang('Name of permission group')</th>
                            <th>@lang('Action')</th>
                            <th>@lang('Updated at')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (count($roles) != 0)
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('permission.edit', $role->id) }}" class="btn btn-sm btn-outline-info btn-inline-block">
                                                    <i class="fas fa-tools"></i> @lang('Edit')
                                                </a>
                                                {{-- <a href="{{ route('permission.show', $role->id) }}" class="btn btn-sm btn-outline-info btn-inline-block">
                                                    <i class="fas fa-eye"></i> @lang('Detail')
                                                </a> --}}
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-inline-block" data-toggle="modal" data-target="#{{ 'myModal-' . $role->id }}">
                                                    <i class="fas fa-trash"></i> @lang('Delete')
                                                </button>
                                                @php
                                                    if(isset($_GET['page'])) {
                                                        $page = $_GET['page'];
                                                    } else {
                                                        $page = 1;
                                                    }
                                                @endphp
                                                <div class="modal fade" id="{{ 'myModal-' . $role->id }}">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                      
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">@lang('Delete group of permission')<br> 
                                                                <b><i>{{ $role->name }}</i></b>
                                                            </h4>
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <div class="modal-body" style="display:flex;">
                                                            <button onclick="removeRow({{ $role->id }}, '/emr/permission/destroy', {{ $page }}, '/emr/permission?page=')" type="button" class="btn btn-danger" data-dismiss="modal">
                                                                <i class="fas fa-check"></i> @lang('Agree')
                                                            </button>
                                                            <button type="button" style="margin-left: 20px" class="btn btn-primary" data-dismiss="modal">
                                                                <i class="fas fa-window-close"></i> @lang('Cancel')
                                                            </button>
                                                            
                                                        </div>
                                                        
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $role->updated_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">Không có kết quả</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>

                @if (count($roles) != 0)
                    {{ $roles->links() }}
                @endif
                <!-- /.card-body -->
            </div>

            <!-- /.card -->
        </div>
    </div>
    <!-- /.content -->
</div>
    
@endsection

