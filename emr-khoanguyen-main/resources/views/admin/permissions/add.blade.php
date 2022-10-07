@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">@lang('Add group of permission')</h1>
            </div>
            <div class="col-sm-9">
                <a href="{{ route('permission.index') }}" class="btn btn-primary btn-sm">
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
          <h3 class="card-title">@lang('Add group of permission')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('permission.store') }}" method="POST" id="form-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fullname">@lang('Name of permission group')<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="fullname" placeholder="@lang('Type full name')">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    
                </div>
                
                <section class="content">
                    <label>@lang('Select permission')</label>
                    <div class="row">
                        <div class="col-12" id="accordion">
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            1. @lang('Manage patient administrative information') 
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- checkbox -->
                                                @foreach ($patientPermissions as $patientPermission)
                                                    <div class="custom-control custom-checkbox" style="display:inline-block; margin-left:15px">
                                                        <input class="custom-control-input" type="checkbox" name="permissions[]" id="customCheckbox{{ $patientPermission->id }}" value="{{ $patientPermission->id }}">
                                                        <label for="customCheckbox{{ $patientPermission->id }}" class="custom-control-label">{{ $patientPermission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            2. @lang('Permissions of Clinical Examination') 
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- checkbox -->
                                                @foreach ($generalExamPermissions as $generalExamPermission)
                                                    <div class="custom-control custom-checkbox" style="display:inline-block; margin-left:15px">
                                                        <input class="custom-control-input" type="checkbox" name="permissions[]" id="customCheckbox{{ $generalExamPermission->id }}" value="{{ $generalExamPermission->id }}">
                                                        <label for="customCheckbox{{ $generalExamPermission->id }}" class="custom-control-label">{{ $generalExamPermission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            3. @lang('Permission of Subclinical Examination')
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- checkbox -->
                                                @foreach ($subExamPermissions as $subExamPermission)
                                                    <div class="custom-control custom-checkbox" style="display:inline-block; margin-left:15px">
                                                        <input class="custom-control-input" type="checkbox" name="permissions[]" id="customCheckbox{{ $subExamPermission->id }}" value="{{ $subExamPermission->id }}">
                                                        <label for="customCheckbox{{ $subExamPermission->id }}" class="custom-control-label">{{ $subExamPermission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            4. @lang('Manage Medical Records')
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseFour" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- checkbox -->
                                                @foreach ($medicalRecordPermissions as $medicalRecordPermission)
                                                    <div class="custom-control custom-checkbox" style="display:inline-block; margin-left:15px">
                                                        <input class="custom-control-input" type="checkbox" name="permissions[]" id="customCheckbox{{ $medicalRecordPermission->id }}" value="{{ $medicalRecordPermission->id }}">
                                                        <label for="customCheckbox{{ $medicalRecordPermission->id }}" class="custom-control-label">{{ $medicalRecordPermission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <div class="card card-warning card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            5. @lang('Hospital Fee Payment Management')
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseFive" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- checkbox -->
                                                @foreach ($paymentPermissions as $paymentPermission)
                                                    <div class="custom-control custom-checkbox" style="display:inline-block; margin-left:15px">
                                                        <input class="custom-control-input" type="checkbox" name="permissions[]" id="customCheckbox{{ $paymentPermission->id }}" value="{{ $paymentPermission->id }}">
                                                        <label for="customCheckbox{{ $paymentPermission->id }}" class="custom-control-label">{{ $paymentPermission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <div class="card card-warning card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            6. @lang('Appointment Management')
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseSix" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- checkbox -->
                                                @foreach ($appointmentPermissions as $appointmentPermission)
                                                    <div class="custom-control custom-checkbox" style="display:inline-block; margin-left:15px">
                                                        <input class="custom-control-input" type="checkbox" name="permissions[]" id="customCheckbox{{ $appointmentPermission->id }}" value="{{ $appointmentPermission->id }}">
                                                        <label for="customCheckbox{{ $appointmentPermission->id }}" class="custom-control-label">{{ $appointmentPermission->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
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
        ],
    }
    );
</script>
@endsection