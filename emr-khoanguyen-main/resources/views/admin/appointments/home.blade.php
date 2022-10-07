@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý bệnh nhân đặt lịch</h1>
                    </div>
                </div><!-- /.row -->

                @include('admin.layouts.alert')

                <!-- Main content -->
                <div class="row">
                    <div class="col-12">
                      <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Chưa xác nhận ({{ !empty($appointmentPendings) ? count($appointmentPendings) : '0' }})</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Đã xác nhận ({{ !empty($appointmentVerifieds) ? count($appointmentVerifieds) : '0' }})</a>
                            </li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <!-- Appointment content -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Đang chờ xác nhận</h3>

                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0 loadAjax">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:15px">ID</th>
                                                        <th>@lang('Name')</th>
                                                        <th>@lang('Email')</th>
                                                        <th>@lang('Phone Number')</th>
                                                        <th>@lang('Status')</th>
                                                        <th>@lang('Updated at')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($paginatePendings) != 0)
                                                            @foreach ($paginatePendings as $paginatePending)
                                                                <tr id="rowId_{{ $paginatePending->id }}">
                                                                    <td>{{ $paginatePending->id }}</td>
                                                                    <td>{{ $paginatePending->name }}</td>
                                                                    <td>{{ $paginatePending->email }}</td>
                                                                    <td>{{ $paginatePending->phone }}</td>
                                                                    <td>
                                                                        <div class="btn btn-sm btn-block bg-gradient-info disabled">Chờ xác nhận</div>
                                                                    </td>
                                                                    <td>{{ $paginatePending->updated_at }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="6">Không có kết quả</td>
                                                            </tr>
                                                        @endif
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

                                            @if (count($paginatePendings) != 0)
                                                {{ $paginatePendings->links() }}
                                            @endif
                                            <!-- /.card-body -->
                                        </div>

                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.content -->
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <!-- Appointment content -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Đã xác nhận</h3>

                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0 loadAjax">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:15px">ID</th>
                                                        <th>@lang('Name')</th>
                                                        <th>@lang('Email')</th>
                                                        <th>@lang('Phone Number')</th>
                                                        <th>@lang('Status')</th>
                                                        <th>@lang('Updated at')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($paginateVerifieds) != 0)
                                                            @foreach ($paginateVerifieds as $paginateVerified)
                                                                <tr id="rowId_{{ $paginateVerified->id }}">
                                                                    <td>{{ $paginateVerified->id }}</td>
                                                                    <td>{{ $paginateVerified->name }}</td>
                                                                    <td>{{ $paginateVerified->email }}</td>
                                                                    <td>{{ $paginateVerified->phone }}</td>
                                                                    <td>
                                                                        <div class="btn btn-sm btn-block bg-gradient-success disabled">Đã xác nhận</div>
                                                                    </td>
                                                                    <td>{{ $paginateVerified->updated_at }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="6">Không có kết quả</td>
                                                            </tr>
                                                        @endif
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

                                            {{-- @if (count($paginateVerifieds) != 0)
                                                {{ $paginateVerifieds->links() }}
                                            @endif --}}
                                            <!-- /.card-body -->
                                        </div>

                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.content -->
                            </div>
                          </div>
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                </div>
                <!-- /.content -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    </div>
@endsection