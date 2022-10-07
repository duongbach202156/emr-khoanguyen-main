@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-4">
                <h1 class="m-0">Nhập quá trình khám bệnh</h1>
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
          <h3 class="card-title">Nhập quá trình khám bệnh</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('hospital-history.store') }}" method="POST" id="form-1">
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_attented">Thời gian đến<span class="mandatory"> *</span></label>
                            <input value="{{ old('date_attented') }}" id="date_attented" name="date_attented" type="datetime-local" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_admitted">Thời gian tiếp nhận<span class="mandatory"> *</span></label>
                            <input value="{{ old('date_admitted') }}" id="date_admitted" name="date_admitted" type="datetime-local" class="form-control">
                            <span class="form-message"></span>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="admit_dept">Khoa tiếp nhận<span class="mandatory"> *</span></label>
                            <select id="admit_dept" name="admit_dept" class="form-control">
                                <option value="">-- Khoa tiếp nhận --</option>
                                <option {{ old('admit_dept') == 'Cấp cứu' ? 'selected' : '' }} value="Cấp cứu">Cấp cứu</option>
                                <option {{ old('admit_dept') == 'KKB' ? 'selected' : '' }} value="KKB">KKB</option>
                                <option {{ old('admit_dept') == 'Khoa điều trị' ? 'selected' : '' }} value="Khoa điều trị">Khoa điều trị</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="refer_dept">Nơi giới thiệu</label>
                            <select id="refer_dept" name="refer_dept" class="form-control">
                              <option value="">-- Nơi giới thiệu --</option>
                              <option {{ old('admit_dept') == 'Cơ quan y tế' ? 'selected' : '' }} value="Cơ quan y tế">Cơ quan y tế</option>
                              <option {{ old('admit_dept') == 'Tự đến' ? 'selected' : '' }} value="Tự đến">Tự đến</option>
                              <option {{ old('admit_dept') == 'Khác' ? 'selected' : '' }} value="Khác">Khác</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="symptoms">Triệu chứng</label>
                            <input type="text" class="form-control" value="{{ old('symptoms') }}" name="symptoms" id="symptoms" placeholder="triệu chứng">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reason">Lý do<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" value="{{ old('reason') }}" name="reason" id="reason" placeholder="Lý do">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="reason_date">Số ngày biểu hiện</label>
                            <input type="text" class="form-control" value="{{ old('reason_date') }}" name="reason_date" id="reason_date" placeholder="">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    
                    <!-- /.col -->
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disease_self">Tiền sử bệnh của bản thân</label>
                            <textarea name="disease_self" id="disease_self" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('disease_self') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disease_family">Tiền sử bệnh của gia đình</label>
                            <textarea name="disease_family" id="disease_family" cols="100%" rows="5" placeholder="Nội dung" class="form-control">{{ old('disease_family') }}</textarea>
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
                                        <input {{ old('disease_relateto_relateto_diung') == '1' ? 'checked' : '' }} type="checkbox" id="disease_relateto_relateto_diung" name="disease_relateto_relateto_diung" value="1">
                                        <label for="disease_relateto_relateto_diung">Dị ứng</label><br>
                                    </td>
                                    <td>
                                        <input value="{{ old('disease_relateto_diung_time') }}" name="disease_relateto_diung_time" type="text">
                                    </td>
                                    <td>04</td>
                                    <td>
                                        <input {{ old('disease_relateto_thuocla') == '1' ? 'checked' : '' }} type="checkbox" id="disease_relateto_thuocla" name="disease_relateto_thuocla" value="1">
                                        <label for="disease_relateto_thuocla">Thuốc lá, thuốc lào</label><br>
                                    </td>
                                    <td>
                                        <input value="{{ old('disease_relateto_thuocla_time') }}" name="disease_relateto_thuocla_time" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>
                                        <input {{ old('disease_relateto_matuy') == '1' ? 'checked' : '' }} type="checkbox" id="disease_relateto_matuy" name="disease_relateto_matuy" value="1">
                                        <label for="disease_relateto_matuy">Ma túy</label><br>
                                    </td>
                                    <td>
                                        <input value="{{ old('disease_relateto_matuy_time') }}" name="disease_relateto_matuy_time" type="text">
                                    </td>
                                    <td>05</td>
                                    <td>
                                        <input {{ old('disease_relateto_khac') == '1' ? 'checked' : '' }} type="checkbox" id="disease_relateto_khac" name="disease_relateto_khac" value="1">
                                        <label for="disease_relateto_khac">Khác</label>
                                    </td>
                                    <td>
                                        <input value="{{ old('disease_relateto_khac_time') }}" name="disease_relateto_khac_time" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>
                                        <input {{ old('disease_relateto_ruoubia') == '1' ? 'checked' : '' }} type="checkbox" id="disease_relateto_ruoubia" name="disease_relateto_ruoubia" value="1">
                                        <label for="disease_relateto_ruoubia">Rượu bia</label>
                                    </td>
                                    <td>
                                        <input value="{{ old('disease_relateto_ruoubia_time') }}" name="disease_relateto_ruoubia_time" type="text">
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