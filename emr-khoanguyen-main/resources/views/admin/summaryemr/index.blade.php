@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tổng kết bệnh án</h1>
            </div>
            <div class="col-md-6">
                <button class="btn btn-default" type="button">
                    <a target="_blank" href="{{ route('pdf.index') }}">Xuất PDF <i class="fas fa-file-export"></i></a>
                </button>
              </div>
            </div><!-- /.row -->
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
            @include('admin.layouts.alert')
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tổng kết bệnh án</h3>
          
        </div>
        <!-- Main content -->
        @if (Session::get('patient_id') != null)
            <section style="margin-top: 10px;" class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="/assets/avatar_patient.jpg"
                                        alt="User profile picture">
                                </div>
                
                                <h3 class="profile-username text-center">{{$patient->full_name}}</h3>
                
                                <p class="text-muted text-center">{{ $patient->patient_id }}</p>
                
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                    <b>Ngày sinh</b> <a class="float-right">{{date_format(date_create($patient->dob), "d/m/Y")}}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Giới tính</b> <a class="float-right">{{ $patient->sex }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Nghề nghiệp</b> <a class="float-right">{{ $patient->occupation }}</a>
                                    </li>
                                </ul>
                
                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Chi tiết</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-flag"></i> Quốc tịch</strong>
                    
                                    <p class="text-muted">
                                        {{ $patient->nationality }}
                                    </p>
                
                                    <hr>
                
                                    <strong><i class="fas fa-heart"></i> Dân tộc</strong>
                    
                                    <p class="text-muted">{!! App\Helpers\Helper::getEthnicName($patient->ethnic_id) !!}</p>
                    
                                    <hr>
                    
                                    <strong><i class="fas fa-church"></i> Tôn giáo</strong>
                    
                                    <p class="text-muted">
                                        {{ $patient->religion }}
                                    </p>
                
                                    <hr>
                
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>
                                    <p class="text-muted">
                                        {!! App\Helpers\Helper::getPatientAddress($patient->city_id, $patient->district_id, $patient->ward_id, $patient->home_address) !!}
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-envelope"></i> Email</strong>
                                    <p class="text-muted">
                                        {{ $patient->email }}
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-mobile-alt"></i> Số điện thoại</strong>
                                    <p class="text-muted">
                                        {{ $patient->phone_patient }}
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-id-card"></i> CCCD</strong>
                                    <p class="text-muted">
                                        {{ $patient->identity_number }}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-ring"></i> Tình trạng hôn nhân</strong>
                                    <p class="text-muted">
                                        {{ $patient->marital_status }}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-user-friends"></i> Người thân</strong>
                                    <p class="text-muted">
                                        {{ $patient->name_next_of_kin }}
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-user-friends"></i> Địa chỉ người thân</strong>
                                    <p class="text-muted">
                                        {{ $patient->home_next_of_kin }}
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-user-friends"></i> SĐT người thân</strong>
                                    <p class="text-muted">
                                        {{ $patient->phone_next_of_kin }}
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-user-circle"></i> Loại đối tượng</strong>
                                    <p class="text-muted">
                                        {{ $patient->type_of_object }}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-address-card"></i> Số thẻ BHYT</strong>
                                    <p class="text-muted">
                                        {{ $patient->health_insurance_id }}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-calendar-alt"></i> Ngày hết hạn BHYT</strong>
                                    <p class="text-muted">
                                        {{ $patient->health_insurance_date }}
                                    </p>
                                    <hr>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12" id="accordion">
                                    @foreach ($hospitalhistory_times as $hospitalhistory_time)
                                        @php
                                            $history = App\Helpers\Helper::getHistoryWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
                                            $vital = App\Helpers\Helper::getVitalWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
                                            $general = App\Helpers\Helper::getGeneralWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
                                            $sub_clinical_services = App\Helpers\Helper::getSubClinicWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
                                            $diagnosis = App\Helpers\Helper::getDiagnosisWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
                                            $blood_results =  App\Helpers\Helper::getBloodResult(Session::get('patient_id'), $hospitalhistory_time->time);
                                        @endphp
                                        <div class="card card-primary card-outline">
                                            <a class="d-block w-100" data-toggle="collapse" href="#collapse_{{$hospitalhistory_time->time}}">
                                                <div class="card-header">
                                                    <h4 class="card-title w-100">
                                                        Lần khám thứ {{$hospitalhistory_time->time}}, thời gian: {{ date('d/m/Y H:i:s', strtotime($history->date_attented)) }}
                                                    </h4>
                                                </div>
                                            </a>
                                            <div id="collapse_{{$hospitalhistory_time->time}}" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header p-2">
                                                                <ul class="nav nav-pills">
                                                                    <li class="nav-item"><a class="nav-link active" href="#activity_{{$hospitalhistory_time->time}}" data-toggle="tab">Lịch sử khám</a></li>
                                                                    <li class="nav-item"><a class="nav-link" href="#timeline_{{$hospitalhistory_time->time}}" data-toggle="tab">Lâm sàng tổng quát</a></li>
                                                                    <li class="nav-item"><a class="nav-link" href="#subclinical_{{$hospitalhistory_time->time}}" data-toggle="tab">Kết quả cận lâm sàng</a></li>
                                                                    <li class="nav-item"><a class="nav-link" href="#settings_{{$hospitalhistory_time->time}}" data-toggle="tab">Chẩn đoán</a></li>
                                                                </ul>
                                                            </div><!-- /.card-header -->
                                                            <div class="card-body">
                                                                <div class="tab-content">

                                                                    <!-- Lịch sử khám -->
                                                                    <div class="active tab-pane" id="activity_{{$hospitalhistory_time->time}}">
                                                                        @if ($history)
                                                                            <div class="row">
                                                                                <h6><i>Người cập nhật: <b>{{ $history->creator->name }}</b></i></h6>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>Thời gian đến</label>
                                                                                        <input disabled value="{{ $history->date_attented }}" type="datetime-local" class="form-control">
                                                                                        <span class="form-message"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>Thời gian tiếp nhận</label>
                                                                                        <input disabled value="{{ $history->date_admitted }}" type="datetime-local" class="form-control">
                                                                                        <span class="form-message"></span>
                                                                                    </div>
                                                                                </div>
                                                            
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>Khoa tiếp nhận</label>
                                                                                        <select disabled class="form-control">
                                                                                            <option selected value="{{ $history->admit_dept }}">{{ $history->admit_dept }}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="refer_dept">Nơi giới thiệu</label>
                                                                                        <select disabled class="form-control">
                                                                                        <option selected value="{{ $history->refer_dept }}">{{ $history->refer_dept }}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label>Triệu chứng</label>
                                                                                        <input disabled type="text" class="form-control" value="{{ $history->symptoms }}" placeholder="triệu chứng">
                                                                                        <span class="form-message"></span>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label>Lý do</label>
                                                                                        <input disabled type="text" class="form-control" value="{{ $history->reason }}" placeholder="Lý do">
                                                                                        <span class="form-message"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
            
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>Số ngày biểu hiện</label>
                                                                                        <input disabled type="text" class="form-control" value="{{ $history->reason_date }}" placeholder="">
                                                                                        <span class="form-message"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.col -->
                                                                            </div>
                                                            
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Tiền sử bệnh của bản thân</label>
                                                                                        <textarea disabled cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $history->disease_self }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Tiền sử bệnh của gia đình</label>
                                                                                        <textarea disabled cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $history->disease_family }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                <div class="card">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">Đặc điểm liên quan bệnh</h3>
                                                                                    </div>
                                                                                    <!-- /.card-header -->
                                                                                    <div class="card-body table-responsive p-0">
                                                                                    <table class="table table-hover text-nowrap">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>TT</th>
                                                                                            <th>Ký hiệu</th>
                                                                                            <th>Thời gian tính theo tháng</th>
                                                                                            <th>TT</th>
                                                                                            <th>Ký hiệu</th>
                                                                                            <th>Thời gian tính theo tháng</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>01</td>
                                                                                                <td>
                                                                                                    <input disabled {{ $history->disease_relateto_relateto_diung == '1' ? 'checked' : '' }} type="checkbox" value="1">
                                                                                                    <label>Dị ứng</label><br>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input disabled value="{{ $history->disease_relateto_diung_time }}" name="disease_relateto_diung_time" type="text">
                                                                                                </td>
                                                                                                <td>04</td>
                                                                                                <td>
                                                                                                    <input disabled {{ $history->disease_relateto_thuocla == '1' ? 'checked' : '' }} type="checkbox" value="1">
                                                                                                    <label>Thuốc lá, thuốc lào</label><br>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input disabled value="{{ $history->disease_relateto_thuocla_time }}" type="text">
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>02</td>
                                                                                                <td>
                                                                                                    <input disabled {{ $history->disease_relateto_matuy == '1' ? 'checked' : '' }} type="checkbox" value="1">
                                                                                                    <label>Ma túy</label><br>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input disabled value="{{ $history->disease_relateto_matuy_time }}" type="text">
                                                                                                </td>
                                                                                                <td>05</td>
                                                                                                <td>
                                                                                                    <input disabled {{ $history->disease_relateto_khac == '1' ? 'checked' : '' }} type="checkbox" value="1">
                                                                                                    <label>Khác</label>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input disabled value="{{ $history->disease_relateto_khac_time }}" type="text">
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>03</td>
                                                                                                <td>
                                                                                                    <input disabled {{ $history->disease_relateto_ruoubia == '1' ? 'checked' : '' }} type="checkbox" value="1">
                                                                                                    <label>Rượu bia</label>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input disabled value="{{ $history->disease_relateto_ruoubia_time }}" type="text">
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                </div>
                                                                                <!-- /.card -->
                                                                                </div>
                                                                            </div>
                                                                            <!-- /.row -->
                                                                        @else
                                                                            <div class="col-md-12 text-danger mt-2">
                                                                                chưa có lịch sử khám
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <!-- Lâm sàng tổng quát -->
                                                                    <div class="tab-pane" id="timeline_{{$hospitalhistory_time->time}}">
                                                                        <!-- Thông tin sinh hiệu -->
                                                                        @if ($vital)
                                                                            @if ($vital->creator != null)
                                                                                <div class="row">
                                                                                    <h6><i>Người cập nhật: <b>{{ $vital->creator->name }}</b></i></h6>
                                                                                </div>
                                                                            @endif
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label>Nhiệt độ <i>&deg;C</i></label>
                                                                                        <input disabled value="{{ $vital->temperature }}" type="text" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label>Chiều cao <i>cm</i></label>
                                                                                        <input disabled value="{{ $vital->height }}" type="text" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label>Cân nặng <i>kg</i></label>
                                                                                        <input disabled value="{{ $vital->weight }}" type="text" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label>Nhịp tim <i>lần/phút</i></label>
                                                                                        <input disabled value="{{ $vital->pulse }}" type="text" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label for="blood_group">Nhóm máu</label>
                                                                                        <select disabled id="blood_group" name="blood_group" class="form-control">
                                                                                            <option selected value="{{$vital->blood_group}}">{{$vital->blood_group}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label>Loại máu</label>
                                                                                        <select disabled class="form-control">
                                                                                            <option selected value="{{$vital->blood_type}}">{{$vital->blood_type}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="row">
                                                                            
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>HA tâm thu <i>mmHg</i></label>
                                                                                        <input disabled type="text" class="form-control" value="{{ $vital->systolic }}" placeholder="HA tâm thu">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>HA tâm trương <i>mmHg</i></label>
                                                                                        <input disabled type="text" class="form-control" value="{{ $vital->diastolic }}" placeholder="HA tâm trương">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>Mạch đập <i>lần/phút</i></label>
                                                                                        <input disabled type="text" class="form-control" value="{{ $vital->blood_pressure }}" placeholder="">
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                            
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>Nhịp thở <i>lần/phút</i></label>
                                                                                        <input disabled type="text" class="form-control" value="{{ $vital->respiration }}" placeholder="">
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                            
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Ghi chú</label>
                                                                                        <textarea disabled cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $vital->note }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div class="col-md-12 text-danger mt-2">
                                                                                chưa có thông tin sinh hiệu
                                                                            </div>
                                                                        @endif
                                                                        
                                                                        @if ($general)
                                                                            <hr><hr>
                                                                            @if ($general->creator != null)
                                                                                <div class="row">
                                                                                    <h6><i>Người cập nhật: <b>{{ $general->creator->name }}</b></i></h6>
                                                                                </div>
                                                                            @endif
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="name_subclinical_service">Chỉ định dịch vụ cận lâm sàng</label>
                                                                                        @if ($sub_clinical_services)
                                                                                            <select disabled class="select2" name="name_subclinical_service[]" multiple="multiple" data-placeholder="Chọn dịch vụ" style="width: 100%;">
                                                                                                @foreach ($sub_clinical_services as $sub_clinical_service)
                                                                                                    <option selected value="{{$sub_clinical_service->name}}">{{$sub_clinical_service->name}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        @else
                                                                                            <div class="col-md-12 text-danger mt-2">
                                                                                                chưa yêu cầu dịch vụ cận lâm sàng
                                                                                            </div>
                                                                                        @endif
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>chẩn đoán hệ tuần hoàn</label>
                                                                                        <textarea disabled style="resize: none" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_tuanhoan }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>chẩn đoán hệ hô hấp</label>
                                                                                        <textarea disabled style="resize: none" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_hohap }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_tieuhoa">chẩn đoán hệ tiêu hóa</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_tieuhoa" id="diagnosis_tieuhoa" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_tieuhoa }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_than_tietnieu_sinhduc">chẩn đoán hệ tiết niệu sinh duc</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_than_tietnieu_sinhduc" id="diagnosis_than_tietnieu_sinhduc" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_than_tietnieu_sinhduc }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_thankinh">chẩn đoán hệ thần kinh</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_thankinh" id="diagnosis_thankinh" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_thankinh }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_coxuongkhop">chẩn đoán hệ cơ xương khớp</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_coxuongkhop" id="diagnosis_coxuongkhop" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_coxuongkhop }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_taimuihong">chẩn đoán tai mũi họng</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_taimuihong" id="diagnosis_taimuihong" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_taimuihong }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_ranghammat">chẩn đoán răng hàm mặt</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_ranghammat" id="diagnosis_ranghammat" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_ranghammat }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_mat">chẩn đoán mắt</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_mat" id="diagnosis_mat" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_mat }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_noitiet_dinhduong_khac">chẩn đoán khác</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_noitiet_dinhduong_khac" id="diagnosis_noitiet_dinhduong_khac" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_noitiet_dinhduong_khac }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="diagnosis_syndrome">Hội chứng</label>
                                                                                        <textarea disabled style="resize: none" name="diagnosis_syndrome" id="diagnosis_syndrome" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $general->diagnosis_syndrome }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        @else
                                                                            <div class="col-md-12 text-danger mt-2">
                                                                                chưa có kết quả khám lâm sàng tổng quát
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    
                                                                    <!-- Kết quả cận lâm sàng -->
                                                                    <div class="tab-pane" id="subclinical_{{$hospitalhistory_time->time}}">
                                                                        @if (count($blood_results) != 0)
                                                                            @foreach ($blood_results as $blood_result)
                                                                                <div class="row">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">Bảng kết quả xét nghiệm máu</h3>
                                                                                        <p><i>Thời gian: <b> {{$blood_result->created_at}}</b></i></p>
                                                                                    </div>
                                                                                    <!-- /.card-header -->
                                                                                    <div class="card-body table-responsive p-0">
                                                                                        <table class="table table-hover">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>Yêu cầu xét nghiệm</th>
                                                                                                <th>Kết quả xét nghiệm</th>
                                                                                                <th>Trị số bình thường</th>
                                                                                                <th>Đơn vị</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>Đường trong máu (GLU)</td>
                                                                                                    <td><b>{{ $blood_result->glu }}</b></td>
                                                                                                    <td>4.1 - 5.9</td>
                                                                                                    <td><span class="tag tag-success">mmol/L</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Ure (Ure máu)</td>
                                                                                                    <td><b>{{ $blood_result->ure }}</b></td>
                                                                                                    <td>2.5 - 7.5</td>
                                                                                                    <td><span class="tag tag-success">mmol/L</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Số lượng hồng cầu (RBC)</td>
                                                                                                    <td><b>{{ $blood_result->rbc }}</b></td>
                                                                                                    <td>4,2 - 5.4 (nam) <br>4.0 - 4.9 (nữ)</td>
                                                                                                    <td><span class="tag tag-success">Tera/L</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Lượng huyết sắc tố (Hb)</td>
                                                                                                    <td><b>{{ $blood_result->hb }}</b></td>
                                                                                                    <td>130 - 160 (nam) <br>125 - 142 (nữ)</td>
                                                                                                    <td><span class="tag tag-success">g/L</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Khối hồng cầu (HCT)</td>
                                                                                                    <td><b>{{ $blood_result->hct }}</b></td>
                                                                                                    <td>42 - 47 (nam) <br> 37 - 42 (nữ)</td>
                                                                                                    <td><span class="tag tag-success">%</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Thể tích trung bình của hồng cầu (MCV)</td>
                                                                                                    <td><b>{{ $blood_result->mcv }}</b></td>
                                                                                                    <td>85 - 95</td>
                                                                                                    <td><span class="tag tag-success">fL</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Lượng Hb trung bình hồng cầu (MCH)</td>
                                                                                                    <td><b>{{ $blood_result->mch }}</b></td>
                                                                                                    <td>26 - 32</td>
                                                                                                    <td><span class="tag tag-success">pg</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Số lượng bạch cầu trong một thể tích máu (WBC)</td>
                                                                                                    <td><b>{{ $blood_result->wbc }}</b></td>
                                                                                                    <td>4 - 10</td>
                                                                                                    <td><span class="tag tag-success">g/L</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Bạch cầu trung tính(NEUT)</td>
                                                                                                    <td><b>{{ $blood_result->neut }}</b></td>
                                                                                                    <td>42.8 - 75.8</td>
                                                                                                    <td><span class="tag tag-success">%</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Bạch cầu Lympho (LYM)</td>
                                                                                                    <td><b>{{ $blood_result->lym }}</b></td>
                                                                                                    <td>16.8 - 45.3</td>
                                                                                                    <td><span class="tag tag-success">%</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Bạch cầu Mono</td>
                                                                                                    <td><b>{{ $blood_result->mono }}</b></td>
                                                                                                    <td>4.7 - 12</td>
                                                                                                    <td><span class="tag tag-success">%</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Số lượng tiểu cầu trong một thể tích máu (PLT)</td>
                                                                                                    <td><b>{{ $blood_result->plt }}</b></td>
                                                                                                    <td>150 - 350</td>
                                                                                                    <td><span class="tag tag-success">g/L</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Nhóm máu</td>
                                                                                                    <td><b>{{ $blood_result->blood_group }}</b></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Loại máu</td>
                                                                                                    <td><b>{{ $blood_result->blood_type }}</b></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                            @endforeach
                                                                        @endif
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="result_imaging">Kết quả ảnh chụp</label>
                                                        
                                                                                    <div class="form-group">
                                                                                        {!! App\Helpers\Helper::getImagingResultLink2(Session::get('patient_id'), $hospitalhistory_time->time) !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="result_lab">Kết quả xét nghiệm</label>
                                                                                    <div class="form-group">
                                                                                        {!! App\Helpers\Helper::getLabResultLink2(Session::get('patient_id'), $hospitalhistory_time->time) !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Chẩn đoán -->
                                                                    <div class="tab-pane" id="settings_{{$hospitalhistory_time->time}}">
                                                                        @if ($diagnosis)
                                                                            @if ($diagnosis->creator != null)
                                                                                <div class="row">
                                                                                    <h6><i>Người cập nhật: <b>{{ $diagnosis->creator->name }}</b></i></h6>
                                                                                </div>
                                                                            @endif
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Bệnh chính</label>
                                                                                        <select class="form-control select2" style="width: 100%;">
                                                                                            <option selected value="{{ $diagnosis->icd10_main_code }}">{!! $diagnosis->icd10_main_code .' - '. App\Helpers\Helper::getIcd10Name($diagnosis->icd10_main_code) !!}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Bệnh kèm theo</label>
                                                                                        <select class="form-control select2" style="width: 100%;">
                                                                                            <option selected value="{{ $diagnosis->icd10_sub_code }}">{!! $diagnosis->icd10_sub_code .' - '. App\Helpers\Helper::getIcd10Name($diagnosis->icd10_sub_code) !!}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                            
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Chẩn đoán</label>
                                                                                        <textarea disabled style="resize: none" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $diagnosis->diagnosis }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Tiên lượng</label>
                                                                                        <textarea disabled style="resize: none" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $diagnosis->disease_prognosis }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Kế hoạch điều trị</label>
                                                                                        <textarea disabled style="resize: none" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ $diagnosis->disease_plan }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        @else
                                                                            <div class="col-md-12 text-danger mt-2">
                                                                                chưa có kết quả chẩn đoán
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <!-- /.tab-content -->
                                                            </div><!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.card-header -->
        @else
            <div class="col-md-12 text-danger mt-2">
                Vui lòng chọn bệnh nhân để xem chi tiết
            </div>
        @endif
    <!-- /.content -->
    </div>
    
    <!-- /.content -->
</div>
    
@endsection

@section('script')
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });    

</script>
@endsection