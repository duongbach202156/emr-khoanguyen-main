@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">Sửa bệnh nhân</h1>
            </div>
            <div class="col-sm-9">
                <a href="{{ route('patient.index') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-arrow-left"></i> @lang('Back')
                </a>
            </div>
            </div><!-- /.row -->

            @include('admin.layouts.alert')
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Sửa bệnh nhân</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('patient.update', $patient->id) }}" method="POST" id="form-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <span class="form-message"></span>
                            <label for="title">Ông/bà</label>
                            <select id="title" name="title" class="form-control">
                              <option {{ $patient->title == 'Ông' ? 'selected' : '' }} value="Ông">Ông</option>
                              <option {{ $patient->title == 'Bà' ? 'selected' : '' }} value="Bà">Bà</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fullname">@lang('Full Name')<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" value="{{ $patient->full_name }}" name="full_name" id="fullname" placeholder="@lang('Type full name')">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">@lang('Email Address')<span class="mandatory"> *</span></label>
                            <input type="email" class="form-control" name="email" value="{{ $patient->email }}" id="email" placeholder="@lang('Type email address')">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="phone-number">Điện thoại<span class="mandatory"> *</span></label>
                            <input value="{{ $patient->phone_patient }}" id="phone-number" name="phone_patient" type="text" placeholder="Số điện thoại" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>

                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="identity_number">Căn cước công dân<span class="mandatory"> *</span></label>
                            <input value="{{ $patient->identity_number }}" id="identity_number" name="identity_number" type="text" placeholder="Số CCCD" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="occupation">Nghề nghiệp</label>
                            <select id="occupation" name="occupation" class="form-control select2" style="width: 100%;">
                                <option {{ $patient->occupation == '' ? 'selected' : '' }} value="">Nghề nghiệp</option>
                                <option {{ $patient->occupation == 'Nông dân' ? 'selected' : '' }} value="Nông dân">Nông dân</option>
                                <option {{ $patient->occupation == 'Bác sĩ'  ? 'selected' : '' }} value="Bác sĩ">Bác sĩ</option>
                                <option {{ $patient->occupation == 'Giáo viên'  ? 'selected' : '' }} value="Giáo viên">Giáo viên</option>
                                <option {{ $patient->occupation == 'Sinh viên/học sinh'  ? 'selected' : '' }} value="Sinh viên/học sinh">Sinh viên/học sinh</option>
                                <option {{ $patient->occupation == 'Công an'  ? 'selected' : '' }} value="Công an">Công an</option>
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-1">
                        <!-- select -->
                        <div class="form-group">
                            <label for="sex">Giới tính</label>
                            <select id="sex" name="sex" class="form-control">
                              <option {{ $patient->sex == 'Nam' ? 'selected' : '' }} value="Nam">Nam</option>
                              <option {{ $patient->sex == 'Nữ' ? 'selected' : '' }} value="Nữ">Nữ</option>
                              <option {{ $patient->sex == 'Khác' ? 'selected' : '' }} value="Khác">Khác</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="dob">Ngày tháng năm sinh<span class="mandatory"> *</span></label>
                            <input value="{{  $patient->dob }}" id="dob" name="dob" type="date" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="nationality">Quốc tịch</label>
                            <select id="nationality" name="nationality" class="form-control select2" style="width: 100%;">
                                <option {{ $patient->nationality == 'Việt Nam' ? 'selected' : '' }} value="Việt Nam">Việt Nam</option>
                                <option {{ $patient->nationality == 'Lào' ? 'selected' : '' }} value="Lào">Lào</option>
                                <option {{ $patient->nationality == 'Nga' ? 'selected' : '' }} value="Nga">Nga</option>
                                <option {{ $patient->nationality == 'Cuba' ? 'selected' : '' }} value="Cuba">Cuba</option>
                                <option {{ $patient->nationality == 'Singapore' ? 'selected' : '' }} value="Singapore">Singapore</option>
                                <option {{ $patient->nationality == 'Trung Quốc' ? 'selected' : '' }} value="Trung Quốc">Trung Quốc</option>
                                <option {{ $patient->nationality == 'Hàn Quốc' ? 'selected' : '' }} value="Hàn Quốc">Hàn Quốc</option>
                                <option {{ $patient->nationality == 'Nhật Bản' ? 'selected' : '' }} value="Nhật Bản">Nhật Bản</option>
                                <option {{ $patient->nationality == 'Khác' ? 'selected' : '' }} value="Khác">Khác</option>
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ethnic_id">Dân tộc</label>
                            <select id="ethnic_id" name="ethnic_id" class="form-control select2" style="width: 100%;">
                                <option value=""></option>
                                @foreach ($ethnics as $ethnic)
                                    <option {{ $patient->ethnic_id == $ethnic->ethnic_id ? 'selected' : '' }} value="{{ $ethnic->ethnic_id }}">{{ $ethnic->name }}</option>
                                @endforeach
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="religion">Tôn giáo</label>
                            <input value="{{ $patient->religion }}" id="religion" name="religion" type="text" placeholder="Tôn giáo" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="city_id">Thành phố/Tỉnh<span class="mandatory"> *</span></label>
                            <select id="city_id" name="city_id" class="form-control select2" style="width: 100%;">
                                @if (isset($provinces))
                                    @foreach ($provinces as $province)
                                        <option {{ $patient->city_id == $province->id ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                @else
                                    <option value="" selected>Chọn Thành phố / Tỉnh</option> 
                                @endif
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="district_id">Quận/Huyện<span class="mandatory"> *</span></label>
                            <select id="district_id" name="district_id" class="form-control select2" style="width: 100%;">
                                <option value="" selected>Chọn Quận / Huyện</option>
                                @if (isset($districts))
                                    @foreach ($districts as $district)
                                        <option {{ $patient->district_id == $district->id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ward_id">Phường/Xã<span class="mandatory"> *</span></label>
                            <select id="ward_id" name="ward_id" class="form-control select2" style="width: 100%;">
                                <option value="" selected>Chọn Phường / Xã</option>
                                @if (isset($wards))
                                    @foreach ($wards as $ward)
                                        <option {{ $patient->ward_id == $ward->id ? 'selected' : '' }} value="{{ $ward->id }}">{{ $ward->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="home_address">Số nhà, tên đường</label>
                            <input value="{{ $patient->home_address }}" id="home_address" name="home_address" type="text" placeholder="Số nhà, tên đường" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <!-- select -->
                        <div class="form-group">
                            <label for="marital_status">Tình trạng hôn nhân</label>
                            <select id="marital_status" name="marital_status" class="form-control">
                              <option {{ $patient->marital_status == 'Độc thân' ? 'selected' : '' }} value="Độc thân">Độc thân</option>
                              <option {{ $patient->marital_status == 'Có gia đình' ? 'selected' : '' }} value="Có gia đình">Có gia đình</option>
                              <option {{ $patient->marital_status == 'Ly hôn' ? 'selected' : '' }} value="Ly hôn">Ly hôn</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- select -->
                        <div class="form-group">
                            <label for="name_next_of_kin">Người thân</label>
                            <input value="{{ $patient->name_next_of_kin }}" id="name_next_of_kin" name="name_next_of_kin" type="text" placeholder="Tên người thân" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="home_next_of_kin">Địa chỉ người thân</label>
                            <input value="{{ $patient->home_next_of_kin }}" id="home_next_of_kin" name="home_next_of_kin" type="text" placeholder="Địa chỉ người thân" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="phone_next_of_kin">Điện thoại người thân</label>
                            <input value="{{ $patient->phone_next_of_kin }}" id="phone_next_of_kin" name="phone_next_of_kin" type="text" placeholder="Số điện thoại" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- select -->
                        <div class="form-group">
                            <label for="type_of_object">Loại đối tượng</label>
                            <select id="type_of_object" name="type_of_object" class="form-control">
                              <option {{ ($patient->type_of_object == 'Không') ? 'selected' : '' }} value="Không">Không</option>
                              <option {{ $patient->type_of_object == 'Bảo hiểm y tế' ? 'selected' : '' }} value="Bảo hiểm y tế">Bảo hiểm y tế</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="health_insurance_id">Số thẻ BHYT</label>
                            <input value="{{ $patient->health_insurance_id }}" id="health_insurance_id" name="health_insurance_id" type="text" placeholder="Số thẻ BHYT" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="health_insurance_date">BHYT có giá trị đến ngày</label>
                            <input value="{{ $patient->health_insurance_date }}" id="health_insurance_date" name="health_insurance_date" type="date" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
                
            </div>
          <!-- /.card-body -->
            @csrf
            <div class="card-footer">
                {{-- loading submit --}}
                <div class="loading loading-ring hidden">
                    <div class="lds-dual-ring">Đang xử lý</div>
                </div>
                {{-- end loading submit --}}
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
            Validator.isRequired("#fullname", "@lang('Please fill out your full name')"),
            Validator.isRequired("#email", "@lang('Please fill out this field')"),
            Validator.isEmail("#email"),
            Validator.isRequired("#phone-number", "Vui lòng nhập trường này!"),
            Validator.maxLength("#phone-number",10, "Số điện thoại tối đa 10 số!"),
            Validator.isRequired("#identity_number", "@lang('Please fill out this field')"),
            Validator.isRequired("#dob", "@lang('Please fill out this field')"),
            Validator.isRequired("#city_id", "@lang('Please fill out this field')"),
            Validator.isRequired("#district_id", "@lang('Please fill out this field')"),
            Validator.isRequired("#ward_id", "@lang('Please fill out this field')"),
            Validator.isPhoneNumber("#phone-number", "Số điện thoại không hợp lệ"),
        ],
    });
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });    
</script>
@endsection