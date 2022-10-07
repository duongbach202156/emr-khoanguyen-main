<span class="cover-lay"></span>
    <span class="separate-nav"></span>
    <div class="container-fluid NavEffect">
      <div class="SearchContainer">
        <div class="TopBarContact">
          <span class="infoToggle">
            <div class="left">
              <span class="iconify" data-icon="dashicons:plus"></span>
            </div>
            <div class="right">
              <span class="iconify" data-icon="ic:round-keyboard-arrow-down"></span>
            </div>
          </span>
          <div class="contact__info justify-content-lg-end">
            <div class="contact__info--time d-flex">
              <span class="iconify" data-icon="ph:clock-thin" data-rotate="270deg"></span>
              <span class="content d-flex justify-content-center flex-column">
                <h6 class="d-block">Thứ 2 - Thứ 7 08:00-19:00</h6>
                <p class="d-block mb-0">Chủ nhật - ĐÓNG CỬA</p>
              </span>
            </div>
            <div class="contact__info--phone d-flex">
              <span class="iconify" data-icon="healthicons:phone-outline" data-rotate="270deg" data-flip="vertical"></span>
              <span class="content d-flex justify-content-center flex-column">
                <a class="d-block content--heading" href="tel:024 3974 3556">GỌI NGAY</a>
                <a class="d-block content--sub" href="mailto:info@vinmec.com">info@vinmec.com</a>
              </span>
            </div>
            <div class="contact__info--address d-flex">
              <span class="iconify" data-icon="fluent:location-28-regular" data-rotate="180deg" data-flip="vertical"></span>
              <a target="_blank" href="https://www.google.com/maps/place/Vinmec+International+Hospital/@20.9962152,105.8669144,15z/data=!4m5!3m4!1s0x0:0xef1e1e02b64fcb4c!8m2!3d20.9962152!4d105.8669144">
                  <span class="content d-flex justify-content-center flex-column">
                    <h6 class="d-block">458 Minh Khai</h6>
                    <p class="d-block mb-0">Hai Bà Trưng, Hà Nội</p>
                  </span>
              </a>
            </div>
          </div>
        </div>
        <form style="margin-right: 20px;" class="form-inline SearchFixed" action="search.html" method="GET">
          <button style="width: 70px; background-color:#22c7dd; border-color:#22c7dd" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalSearch">
            <span style="font-size: 25px;" class="iconify search-btn" data-icon="gg:search-loading"></span>
          </button>
        </form>
      </div>

      <div class="ContainerNavbar">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="/">
            <img src="/web-dentalcare/images/dentalcare-logo-color.png" alt="Logo">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <!-- <span class="navbar-toggler-icon">red</span> -->
            <span class="iconify" data-icon="bytesize:menu"></span>
          </button>

          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item{{ isset($homeActive) && $homeActive ? ' active' : '' }}">
                <a class="nav-link" href="/">Trang chủ</a>
              </li>
              <li class="nav-item dropdown{{ isset($generalInfoActive) && $generalInfoActive ? ' active' : '' }}">
                <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="about.html">Giới thiệu chung</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="./pages/about.php">
                    <span class="iconify" data-icon="dashicons:arrow-right-alt2"></span>
                    Thông tin chung
                  </a>
                  <a class="dropdown-item" href="./pages/doctorprofile.php">
                    <span class="iconify" data-icon="dashicons:arrow-right-alt2"></span>
                    Bác sĩ
                  </a>
                  <a class="dropdown-item{{ isset($appointmentActive) && $appointmentActive ? ' active' : '' }}" href="{{ route('appointmentPatient.index') }}">
                    <span class="iconify" data-icon="dashicons:arrow-right-alt2"></span>
                    Đặt hẹn
                  </a>
                  <a class="dropdown-item" href="./pages/testimonials.php">
                    <span class="iconify" data-icon="dashicons:arrow-right-alt2"></span>
                    Cảm nhận của bệnh nhân
                  </a>
                  <a class="dropdown-item" href="./pages/contact-us.php">
                    <span class="iconify" data-icon="dashicons:arrow-right-alt2"></span>
                    Liên hệ
                  </a>
                  <a class="dropdown-item" href="./pages/working-hours.php">
                    <span class="iconify" data-icon="dashicons:arrow-right-alt2"></span>
                    Giờ làm việc
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="./pages/services.php">Dịch vụ</a>
                <div class="dropdown-menu dropdown-menu-2">
                  <a class="dropdown-item" href="./pages/services.php">
                    <span class="iconify" data-icon="dashicons:arrow-right-alt2"></span>
                    Dịch vụ
                  </a>
                  <a class="dropdown-item" href="./pages/procedures.php">
                    <span class="iconify" data-icon="dashicons:arrow-right-alt2"></span>
                    Điều trị
                  </a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./pages/cost-calculator.php">Chi phí</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./pages/newsKN/">Tin tức</a>
              </li>
              {{-- <li class="nav-item">
                <div class="content--btn content--btn--right d-inline-block" href="#" data-toggle="modal" data-target="#myAppointment">
                  <span>Đặt lịch khám</span>
                </div>
              </li> --}}
            </ul>
            <div class="d-flex align-items-center">
              <a href="" data-toggle="modal" data-target="#myAppointment"><button class="btn btn-sm btn-primary custom-btn" style="padding: 0.375rem 0.75rem !important;"><i class="fas fa-calendar-alt"></i> Đặt lịch hẹn</button></a>
              <a href="{{ route('auth.login.get') }}"><button class="btn btn-sm btn-primary ml-1" style="padding: 0.375rem 0.75rem !important;">Đăng nhập</button></a>
              <form class="form-inline SearchFixed" action="search.html" method="GET">
                <button style="width: 70px; background-color:#22c7dd; border-color:#22c7dd" type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#ModalSearch">
                  <span style="font-size: 25px;" class="iconify search-btn" data-icon="gg:search-loading"></span>
                </button>
              </form>

            </div>
          </div>

        </nav>
      </div>
    </div>