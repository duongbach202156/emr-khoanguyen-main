@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-3">
                <h1 class="m-0">@lang('Edit account')</h1>
            </div>
            <div class="col-sm-9">
                <a href="{{ route('account.index') }}" class="btn btn-primary btn-sm">
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
          <h3 class="card-title">@lang('Edit account')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('account.update', $account->id) }}" method="POST" id="form-1">
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fullname">@lang('Full Name')<span class="mandatory"> *</span></label>
                            <input type="text" class="form-control" value="{{ $account->name }}" name="name" id="fullname" placeholder="@lang('Type full name')">
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">@lang('Email Address')<span class="mandatory"> *</span></label>
                            <input type="email" class="form-control" name="email" value="{{ $account->email }}" id="email" placeholder="@lang('Type email address')">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('Select role group')</label>
                            <select class="select2" name="roles[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                @foreach ($roles as $role)
                                    <option {{ in_array($role->name, $account->getRoleNames()->toArray()) == true ? 'selected' : '' }} value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
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
                <button type="submit" class="btn btn-primary btn-submit-form"><i class="fas fa-save"></i> @lang('Update')</button>
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
        ],
    });
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });

</script>
@endsection