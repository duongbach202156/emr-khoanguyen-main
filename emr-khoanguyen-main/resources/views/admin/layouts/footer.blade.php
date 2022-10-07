
<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.js"></script>
<!-- SweetAlert2 -->
<script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/assets/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>

<!-- Validation form submit -->
<script src="/assets/js/validation.js"></script>

<script src="/assets/admin/js/main.js"></script>

@yield('script')

  @if (Session::has('success'))
  <script>
    toastr.options = {
    "newestOnTop": false,
    "progressBar": true,
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    }
    toastr.success('{{ Session::get('success') }}')
  </script>
  @endif
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <script>
        toastr.options = {
        "closeButton": true,
        "timeOut": "0",
        "extendedTimeOut": "0",
        }
      toastr.error('{{ $error }}')
      </script>
    @endforeach
  @endif
