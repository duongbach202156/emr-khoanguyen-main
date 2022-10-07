@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nhập thông tin khám lâm sàng</h1>
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
          <h3 class="card-title">Nhập thông tin khám lâm sàng</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('generalclinical.store') }}" method="POST" id="form-1">
            <div class="card-body">
                <div class="row">
                    <div hidden class="col-6">
                        <div class="form-group">
                            <label>Nhập tên hoặc mã bệnh nhân để tìm kiếm:<span class="mandatory"> *</span></label>
                            <input value="{{ Session::get('patient_id') }}" autocomplete="off" id="search_khoa_nguyen" type="text" class="form-control" name="patient_id" list="fullname_patient" placeholder="Nhập tên hoặc mã bệnh nhân">
                            <datalist id="fullname_patient">
                            </datalist>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_subclinical_service">Chỉ định dịch vụ cận lâm sàng</label>
                            <select class="select2" name="name_subclinical_service[]" multiple="multiple" data-placeholder="Chọn dịch vụ" style="width: 100%;">
                                @if (!empty($assigned_subclinical_services))
                                    @if (!in_array("Siêu âm", $assigned_subclinical_services))
                                        <option value="Siêu âm">Siêu âm</option>
                                    @endif
                                    @if (!in_array("Xét nghiệm máu", $assigned_subclinical_services))
                                        <option value="Xét nghiệm máu">Xét nghiệm máu</option>
                                    @endif
                                    @if (!in_array("X quang", $assigned_subclinical_services))
                                        <option value="X quang">X quang</option>
                                    @endif
                                    @if (!in_array("Cộng hưởng từ", $assigned_subclinical_services))
                                        <option value="Cộng hưởng từ">Cộng hưởng từ</option>
                                    @endif
                                    @if (!in_array("Nội soi", $assigned_subclinical_services))
                                        <option value="Nội soi">Nội soi</option>
                                    @endif
                                @else
                                    <option value="Siêu âm">Siêu âm</option>
                                    <option value="Xét nghiệm máu">Xét nghiệm máu</option>
                                    <option value="X quang">X quang</option>
                                    <option value="Cộng hưởng từ">Cộng hưởng từ</option>
                                    <option value="Nội soi">Nội soi</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_tuanhoan">chẩn đoán hệ tuần hoàn</label>
                            <textarea style="resize: none" name="diagnosis_tuanhoan" id="diagnosis_tuanhoan" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_tuanhoan', !empty($general_clinicals) ? $general_clinicals->diagnosis_tuanhoan : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_hohap">chẩn đoán hệ hô hấp</label>
                            <textarea style="resize: none" name="diagnosis_hohap" id="diagnosis_hohap" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_hohap', !empty($general_clinicals) ? $general_clinicals->diagnosis_hohap : '') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_tieuhoa">chẩn đoán hệ tiêu hóa</label>
                            <textarea style="resize: none" name="diagnosis_tieuhoa" id="diagnosis_tieuhoa" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_tieuhoa', !empty($general_clinicals) ? $general_clinicals->diagnosis_tieuhoa : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_than_tietnieu_sinhduc">chẩn đoán hệ tiết niệu sinh duc</label>
                            <textarea style="resize: none" name="diagnosis_than_tietnieu_sinhduc" id="diagnosis_than_tietnieu_sinhduc" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_than_tietnieu_sinhduc', !empty($general_clinicals) ? $general_clinicals->diagnosis_than_tietnieu_sinhduc : '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_thankinh">chẩn đoán hệ thần kinh</label>
                            <textarea style="resize: none" name="diagnosis_thankinh" id="diagnosis_thankinh" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_thankinh', !empty($general_clinicals) ? $general_clinicals->diagnosis_thankinh : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_coxuongkhop">chẩn đoán hệ cơ xương khớp</label>
                            <textarea style="resize: none" name="diagnosis_coxuongkhop" id="diagnosis_coxuongkhop" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_coxuongkhop', !empty($general_clinicals) ? $general_clinicals->diagnosis_coxuongkhop : '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_taimuihong">chẩn đoán tai mũi họng</label>
                            <textarea style="resize: none" name="diagnosis_taimuihong" id="diagnosis_taimuihong" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_taimuihong', !empty($general_clinicals) ? $general_clinicals->diagnosis_taimuihong : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_ranghammat">chẩn đoán răng hàm mặt</label>
                            <textarea style="resize: none" name="diagnosis_ranghammat" id="diagnosis_ranghammat" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_ranghammat', !empty($general_clinicals) ? $general_clinicals->diagnosis_ranghammat : '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_mat">chẩn đoán mắt</label>
                            <textarea style="resize: none" name="diagnosis_mat" id="diagnosis_mat" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_mat', !empty($general_clinicals) ? $general_clinicals->diagnosis_mat : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_noitiet_dinhduong_khac">chẩn đoán khác</label>
                            <textarea style="resize: none" name="diagnosis_noitiet_dinhduong_khac" id="diagnosis_noitiet_dinhduong_khac" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_noitiet_dinhduong_khac', !empty($general_clinicals) ? $general_clinicals->diagnosis_noitiet_dinhduong_khac : '') }}</textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_syndrome">Hội chứng</label>
                            <textarea style="resize: none" name="diagnosis_syndrome" id="diagnosis_syndrome" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis_syndrome', !empty($general_clinicals) ? $general_clinicals->diagnosis_syndrome : '') }}</textarea>
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