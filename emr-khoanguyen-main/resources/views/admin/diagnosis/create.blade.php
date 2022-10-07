@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">Nhập chẩn đoán</h1>
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
          <h3 class="card-title">Nhập chẩn đoán</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('diagnosis.store') }}" method="POST" id="form-1">
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
                    
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_tuanhoan">Bệnh chính<span class="mandatory"> *</span></label>
                            <select id="icd10_main_code" name="icd10_main_code" class="form-control select2" style="width: 100%;">
                                <option value=""></option>
                                @foreach ($icd10s as $icd10)
                                    <option {{ !empty($diagnosis) && $diagnosis->icd10_main_code == $icd10->code ? 'selected' : '' }} value="{{ $icd10->code }}">{{ $icd10->code . '-' . $icd10->name}}</option>
                                @endforeach
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis_tuanhoan">Bệnh kèm theo</label>
                            <select id="icd10_sub_code" name="icd10_sub_code" class="form-control select2" style="width: 100%;">
                                <option value=""></option>
                                @foreach ($icd10s as $icd10)
                                    <option {{ !empty($diagnosis) && $diagnosis->icd10_sub_code == $icd10->code ? 'selected' : '' }} value="{{ $icd10->code }}">{{ $icd10->code . '-' . $icd10->name}}</option>
                                @endforeach
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="diagnosis">Chẩn đoán<span class="mandatory"> *</span></label>
                            <textarea style="resize: none" name="diagnosis" id="diagnosis" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('diagnosis', !empty($diagnosis) ? $diagnosis->diagnosis : '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disease_prognosis">Tiên lượng</label>
                            <textarea style="resize: none" name="disease_prognosis" id="disease_prognosis" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('disease_prognosis', !empty($diagnosis) ? $diagnosis->disease_prognosis : '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disease_plan">Kế hoạch điều trị<span class="mandatory"> *</span></label>
                            <textarea style="resize: none" name="disease_plan" id="disease_plan" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('disease_plan', !empty($diagnosis) ? $diagnosis->disease_plan : '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="result_imaging">Kết quả ảnh chụp</label>

                            <div class="form-group">
                                {!! App\Helpers\Helper::getImagingResultLink(Session::get('patient_id')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="result_lab">Kết quả xét nghiệm</label>
                            <div class="form-group">
                                {!! App\Helpers\Helper::getLabResultLink(Session::get('patient_id')) !!}
                            </div>
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