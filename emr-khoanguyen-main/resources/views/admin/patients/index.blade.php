@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0">Danh sách bệnh nhân</h1>
                </div>
                
                <div>
                    <a href="{{ route('patient.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm bệnh nhân mới
                    </a>
                </div>
            </div><!-- /.row -->

            <h4 class="text-center display-5">Tìm kiếm nâng cao</h4>
            <form action="{{ route('patient.index') }}">
                @php
                    if(isset($_GET['patient_id'])){
                        $patient_id_search = $_GET['patient_id'];
                    } else {
                        $patient_id_search = '';
                    }
                @endphp
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nhập tên hoặc mã bệnh nhân để tìm kiếm:</label>
                                    <input value="{{$patient_id_search}}" autocomplete="off" id="search_khoa_nguyen" type="text" class="form-control" name="patient_id" list="fullname_patient" placeholder="Nhập tên hoặc mã bệnh nhân">
                                    {{-- <input style="display:block" autocomplete="off" id="search_khoa_nguyen" type="text" name="patient_id" list="fullname_patient" placeholder="nhập tên bệnh nhân"> --}}
                                    <datalist id="fullname_patient">
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Thứ tự sắp xếp:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>Tăng dần</option>
                                        <option>Giảm dần</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Sắp xếp theo:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>Title</option>
                                        <option>Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-md">
                                {{-- <input type="search" class="form-control form-control-md search_khoa_nguyen" name="full_name" placeholder="Nhập từ khóa tìm kiếm" value=""> --}}
                                
                                <a href="{{ route('patient.index') }}" class="btn btn-default">
                                    <i class="fas fa-times-circle"></i> Hủy
                                </a>

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-md btn-default ml-1">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                
                                <button type="button" class="btn btn-md btn-primary ml-1" data-toggle="modal" data-target="#select_patient">
                                    <i class="fas fa-hand-pointer"></i> Chọn bệnh nhân thăm khám 
                                </button>
                                @if (Session::get('patient_id') != null)
                                <div class="col-md-12 text-success mt-2">
                                    Bênh nhân được chọn: 
                                    {!! App\Helpers\Helper::getPatientInfo(Session::get('patient_id')) !!}
                                </div>
                                @else
                                    <div class="col-md-12 text-danger mt-2">
                                        Chưa chọn bệnh nhân thăm khám
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @include('admin.layouts.alert')
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách bệnh nhân</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 loadAjax">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width:15px">ID</th>
                            <th style="width:40px">Mã bệnh nhân</th>
                            <th>@lang('Name')</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>@lang('Action')</th>
                            <th style="with:20px">@lang('Updated at')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (count($all_patients) != 0)
                                @foreach ($all_patients as $patient)
                                    <tr id="rowId_{{ $patient->id }}">
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->patient_id }}</td>
                                        <td>{{ $patient->full_name }}</td>
                                        <td>{{ $patient->phone_patient }}</td>
                                        <td>
                                            {!! App\Helpers\Helper::getPatientAddress($patient->city_id, $patient->district_id, $patient->ward_id, $patient->home_address) !!}
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-outline-info btn-inline-block mb-1" data-toggle="modal" data-target="#{{ 'ModalDetail-' . $patient->id }}">
                                                    <i class="fas fa-eye"></i> @lang('Detail')
                                                </button>
                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="{{ 'ModalDetail-' . $patient->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Thông tin bệnh nhân</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                    
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <span class="form-message"></span>
                                                                            <label for="title">Ông/bà</label>
                                                                            <input disabled type="text" class="form-control" value="{{ $patient->title }}" name="title" id="title" placeholder="Chức danh">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="fullname">@lang('Full Name')</label>
                                                                            <input disabled type="text" class="form-control" value="{{ $patient->full_name }}" name="full_name" id="fullname" placeholder="@lang('Type full name')">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="email">@lang('Email Address')</label>
                                                                            <input disabled type="email" class="form-control" name="email" value="{{ $patient->email }}" id="email" placeholder="@lang('Type email address')">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="form-group">
                                                                            <label for="phone-number">Điện thoại</label>
                                                                            <input disabled value="{{ $patient->phone_patient }}" id="phone-number" name="phone_patient" type="text" placeholder="Số điện thoại" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="identity_number">Căn cước công dân</label>
                                                                            <input disabled value="{{ $patient->identity_number }}" id="identity_number" name="identity_number" type="text" placeholder="Số CCCD" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                        <!-- /.form-group -->
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="occupation">Nghề nghiệp</label>
                                                                            <input disabled value="{{ $patient->occupation }}" id="occupation" name="occupation" type="text" placeholder="Nghề nghiệp" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col -->
                                                                    <div class="col-md-2">
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                            <label for="sex">Giới tính</label>
                                                                            <input disabled value="{{ $patient->sex }}" id="sex" name="sex" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.col -->
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="dob">Ngày tháng năm sinh</label>
                                                                            <input disabled value="{{ $patient->dob }}" id="dob" name="dob" type="date" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="nationality">Quốc tịch</label>
                                                                            <input disabled value="{{ $patient->nationality }}" id="nationality" name="nationality" type="text" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ethnic_id">Dân tộc</label>
                                                                            <input disabled value="{!! App\Helpers\Helper::getEthnicName($patient->ethnic_id) !!}" id="ethnic_id" name="ethnic_id" type="text" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="religion">Tôn giáo</label>
                                                                            <input disabled value="{{ $patient->religion }}" id="religion" name="religion" type="text" placeholder="Tôn giáo" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="city_id">Địa chỉ</label>
                                                                            <input disabled value="{!! App\Helpers\Helper::getPatientAddress($patient->city_id, $patient->district_id, $patient->ward_id, $patient->home_address) !!}" id="religion" name="religion" type="text" placeholder="Tôn giáo" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                            <label for="marital_status">Tình trạng hôn nhân</label>
                                                                            <input disabled value="{{ $patient->marital_status }}" id="marital_status" name="marital_status" type="text" placeholder="Tôn giáo" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                            <label for="name_next_of_kin">Người thân</label>
                                                                            <input disabled value="{{ $patient->name_next_of_kin }}" id="name_next_of_kin" name="name_next_of_kin" type="text" placeholder="Tên người thân" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                            <label for="home_next_of_kin">Địa chỉ người thân</label>
                                                                            <input disabled value="{{ $patient->home_next_of_kin }}" id="home_next_of_kin" name="home_next_of_kin" type="text" placeholder="Địa chỉ người thân" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="form-group">
                                                                            <label for="phone_next_of_kin">Điện thoại người thân</label>
                                                                            <input disabled value="{{ $patient->phone_next_of_kin }}" id="phone_next_of_kin" name="phone_next_of_kin" type="text" placeholder="Số điện thoại" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <!-- select -->
                                                                        <div class="form-group">
                                                                            <label for="type_of_object">Loại đối tượng</label>
                                                                            <input disabled value="{{ $patient->type_of_object }}" id="type_of_object" name="type_of_object" type="text" placeholder="Số điện thoại" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="form-group">
                                                                            <label for="health_insurance_id">Số thẻ BHYT</label>
                                                                            <input disabled value="{{ $patient->health_insurance_id }}" id="health_insurance_id" name="health_insurance_id" type="text" placeholder="Số thẻ BHYT" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="health_insurance_date">BHYT có giá trị đến ngày</label>
                                                                            <input disabled value="{{ $patient->health_insurance_date }}" id="health_insurance_date" name="health_insurance_date" type="date" class="form-control">
                                                                            <span class="form-message"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{-- <button onclick="alert('test')" type="button" class="btn btn-danger" data-dismiss="modal">
                                                                    <i class="fas fa-check"></i> @lang('Agree')
                                                                </button> --}}
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                                    <i class="fas fa-window-close"></i> @lang('Đóng')
                                                                </button>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-sm btn-outline-info btn-inline-block mb-1">
                                                    <i class="fas fa-tools"></i> @lang('Edit')
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-inline-block mb-1" data-toggle="modal" data-target="#{{ 'myModal-' . $patient->id }}">
                                                    <i class="fas fa-trash"></i> @lang('Delete')
                                                </button>
                                                @php
                                                    if(isset($_GET['page'])) {
                                                        $page = $_GET['page'];
                                                    } else {
                                                        $page = 1;
                                                    }
                                                @endphp
                                                <div class="modal fade" id="{{ 'myModal-' . $patient->id }}">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                      
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Xóa bệnh nhân<br> 
                                                                <b><i>{{ $patient->full_name .' - '. $patient->patient_id }}</i></b>
                                                            </h4>
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <div class="modal-body" style="display:flex;">
                                                            <button onclick="removeRow({{ $patient->id }}, '/emr/patient/destroy', {{ $page }}, '/emr/patient?page=')" type="button" class="btn btn-danger" data-dismiss="modal">
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
                                        <td>{{ $patient->updated_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">Không có kết quả</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>

                @if (count($all_patients) != 0)
                    {{ $all_patients->links() }}
                @endif
                <!-- /.card-body -->
            </div>

            <!-- /.card -->
        </div>
    </div>
    <!-- /.content -->
</div>

    <!-- Modal select bệnh nhân -->
    <div class="modal fade" id="select_patient">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chọn bệnh nhân để thăm khám
                </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('patient.selectpatient') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Nhập tên hoặc mã bệnh nhân để tìm kiếm:</label>
                                        <input value="{{$patient_id_search}}" autocomplete="off" id="select_patient" type="text" class="form-control" name="selected_patient" list="selected_patient" placeholder="Nhập tên hoặc mã bệnh nhân">
                                        {{-- <input style="display:block" autocomplete="off" id="search_khoa_nguyen" type="text" name="patient_id" list="fullname_patient" placeholder="nhập tên bệnh nhân"> --}}
                                        <datalist id="selected_patient">
                                        </datalist>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-md">
                                    <button type="submit" class="btn btn-success ml-1">
                                        <i class="fas fa-book-medical"></i> Chọn
                                    </button>
                                    
                                    <button style="margin-left: 20px" type="button" class="btn btn-danger" data-dismiss="modal">
                                        <i class="fas fa-times-circle"></i> Hủy
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            
        </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('.select2').select2()
        });
    </script>
@endsection
