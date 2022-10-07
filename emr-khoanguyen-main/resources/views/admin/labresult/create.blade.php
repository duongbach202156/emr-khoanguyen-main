@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nhập kết quả xét nghiệm</h1>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-md btn-primary ml-1" data-toggle="modal" data-target="#select_patient">
                    <i class="fas fa-hand-pointer"></i> Chọn bệnh nhân 
                </button>
            </div>
            </div><!-- /.row -->
            @if (Session::get('patient_id') != null)
                <div class="col-md-12 text-success mt-2">
                    Bênh nhân được chọn: 
                    {!! App\Helpers\Helper::getPatientInfo(Session::get('patient_id')) !!}
                </div>
                @php
                    $selectedservices = App\Helpers\Helper::checkLabService(Session::get('patient_id'));
                @endphp
                @if (!$selectedservices)
                    <div class="col-md-12 text-danger mt-2">
                        Bệnh nhân chưa yêu cầu dịch vụ xét nghiệm.
                    </div>
                @endif
            @else
                <div class="col-md-12 text-danger mt-2">
                    Bệnh nhân chưa yêu cầu dịch vụ Cận lâm sàng.
                </div>
            @endif
            @include('admin.layouts.alert')
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Nhập kết quả xét nghiệm</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('labresult.store') }}" method="POST" id="form-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div hidden class="col-md-12">
                                <div class="form-group">
                                    <label>Nhập tên hoặc mã bệnh nhân để tìm kiếm:<span class="mandatory"> *</span></label>
                                    <input value="{{ Session::get('patient_id') }}" autocomplete="off" id="search_khoa_nguyen" type="text" class="form-control" name="patient_id" list="fullname_patient" placeholder="Nhập tên hoặc mã bệnh nhân">
                                    <datalist id="fullname_patient">
                                    </datalist>
                                    <span class="form-message"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name_subclinical_service">Dịch vụ cận lâm sàng<span class="mandatory"> *</span></label>
                                    <select class="select2" name="name_subclinical_service" data-placeholder="Chọn dịch vụ" style="width: 100%;">
                                        @if (isset($selectedservices) && !empty($selectedservices) && count($selectedservices) != 0)
                                            @foreach ($selectedservices as $selectedservice)
                                                <option value="{{$selectedservice->name}}">{{ $selectedservice->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="url">Đường dẫn kết quả ảnh<span class="mandatory"> *</span></label>
                                    <input type="text" class="form-control" name="url" id="url_image" placeholder="Nhập đường dẫn ảnh">
                                    <span class="form-message"></span>
                                </div>
                                <div id="box_show_image" class="form-group" style="display:none">
                                    <a target="_blank" id="link_show_image" href="">
                                        <img style="width:250px" id="show_image" src="" alt="photo">
                                    </a>
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment">Nhận xét<span class="mandatory"> *</span></label>
                                    <textarea style="resize: none" name="comment" id="comment" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('comment') }}</textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <fieldset style="padding:30px; border:1px solid #4238ca; background:#f6f8ff;">
                            <legend>Nhập kết quả xét nghiệm máu:</legend>
                                <label for="glu">Đường trong máu (Glu):</label>
                                <div class="input-group mb-3">
                                    <input id="glu" name="glu" type="text" value="{{ old('glu') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(mmol/l)</span>
                                    </div>
                                </div>

                                <label for="ure">Ure máu (Ure):</label>
                                <div class="input-group mb-3">
                                    <input id="ure" name="ure" type="text" value="{{ old('ure') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(mmol/l)</span>
                                    </div>
                                </div>

                                <label for="rbc">Số lượng hồng cầu (RBC):</label>
                                <div class="input-group mb-3">
                                    <input id="rbc" name="rbc" type="text" value="{{ old('rbc') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(Tera/L)</span>
                                    </div>
                                </div>
                                
                                <label for="hb">Lượng huyết sắc tố (Hb):</label>
                                <div class="input-group mb-3">
                                    <input id="hb" name="hb" type="text" value="{{ old('hb') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(g/L)</span>
                                    </div>
                                </div>
                                
                                <label for="hct">Khối hồng cầu (HCT):</label>
                                <div class="input-group mb-3">
                                    <input id="hct" name="hct" type="text" value="{{ old('hct') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(%)</span>
                                    </div>
                                </div>
                                
                                <label for="mcv">Thể tích trung bình của hồng cầu (MCV):</label>
                                <div class="input-group mb-3">
                                    <input id="mcv" name="mcv" type="text" value="{{ old('mcv') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(fL)</span>
                                    </div>
                                </div>
                                
                                <label for="mch">Lượng Hb trung bình hồng cầu (MCH):</label>
                                <div class="input-group mb-3">
                                    <input id="mch" name="mch" type="text" value="{{ old('mch') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(pg)</span>
                                    </div>
                                </div>
                                
                                <label for="wbc">Số lượng bạch cầu trong một thể tích máu (WBC):</label>
                                <div class="input-group mb-3">
                                    <input id="wbc" name="wbc" type="text" value="{{ old('wbc') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(g/L)</span>
                                    </div>
                                </div>
                                
                                <label for="neut">Bạch cầu trung tính (NEUT):</label>
                                <div class="input-group mb-3">
                                    <input id="neut" name="neut" type="text" value="{{ old('neut') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(g/L)</span>
                                    </div>
                                </div>
                                
                                <label for="lym">Bạch cầu Lympho (LYM):</label>
                                <div class="input-group mb-3">
                                    <input id="lym" name="lym" type="text" value="{{ old('lym') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(g/L)</span>
                                    </div>
                                </div>
                                
                                <label for="mono">Bạch cầu Mono:</label>
                                <div class="input-group mb-3">
                                    <input id="mono" name="mono" type="text" value="{{ old('mono') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(g/L)</span>
                                    </div>
                                </div>
                                
                                <label for="plt">Số lượng tiểu cầu trong một thể tích máu (PLT):</label>
                                <div class="input-group mb-3">
                                    <input id="plt" name="plt" type="text" value="{{ old('plt') }}" class="form-control">
                                    <div class="input-group-append">
                                      <span class="input-group-text">(g/L)</span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blood_group">Nhóm máu</label>
                                            <select id="blood_group" name="blood_group" class="form-control">
                                                <option value="">-- chọn nhóm máu --</option>
                                                <option {{ old('blood_group') == 'O' ? 'selected' : '' }} value="O">O</option>
                                                <option {{ old('blood_group') == 'A' ? 'selected' : '' }} value="A">A</option>
                                                <option {{ old('blood_group') == 'B' ? 'selected' : '' }} value="B">B</option>
                                                <option {{ old('blood_group') == 'AB' ? 'selected' : '' }} value="AB">AB</option>
                                            </select>
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blood_type">Loại máu</label>
                                            <select id="blood_type" name="blood_type" class="form-control">
                                                <option value="">----</option>
                                                <option {{ old('blood_type') == 'Rh+' ? 'selected' : '' }} value="Rh+">Rh+</option>
                                                <option {{ old('blood_type') == 'Rh-' ? 'selected' : '' }} value="Rh-">Rh-</option>
                                            </select>
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                </div>
                                
                           </fieldset>
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
                <button type="submit" class="btn btn-primary btn-submit-form"><i class="fas fa-plus"></i> @lang('Add New')</button>
            </div>
        </form>
    </div>
    <!-- Modal select bệnh nhân -->
    <div class="modal fade" id="select_patient">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chọn bệnh nhân
                </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('patient.selectclinicalpatient') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Nhập tên hoặc mã bệnh nhân để tìm kiếm:</label>
                                        <input autocomplete="off" id="select_patient" type="text" class="form-control" name="selected_patient" list="selected_patient" placeholder="Nhập tên hoặc mã bệnh nhân">
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
       
        ],
    });
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });    

</script>
@endsection