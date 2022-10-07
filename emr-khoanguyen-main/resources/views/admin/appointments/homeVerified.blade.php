@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý lịch hẹn</h1>
                    </div>
                </div><!-- /.row -->

                @include('admin.layouts.alert')

                <!-- Main content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lịch hẹn đã xác nhận</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width:15px">ID</th>
                                        <th>Tên bệnh nhân</th>
                                        <th>Số điện thoại</th>
                                        <th>@lang('Action')</th>
                                        <th>@lang('Updated at')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($appointmentVerifieds) != 0)
                                            @foreach ($appointmentVerifieds as $appointmentVerified)
                                                <tr>
                                                    <td>{{ $appointmentVerified->id }}</td>
                                                    <td>{{ $appointmentVerified->name }}</td>
                                                    <td>{{ $appointmentVerified->phone }}</td>
                                                    <td>
                                                        <div>
                                                            {{-- <a href="#" class="btn btn-outline-info btn-inline-block">
                                                                <i class="fas fa-tools"></i> @lang('Edit')
                                                            </a> --}}
                                                            <button type="button" class="btn btn-sm btn-outline-info btn-inline-block" data-toggle="modal" data-target="#{{ 'ModalDetail-' . $appointmentVerified->id }}">
                                                                <i class="fas fa-eye"></i> @lang('Detail')
                                                            </button>

                                                            <!-- Modal Detail -->
                                                            <div class="modal fade" id="{{ 'ModalDetail-' . $appointmentVerified->id }}">
                                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                    <div class="modal-content">
                                                                    
                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Thông tin cuộc hẹn</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        
                                                                        <!-- Modal body -->
                                                                        <form action="{{ route('addpatient.addNewPatient') }}" method="post">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                    
                                                                                <div class="row">
                                                                                  <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                      <label for="full_name" class="form-label">Tên đầy đủ</label>
                                                                                      <input id="full_name" name="full_name" value="{{ $appointmentVerified->name }}" type="text" class="form-control">
                                                                                      <span class="form-message"></span>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                      <label for="email" class="form-label">Email</label>
                                                                                      <input id="email" name="email" value="{{ $appointmentVerified->email }}" type="text" class="form-control">
                                                                                      <span class="form-message"></span>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                    
                                                                                <div class="row">
                                                                                  <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                      <label for="phone_patient" class="form-label">Điện thoại di động</label>
                                                                                      <input id="phone_patient" name="phone_patient" value="{{ $appointmentVerified->phone }}" type="tel" placeholder="Số điện thoại" class="form-control">
                                                                                      <span class="form-message"></span>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                      <label for="formDate" class="form-label">Lịch hẹn</label>
                                                                                      <input disabled id="formDate" name="date" value="{{ $appointmentVerified->date }}" type="date" class="form-control">
                                                                                      <span class="form-message"></span>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                    
                                                                                <div class="row">
                                                                                  <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                      <label for="time" class="form-label">Thời gian</label>
                                                                                      <input disabled id="time" name="time" value="{{ $appointmentVerified->time }}" type="text" class="form-control">
                                                                                      <span class="form-message"></span>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                      <label for="formAddress" class="form-label">Địa chỉ</label>
                                                                                      <input disabled id="formAddress" name="address" value="{{ $appointmentVerified->address }}" type="text" class="form-control">
                                                                                      <span class="form-message"></span>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                    
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                        <label for="sex" class="form-label">Giới tính</label>
                                                                                        <input id="sex" name="sex" value="{{ $appointmentVerified->gender }}" type="text" class="form-control">
                                                                                        <span class="form-message"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label for="identity_number">Căn cước công dân<span style="color: red" class="mandatory"> *</span></label>
                                                                                            <input value="{{ old('identity_number') }}" id="identity_number" name="identity_number" type="text" placeholder="Số CCCD" class="form-control">
                                                                                            <span class="form-message"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                {{-- <div class="row">

                                                                                </div> --}}
                                                                                <div class="form-group">
                                                                                  <label for="services" class="form-label">Dịch vụ yêu cầu</label>
                                                                                      <input disabled id="services" name="services" value="{{ $appointmentVerified->services }}" type="text" class="form-control">
                                                                                      <span class="form-message"></span>
                                                                                </div>
                                                                    
                                                                                <div class="form-group">
                                                                                  <label for="more_info" class="form-label">Thông tin ghi thêm</label>
                                                                                  <textarea disabled name="more_info" id="more_info" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $appointmentVerified->more_info }}</textarea>
                                                                                </div>
    
                                                                                <button type="submit" class="btn btn-danger">
                                                                                    <i class="fas fa-check"></i> Thêm bệnh nhân mới
                                                                                </button>
                                                                                {{-- <button type="button" style="margin-left: 20px" class="btn btn-primary" data-dismiss="modal">
                                                                                    <i class="fas fa-window-close"></i> @lang('Cancel')
                                                                                </button> --}}
                                                                                
                                                                            </div>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button type="button" class="btn btn-sm btn-outline-danger btn-inline-block" data-toggle="modal" data-target="#{{ 'myModal-' . $appointmentVerified->id }}">
                                                                <i class="fas fa-trash"></i> @lang('Delete')
                                                            </button>

                                                            <!-- Modal Delete -->
                                                            <div class="modal fade" id="{{ 'myModal-' . $appointmentVerified->id }}">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Xóa lịch hẹn bệnh nhân<br> 
                                                                            <b><i>{{ $appointmentVerified->name }}</i></b>
                                                                        </h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body" style="display:flex;">
                                                                        <button onclick="alert('test')" type="button" class="btn btn-danger" data-dismiss="modal">
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
                                                    <td>{{ $appointmentVerified->updated_at }}</td>
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

                            @if (count($appointmentVerifieds) != 0)
                                {{ $appointmentVerifieds->links() }}
                            @endif
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.content -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    </div>
@endsection