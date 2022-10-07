<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('emr.dashboard') }}" class="brand-link">
      {{-- <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <img src="https://www.emrights.com/wp-content/uploads/2021/07/cropped-favicon_EMR.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EMR - KN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
          <img src="https://media.istockphoto.com/photos/happy-healthcare-practitioner-picture-id138205019?k=20&m=138205019&s=612x612&w=0&h=KpsSMVsplkOqTnAJmOye4y6DcciVYIBe5dYDgYXLVW4=" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          {{-- Quản lý hành chính --}}
          @hasanyrole('Super Admin|Nurse|Doctor')
            <li class="nav-item menu-open">
              <a href="#" class="nav-link{{ $menuActive == 'patientMenu' ? ' active' : '' }}">
                <i class="nav-icon fas fa-hospital-user"></i>
                {{-- <i class="nav-icon far fa-hospital-user"></i> --}}
                <p>
                  Quản lý hành chính
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('patient.index') }}" class="nav-link{{ $childMenuActive == 'childPatientMenu' ? ' active' : '' }}">
                    {{-- <i class="far fa-circle nav-icon"></i> --}}
                    <i class="nav-icon fas fa-user-injured"></i>
                    <p>Danh sách bệnh nhân</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('hospital-history.create') }}" class="nav-link{{ $childMenuActive == 'childHospitalHistoryMenu' ? ' active' : '' }}">
                    <i class="nav-icon fas fa-history"></i>
                    <p>Quá trình khám bệnh</p>
                  </a>
                </li>
              </ul>
            </li>
          @endhasanyrole

          <!-- Khám bệnh và điều trị -->
          @hasanyrole('Super Admin|Doctor|Technicians')
            <li class="nav-item menu-open">
              <a href="#" class="nav-link{{ $menuActive == 'treatmentMenu' ? ' active' : '' }}">
                <i class="nav-icon fas fa-procedures"></i>
                {{-- <i class="nav-icon fas fa-user-circle"></i> --}}
                <p>
                  Khám bệnh và điều trị
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              @hasanyrole('Super Admin|Doctor')
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('vital.create') }}" class="nav-link{{ $childMenuActive == 'childVitalMenu' ? ' active' : '' }}">
                      <i class="nav-icon fas fa-heartbeat"></i>
                      <p>Nhập sinh hiệu</p>
                    </a>
                  </li>
                </ul>
              
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('generalclinical.create') }}" class="nav-link{{ $childMenuActive == 'childClinicalMenu' ? ' active' : '' }}">
                      <i class="nav-icon fas fa-stethoscope"></i>
                      <p>Khám lâm sàng tổng quát</p>
                    </a>
                  </li>
                </ul>
              @endhasanyrole
              @hasanyrole('Super Admin|Technicians')
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('labresult.create') }}" class="nav-link{{ $childMenuActive == 'childLabResultMenu' ? ' active' : '' }}">
                    <i class="nav-icon fas fa-vial"></i>
                    <p>Nhập kết quả xét nghiệm</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('imagingresult.create') }}" class="nav-link{{ $childMenuActive == 'childImagingMenu' ? ' active' : '' }}">
                    <i class="nav-icon fas fa-photo-video"></i>
                    <p>Nhập kết quả CĐHA</p>
                  </a>
                </li>
              </ul>
              @endhasanyrole
              @hasanyrole('Super Admin|Doctor')
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('diagnosis.create') }}" class="nav-link{{ $childMenuActive == 'childDiagnosisMenu' ? ' active' : '' }}">
                      <i class="nav-icon fas fa-diagnoses"></i>
                      <p>Chẩn đoán</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('summaryemr.index') }}" class="nav-link{{ $childMenuActive == 'childSummaryEmrMenu' ? ' active' : '' }}">
                      <i class="nav-icon fas fa-book"></i>
                      <p>Tổng kết bệnh án</p>
                    </a>
                  </li>
                </ul>
              @endhasanyrole
            </li>
          @endhasanyrole

          {{-- Quản lý Account --}}
          @hasanyrole('Super Admin|Admin')
            <li class="nav-item menu-open">
              <a href="#" class="nav-link{{ $menuActive == 'accountMenu' ? ' active' : '' }}">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                {{-- <i class="nav-icon fas fa-bars"></i> --}}
                <i class="nav-icon fas fa-user-circle"></i>
                <p>
                  @lang('Account Management')
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('account.index') }}" class="nav-link{{ $childMenuActive == 'childAccountMenu' ? ' active' : '' }}">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>@lang('Account List')</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('permission.index') }}" class="nav-link{{ $childMenuActive == 'childPermissionMenu' ? ' active' : '' }}">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>@lang('List of permission group')</p>
                  </a>
                </li>

              </ul>
            </li>
          @endhasanyrole

          {{-- Quản lý Lịch Hẹn --}}
          @hasanyrole('Super Admin|Doctor|Nurse|Receptionist')
            <li class="nav-item menu-open">
              <a href="#" class="nav-link{{ $menuActive == 'appointmentMenu' ? ' active' : '' }}">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  @lang('Appointment Management')
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @hasanyrole('Super Admin|Doctor')
                <li class="nav-item">
                  <a href="{{ route('appointment.showPatientAccepted') }}" class="nav-link{{ $childMenuActive == 'childNewAppointmentMenu' ? ' active' : '' }}">
                    <i class="nav-icon fas fa-calendar-check"></i>
                    <p>@lang('New Appointment')</p>
                  </a>
                </li>
                @endhasanyrole
                @hasanyrole('Super Admin|Nurse|Receptionist')
                  <li class="nav-item">
                    <a href="{{ route('appointment.showPatientPending') }}" class="nav-link{{ $childMenuActive == 'childPendingAppointmentMenu' ? ' active' : '' }}">
                      <i class="nav-icon fas fa-exchange-alt"></i>
                      <p>@lang('Pending Appointment')</p>
                    </a>
                  </li>
                @endhasanyrole
              </ul>
            </li>
          @endhasanyrole

          {{-- Đăng xuất --}}
          <li class="nav-item menu-open mb-5">
            <form action="{{ route('auth.logout.post') }}" method="post">
              @csrf
              <button type="submit" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  @lang('Log out')
                </p>
              </button>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>