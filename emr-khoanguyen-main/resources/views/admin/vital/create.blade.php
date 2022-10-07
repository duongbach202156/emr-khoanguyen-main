@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">Nhập thông tin sinh hiệu</h1>
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
          <h3 class="card-title">Nhập thông tin sinh hiệu</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('vital.store') }}" method="POST" id="form-1">
            <div class="card-body">
                <div class="row">
                    <div hidden class="col-4">
                        <div class="form-group">
                            <label>Nhập tên hoặc mã bệnh nhân để tìm kiếm:<span class="mandatory"> *</span></label>
                            <input value="{{ Session::get('patient_id') }}" autocomplete="off" id="search_khoa_nguyen" type="text" class="form-control" name="patient_id" list="fullname_patient" placeholder="Nhập tên hoặc mã bệnh nhân">
                            <datalist id="fullname_patient">
                            </datalist>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="temperature">Nhiệt độ <i>&deg;C</i><span class="mandatory"> *</span></label>
                            <input value="{{ old('temperature', !empty($vital) ? $vital->temperature : '') }}" id="temperature" name="temperature" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="height">Chiều cao <i>cm</i></label>
                            <input value="{{ old('height', !empty($vital) ? $vital->height : '') }}" id="height" name="height" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="weight">Cân nặng <i>kg</i></label>
                            <input value="{{ old('weight', !empty($vital) ? $vital->weight : '')}}" id="weight" name="weight" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="pulse">Nhịp tim <i>lần/phút</i></label>
                            <input value="{{ old('pulse', !empty($vital) ? $vital->pulse : '')}}" id="pulse" name="pulse" type="text" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="blood_group">Nhóm máu</label>
                            <select id="blood_group" name="blood_group" class="form-control">
                                <option value="">-- chọn nhóm máu --</option>
                                <option {{ !empty($vital) && $vital->blood_group == 'O' ? 'selected' : '' }} value="O">O</option>
                                <option {{ !empty($vital) && $vital->blood_group == 'A' ? 'selected' : '' }} value="A">A</option>
                                <option {{ !empty($vital) && $vital->blood_group == 'B' ? 'selected' : '' }} value="B">B</option>
                                <option {{ !empty($vital) && $vital->blood_group == 'AB' ? 'selected' : '' }} value="AB">AB</option>
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="blood_type">Loại máu</label>
                            <select id="blood_type" name="blood_type" class="form-control">
                                <option value="">----</option>
                                <option {{ !empty($vital) && $vital->blood_type == 'Rh+' ? 'selected' : '' }} value="Rh+">Rh+</option>
                                <option {{ !empty($vital) && $vital->blood_type == 'Rh-' ? 'selected' : '' }} value="Rh-">Rh-</option>
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="systolic">HA tâm thu <i>mmHg</i><span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" value="{{ old('systolic', !empty($vital) ? $vital->systolic : '') }}" name="systolic" id="systolic" placeholder="triệu chứng">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="diastolic">HA tâm trương <i>mmHg</i><span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" value="{{ old('diastolic', !empty($vital) ? $vital->diastolic : '') }}" name="diastolic" id="diastolic" placeholder="triệu chứng">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="blood_pressure">Mạch đập <i>lần/phút</i></label>
                            <input type="text" class="form-control" value="{{ old('blood_pressure', !empty($vital) ? $vital->blood_pressure : '') }}" name="blood_pressure" id="blood_pressure" placeholder="triệu chứng">
                            <span class="form-message"></span>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="respiration">Nhịp thở <i>lần/phút</i></label>
                            <input type="text" class="form-control" value="{{ old('respiration', !empty($vital) ? $vital->respiration : '')}}" name="respiration" id="respiration" placeholder="triệu chứng">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <textarea name="note" id="note" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('note', !empty($vital) ? $vital->note : '') }}</textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.card-body -->
            @csrf
            {{-- loading submit --}}
            <div class="loading loading-ring hidden">
                <div class="lds-dual-ring">Đang xử lý</div>
            </div>
            {{-- end loading submit --}}
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-submit-form"><i class="fas fa-plus"></i> @lang('Update')</button>
            </div>
        </form>
    </div>
    
    <!-- /.content -->
</div>
    
@endsection

@section('script')
<script>
    Validator({
        form: "#form-1",
        formGroupSelector: ".form-group",
        errorSelector: ".form-message",
        rules: [
            Validator.isRequired("#search_khoa_nguyen", "@lang('Please fill out this field')"),
        ]
    });
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });    

</script>
@endsection