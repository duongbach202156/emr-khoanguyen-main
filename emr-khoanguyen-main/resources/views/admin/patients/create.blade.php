@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">Thêm bệnh nhân mới</h1>
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
          <h3 class="card-title">Thêm bệnh nhân mới</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('patient.store') }}" method="POST" id="form-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <span class="form-message"></span>
                            <label for="title">Ông/bà</label>
                            <select id="title" name="title" class="form-control">
                              <option value="Ông">Ông</option>
                              <option value="Bà">Bà</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fullname">@lang('Full Name')<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" value="{{ old('full_name') }}" name="full_name" id="fullname" placeholder="@lang('Type full name')">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">@lang('Email Address')<span class="mandatory"> *</span></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="@lang('Type email address')">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="phone-number">Điện thoại<span class="mandatory"> *</span></label>
                            <input value="{{ old('phone_patient') }}" id="phone-number" name="phone_patient" type="text" placeholder="Số điện thoại" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>

                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="identity_number">Căn cước công dân<span class="mandatory"> *</span></label>
                            <input value="{{ old('identity_number') }}" id="identity_number" name="identity_number" type="text" placeholder="Số CCCD" class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="occupation">Nghề nghiệp</label>
                            <select id="occupation" name="occupation" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">Nghề nghiệp</option>
                                <option value="nông dân">Nông dân</option>
                                <option value="Bác sĩ">Bác sĩ</option>
                                <option value="Giáo viên">Giáo viên</option>
                                <option value="Sinh viên/học sinh">Sinh viên/học sinh</option>
                                <option value="Công an">Công an</option>
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
                              <option value="Nam">Nam</option>
                              <option value="Nữ">Nữ</option>
                              <option value="Khác">Khác</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="dob">Ngày tháng năm sinh<span class="mandatory"> *</span></label>
                            <input value="{{ old('dob') }}" id="dob" name="dob" type="date" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="nationality">Quốc tịch</label>
                            <select id="nationality" name="nationality" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Việt Nam</option>
                                <option value="Lào">Lào</option>
                                <option value="Nga">Nga</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Trung Quốc">Trung Quốc</option>
                                <option value="Hàn Quốc">Hàn Quốc</option>
                                <option value="Nhật Bản">Nhật Bản</option>
                                <option value="Khác">Khác</option>
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
                                    <option value="{{ $ethnic->ethnic_id }}">{{ $ethnic->name }}</option>
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
                            <input value="{{ old('religion') }}" id="religion" name="religion" type="text" placeholder="Tôn giáo" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="city_id">Thành phố/Tỉnh<span class="mandatory"> *</span></label>
                            <select id="city_id" name="city_id" class="form-control select2" style="width: 100%;">
                                @if (isset($provinces))
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
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
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
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
                                        <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="home_address">Số nhà, tên đường</label>
                            <input value="{{ old('home_address') }}" id="home_address" name="home_address" type="text" placeholder="Số nhà, tên đường" class="form-control">
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
                              <option value="Độc thân">Độc thân</option>
                              <option value="Có gia đình">Có gia đình</option>
                              <option value="Ly hôn">Ly hôn</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- select -->
                        <div class="form-group">
                            <label for="name_next_of_kin">Người thân</label>
                            <input value="{{ old('name_next_of_kin') }}" id="name_next_of_kin" name="name_next_of_kin" type="text" placeholder="Tên người thân" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="home_next_of_kin">Địa chỉ người thân</label>
                            <input value="{{ old('home_next_of_kin') }}" id="home_next_of_kin" name="home_next_of_kin" type="text" placeholder="Địa chỉ người thân" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="phone_next_of_kin">Điện thoại người thân</label>
                            <input value="{{ old('phone_next_of_kin') }}" id="phone_next_of_kin" name="phone_next_of_kin" type="text" placeholder="Số điện thoại" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- select -->
                        <div class="form-group">
                            <label for="type_of_object">Loại đối tượng</label>
                            <select id="type_of_object" name="type_of_object" class="form-control">
                              <option value="Không">Không</option>
                              <option value="Bảo hiểm y tế">Bảo hiểm y tế</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="health_insurance_id">Số thẻ BHYT</label>
                            <input value="{{ old('health_insurance_id') }}" id="health_insurance_id" name="health_insurance_id" type="text" placeholder="Số thẻ BHYT" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="health_insurance_date">BHYT có giá trị đến ngày</label>
                            <input id="health_insurance_date" name="health_insurance_date" type="date" class="form-control">
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
                <button type="submit" class="btn btn-primary btn-submit-form"><i class="fas fa-plus"></i> @lang('Add New')</button>
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