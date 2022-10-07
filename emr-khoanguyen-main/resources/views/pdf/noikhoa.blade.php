<!DOCTYPE html>
<html>
  <head>
    <title>Hồ sơ bệnh án</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
  </head>
  <style>

    @font-face {
      font-family: "Times New Roman" !important;
      src: url("/storage/fonts/times.ttf");
      font-style: normal;
    }
    @font-face {
      font-family: "Times New Roman" !important;
      src: url("/storage/fonts/timesbd.ttf");
      font-weight: bold;
    }
    @font-face {
      font-family: "Times New Roman" !important;
      src: url("/storage/fonts/timesi.ttf");
      font-style: italic;
    }
    @font-face {
      font-family: "Times New Roman" !important;
      src: url("/storage/fonts/timesbi.ttf");
      font-style: italic;
      font-weight: bold;
    }
    * { font-family: DejaVu Sans !important; }
    .font-bold {
      font-weight: bold;
    }
    .font-italic {
      font-style: italic;
    }
    span.uppercase {
      text-transform: uppercase;
    }
    .page_break {
      page-break-before: always;
    }
    .center {
    text-align: center !important;
    }
    table {
    border-collapse: collapse;
    }
  </style>

  <body style="font-size: 12px">
    <!-- header -->
    <div class="header">
      <table width="100%">
        <tr>
          <td width="30%">Phòng khám đa khoa EMR</td>
          <td width="40%" rowspan="3" style="text-align: center; font-size: 25px">
            <b>HỒ SƠ BỆNH ÁN</b>
          </td>
          {{-- <td width="30%">Mã HSBA: BA0000001</td> --}}
        </tr>
        <tr>
          <td width="30%">TTYT Sức Khỏe</td>
          <td width="30%" style="text-align: right;">Mã BN: {{ $patient_info->patient_id }}</td>
        </tr>

      </table>
    </div>
    <!-- Thông tin bệnh nhân -->
    <div>
      <br />
      <table width="100%">
        <tr>
          <td width="40%"><b>I. HÀNH CHÍNH</b></td>
          <td width="10%"></td>
          <td width="50%"></td>
          {{-- <td width="10%" class="center">Tuổi</td> --}}
        </tr>
        <tr>
          <td colspan="2">1. Họ và tên <i>(In hoa)</i>: <span class="uppercase">{{ $patient_info->full_name }}</span></td>
          <td>2. Sinh ngày: {{ date('d/m/Y',strtotime($patient_info->dob)) }}
          </td>
          {{-- <td class="center">[23]</td> --}}
        </tr>
        <tr>
          <td>3. Giới tính: {{ $patient_info->sex }}</td>
          <td></td>
          <td>4. Nghề nghiệp: {{ $patient_info->occupation }}</td>
          {{-- <td class="center">[00]</td> --}}
        </tr>
        <tr>
          <td>5. Dân tộc: {!! App\Helpers\Helper::getEthnicName($patient_info->ethnic_id) !!}</td>
          {{-- <td class="center">[00]</td> --}}
          <td></td>
          <td>6. Quốc tịch: {{ $patient_info->nationality }}</td>
          {{-- <td class="center">[00]</td> --}}
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td colspan="3">7. Địa chỉ : {!! App\Helpers\Helper::getPatientAddress($patient_info->city_id, $patient_info->district_id, $patient_info->ward_id, $patient_info->home_address) !!}</td>
        </tr>
        <tr>
          <td width="40%">8. Tôn giáo : {{ $patient_info->religion }}</td>
          <td width="10%"></td>
          <td width="50%">9. Đối tượng : {{ $patient_info->type_of_object }}</td>
          {{-- <td></td> --}}
        </tr>
        <tr>
          <td>10. BHYT giá trị đến: {{ $patient_info->health_insurance_date }}</td>
          <td></td>
          <td>Số thẻ BHYT: {{ $patient_info->health_insurance_id }}</td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3">
            11. Họ tên, địa chỉ người nhà khi cần báo tin: {{ $patient_info->name_next_of_kin }} - Đ/C: {{ $patient_info->home_next_of_kin }}
          </td>
        </tr>
        <tr>
          <td colspan="3">Số điện thoại người nhà: {{ $patient_info->phone_next_of_kin }}</td>
        </tr>
      </table>
    </div>
    @foreach ($hospitalhistory_times as $hospitalhistory_time)
      <div style="margin-top: 0.5em; font-size: 16px;"><b>Lần khám thứ {{$hospitalhistory_time->time}}</b></div>
      @php
          $history = App\Helpers\Helper::getHistoryWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
          $vital = App\Helpers\Helper::getVitalWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
          $general = App\Helpers\Helper::getGeneralWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
          $sub_clinical_services = App\Helpers\Helper::getSubClinicWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
          $diagnosis = App\Helpers\Helper::getDiagnosisWithTime(Session::get('patient_id'), $hospitalhistory_time->time);
          $blood_results =  App\Helpers\Helper::getBloodResult(Session::get('patient_id'), $hospitalhistory_time->time);
          $lab_results =  App\Helpers\Helper::getLabResult(Session::get('patient_id'), $hospitalhistory_time->time);
          $imaging_results =  App\Helpers\Helper::getImagingResult(Session::get('patient_id'), $hospitalhistory_time->time);
      @endphp

    <!-- Quản lý người bệnh -->
    <div>
      <b> II. QUẢN LÝ NGƯỜI BỆNH </b>
      <br />
      <table width="100%" style="border: 1px solid black">
        <tr>
          <td style="border-right: 1px solid black" width="50%">12. Vào viện: {{ date('d/m/Y H:i',strtotime($history->date_attented)) }}</td>
          <td>14. Nơi giới thiệu: {{ $history->refer_dept }}</td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black; border-bottom: 1px solid black">13. Trực tiếp vào: {{ $history->admit_dept }}</td>
          <td style="border-bottom: 1px solid black"></td>
        </tr>

        <tr>
          <td width="50%" style="border-right: 1px solid black;">15. Vào Khoa: {{ $history->admit_dept }}</td>
          <td>
            17. Chuyển viện: 
            <br />
            - Chuyển đến: 
          </td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;">16. Chuyển khoa lần 1: </td>
          <td>18. Ra viện:</td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chuyển khoa lần 2: </td>
          <td>19. Tổng số ngày điều trị: </td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chuyển khoa lần 3: </td>
          <td></td>
        </tr>
      </table>
    </div>

    <!-- Chẩn đoán -->
    <div>
      <table width="100%" style="border-bottom: 1px solid black">
        <tr>
          <td width="40%"><b> III. CHẨN ĐOÁN </b></td>
          <td width="10%" class="center"></td>
          <td width="40%" style="border-bottom: 1px solid black;"></td>
          <td width="10%" class="center">MÃ</td>
        </tr>
        <tr>
          <td style="border-top: 1px solid black; border-left: 1px solid black;">
            20. Nơi chuyển đến: <br />
            
          </td>
          <td style="border-top: 1px solid black; border-right: 1px solid black;" class="center"><br /></td>
          <td style="border-top: 1px solid black !important; " rowspan="2" style="vertical-align: text-top">
            23. Ra viện: <br />
            + Bệnh chính: {!! App\Helpers\Helper::getIcd10Name($diagnosis->icd10_main_code) !!}
          </td>
          <td style="border-right: 1px solid black; border-top: 1px solid black;" rowspan="2" class="center"><br />[{{$diagnosis->icd10_main_code}}]</td>
        </tr>
        <tr>
          <td style="border-left: 1px solid black;">
            21. KKB, cấp cứu: <br />
            {{ $general->diagnosis_syndrome }}
          </td>
          <td style="border-right: 1px solid black;" class="center"><br /></td>
        </tr>
        <tr>
          <td style="border-left: 1px solid black;">
            22. Khi vào khoa điều trị: <br />
            {{ $history->reason }}
          </td>
          <td style="border-right: 1px solid black;" class="center"><br /></td>
          <td >+ Bệnh kèm theo: {!! App\Helpers\Helper::getIcd10Name($diagnosis->icd10_sub_code) !!}<br /></td>
          <td style="border-right: 1px solid black;" class="center"><br />[{{$diagnosis->icd10_sub_code}}]</td>
        </tr>
        <tr style="border-right: 1px solid black; border-left: 1px solid black;">
          <td style="border-right: 1px solid black;" colspan="2"></td>
          <td style="border-left: 1px solid black !important; border-right: 1px solid black;" style="border-right: 1px solid black;" colspan="2"></td>
        </tr>
      </table>
    </div>

    <!-- Tình trạng ra viện -->
    <div>
      <b> IV. TÌNH TRẠNG RA VIỆN </b>
      <table width="100%" style="border: 1px solid black">
        <tr>
          <td style="border-right: 1px solid black; !important;" width="30%" style="vertical-align: text-top">
            24. Kết quả điều trị: <br />
            {{ $diagnosis->disease_prognosis }} <br> {{ $diagnosis->disease_plan }}
          </td>
          <td style="border-left: 1px solid black; !important;">
            26. Tình hình tử vong:
             {{-- {{ \Carbon\Carbon::parse($summary->death_time)->format('H \g\i\ờ m \p\h, \n\g\à\y d \t\h\á\n\g m \n\ă\m Y') }} --}}
            <br />
            <br />
          </td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;"></td>
          <td>
            27. Nguyên nhân chính tử vong: <br />
            
          </td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;">
            25. Giải phẫu bệnh <i>(khi có sinh thiết)</i>: <br />
            
          </td>
          <td>28. Khám nghiệm tử thi: </td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;"></td>
          <td>29. Chẩn đoán giải phẫu tử thi: </td>
        </tr>
      </table>
    </div>
    
    <!-- ký tên -->
    <table width="100%" style="text-align: center">
      <tr>
        <td width="50%"></td>
        <td><i>Ngày ....... tháng ........ năm.......</i></td>
      </tr>
      <tr>
        <td>
          <b>Giám đốc bệnh viện</b>
        </td>
        <td>
          <b>Trưởng Khoa</b>
        </td>
      </tr>
      <tr>
        <td>
          <br />
        </td>
      </tr>
      <tr>
        <td>
          <br />
        </td>
      </tr>
      <tr>
        <td>Họ và tên :</td>
        <td>Họ và tên :</td>
      </tr>
    </table>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

    <!--A-Bệnh án-->
    <div width="100%" class="page_break">
      <b>A-BỆNH ÁN</b>
      <table width="100%">
        <!--I.Lý do vào viện-->
        <tr>
          <td width="60%"><b>I. Lý do vào viện:</b> {{ $history->reason }}</td>
          <td>Vào ngày thứ {{ $history->reason_date != null ? $history->reason_date : '...'}} của bệnh</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>II. Hỏi bệnh</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>1. Quá trình bệnh lý:</b>
            <i>(khởi phát, diễn biến, chẩn đoán, điều trị của tuyến dưới v.v...).</i>
          </td>
        </tr>
        <tr>
          <td colspan="2">{!! nl2br(e($history->symptoms)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>2. Tiền sử bệnh:</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            + Bản thân: <i>(phát triển thể lực từ nhỏ đến lớn, những bệnh đã mắc, phương pháp ĐTr, tiêm phòng, ăn uống, sinh hoạt vv...)</i>
          </td>
        </tr>
        <tr>
          <td colspan="2">{!! nl2br(e($history->disease_self)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Đặc điểm liên quan bệnh:</td>
        </tr>
        <tr>
          <td colspan="2">
            <table width="100%"  style="text-align: center; border:1px solid black;">
              <tr >
                <td style="border-bottom:1px solid black; border-right:1px solid black;" width="5%"><b>TT</b></td>
                <td style="border:1px solid black;" width="10%"></td>
                <td style="border:1px solid black;" width="10%">Ký hiệu</td>
                <td style="border:1px solid black;" width="20%">
                  Thời gian <br />
                  (tính theo tháng)
                </td>
                <td style="border:1px solid black;" width="5%"><b>TT</b></td>
                <td style="border:1px solid black;" width="10%"></td>
                <td style="border:1px solid black;" width="10%">Ký hiệu</td>
                <td style="border:1px solid black;" width="20%">
                  Thời gian <br />
                  (tính theo tháng)
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black;" style="border:1px solid black;">01</td>
                <td style="border:1px solid black;">Dị ứng</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_relateto_diung == '1' ? 'X' : '' }}</td>
                <td style="border:1px solid black;"><i></i>{{ $history->disease_relateto_diung_time}}</td>
                <td style="border:1px solid black;">04</td>
                <td style="border:1px solid black;">Thuốc lá</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_thuocla == '1' ? 'X' : '' }}</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_thuocla_time}}</td>
              </tr>
              <tr>
                <td style="border-bottom:1px solid black; border-right:1px solid black;">02</td>
                <td style="border:1px solid black;">Ma túy</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_matuy == '1' ? 'X' : '' }}</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_matuy_time}}</td>
                <td style="border:1px solid black;">05</td>
                <td style="border:1px solid black;">Khác</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_khac == '1' ? 'X' : '' }}</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_khac_time }}</td>
              </tr>
              <tr>
                <td style="border-bottom:1px solid black; border-right:1px solid black;">03</td>
                <td style="border:1px solid black;">Rượu bia</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_ruoubia == '1' ? 'X' : '' }}</td>
                <td style="border:1px solid black;">{{ $history->disease_relateto_ruoubia_time }}</td>
                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;"></td>
                <td style="border:1px solid black;"></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="2">+ Gia đình: <i>(Những người trong gia đình: bệnh đã mắc, đời sống, tinh thần, vật chất v.v...).</i></td>
        </tr>
        <tr>
          <td colspan="2">{!! nl2br(e($history->disease_family)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>III. Khám bệnh</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>1. Toàn thân: </b> <i>: (ý thức, da niêm mạc, hệ thống hạch, tuyến giáp, vị trí, kích thước, số lượng, di động v.v...)</i>
          </td>
        </tr>
        <tr>
          <td width="70%">{!! nl2br(e($vital->note)) !!}</td>
          <td>
            <table width="100%" style="border:1px solid black;">
              <tr>
                <td>Mạch</td>
                <td>{{ $vital->blood_pressure }}</td>
                <td style="text-align: right">lần/phút</td>
              </tr>
              <tr>
                <td>Nhiệt độ</td>
                <td>{{ $vital->temperature }}</td>
                <td style="text-align: right">°C</td>
              </tr>
              <tr>
                <td>Huyết áp</td>
                <td>{{ $vital->systolic }} / {{ $vital->diastolic }}</td>
                <td style="text-align: right">mmHg</td>
              </tr>
              <tr>
                <td>Nhịp thở</td>
                <td>{{ $vital->respiration }}</td>
                <td style="text-align: right">lần/phút</td>
              </tr>
              <tr>
                <td>Cân nặng</td>
                <td>{{ $vital->weight }}</td>
                <td style="text-align: right">kg</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>2. Các cơ quan</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">+ Tuần hoàn: {!! nl2br(e($general->diagnosis_tuanhoan)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Hô hấp: {!! nl2br(e($general->diagnosis_hohap)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Tiêu hóa: {!! nl2br(e($general->diagnosis_tieuhoa)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Thận- Tiết niệu- Sinh dục: {!! nl2br(e($general->diagnosis_than_tietnieu_sinhduc)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Thần Kinh: {!! nl2br(e($general->diagnosis_thankinh)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Cơ- Xương- Khớp: {!! nl2br(e($general->diagnosis_coxuongkhop)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Tai- Mũi- Họng: {!! nl2br(e($general->diagnosis_taimuihong)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Mắt: {!! nl2br(e($general->diagnosis_mat)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Nội tiết, dinh dưỡng và các bệnh lý khác: {!! nl2br(e($general->diagnosis_noitiet_dinhduong_khac)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>3. Các xét nghiệm cận lâm sàng cần làm:</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            @if ($sub_clinical_services)
              @foreach ($sub_clinical_services as $sub_clinical_service)
                  {{ $sub_clinical_service->name . ', ' }}
              @endforeach
            @endif

          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>4. Tóm tắt bệnh án: </b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            Người bệnh {{ $patient_info->full_name }} <br />
            Nhập viện vì lý do {{ $general->reason != null ? $general->reason : '...'}}, vào ngày thứ {{ $general->reason_date != null ? $general->reason_date : '...'}} của bệnh <br />
            Qua thăm hỏi và khám bệnh phát hiện các triệu chứng và hội chứng sau: <br />
            + Triệu chứng: {!! nl2br(e($history->symptoms)) !!}<br />
            + Hội chứng: {!! nl2br(e($general->diagnosis_syndrome)) !!}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>IV. Chẩn đoán khi vào khoa điều trị</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">+ Bệnh chính: <br /> {!! App\Helpers\Helper::getIcd10Name($diagnosis->icd10_main_code) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Bệnh kèm theo: <i>(nếu có)</i>: <br /> {!! App\Helpers\Helper::getIcd10Name($diagnosis->icd10_sub_code) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Phân biệt: không</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>V. Tiên lượng:</b> <br />
            {!! nl2br(e($diagnosis->disease_prognosis)) !!}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>VI. Hướng điều trị:</b> <br />
            {!! nl2br(e($diagnosis->disease_plan)) !!}
          </td>
        </tr>
        <tr>
          <td width="50%"></td>
          <td>
            <table width="100%" style="text-align: center">
              <tr>
                <td colspan="2"><i>Ngày......tháng......năm</i></td>
              </tr>
              <tr>
                <td colspan="2"><b>Bác sỹ làm bệnh án</b></td>
              </tr>
              <tr>
                <td colspan="2"><br /><br /><br /><br /><br /></td>
              </tr>
              <tr>
                <td colspan="2"><i>Họ và tên</i> <b> Bác sỹ </b></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr width="100%">
          <td colspan="2">
            <table width="100%" class="page_break">
              <tr width="100%">
                <td colspan="2">
                  <b>B. TỔNG KẾT BỆNH ÁN </b>
                </td>
              </tr>
              <tr width="100%">
                <td colspan="4">
                  <b>1. Quá trình bệnh lý và diễn biến lâm sàng: </b> <br />
                  {!! nl2br(e('Triệu chứng: ' . ($history->symptoms != null ? $history->symptoms : '... '). '. Số ngày biểu hiện: ' . ($history->reason_date != null ? $history->reason_date : '... '))) !!} {!! nl2br(e('.Hội chứng lâm sàng: '.($general->diagnosis_syndrome != null ? $general->diagnosis_syndrome : '... .'))) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>2. Tóm tắt kết quả xét nghiệm cận lâm sàng có giá trị chẩn đoán:</b> <br />
                  @foreach ($lab_results as $lab_result)
                      {{ $lab_result->name }} {!! nl2br(e(': ' . $lab_result->comment)) !!} <br>
                  @endforeach
                  
                  @foreach ($imaging_results as $imaging_result)
                      {{ $imaging_result->name }} {!! nl2br(e(': ' . $imaging_result->comment)) !!} <br>
                  @endforeach
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>3. Phương pháp điều trị: </b> <br />
                  {!! nl2br(e($diagnosis->disease_plan)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>4. Tình trạng người bệnh ra viện:</b> <br />
                  + Bệnh chính: {!! App\Helpers\Helper::getIcd10Name($diagnosis->icd10_main_code) !!} <br>
                  + Bệnh kèm theo: {!! App\Helpers\Helper::getIcd10Name($diagnosis->icd10_sub_code) !!} <br>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>5. Hướng điều trị và các chế độ tiếp theo:</b> <br />
                  {!! nl2br(e($diagnosis->disease_plan)) !!}
                </td>
              </tr>
              <tr style="border-top:1px solid black; border-left:1px solid black; text-align: center;">
                <td style="border:1px solid black !important; text-align: center;" colspan="2" style=""><b>Hồ sơ, phim ảnh</b></td>
                <td style="border:1px solid black; text-align: center;" class="center" width="30%" rowspan="4" >
                  <b> Người giao hồ sơ</b> <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  Họ tên
                </td>
                <td style="border:1px solid black; text-align: center;" width="30%" rowspan="8" >
                  Ngày.....tháng.....năm..... <br />
                  <b>Bác sỹ điều trị</b>
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />Họ tên <br /> <b>{{ $history->creator->name }}</b>
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black; text-align: center">
                  <b>Loại</b>
                </td>
                <td style="border:1px solid black; text-align: center">
                  <b>Số tờ</b>
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- X-quang</td>
                <td style="border:1px solid black;" class="center">{!! App\Helpers\Helper::countImages('imaging_result', Session::get('patient_id'), $hospitalhistory_time->time, 'X quang') !!}</td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- CT Scanner / MRI</td>
                <td style="border:1px solid black;" class="center">{!! App\Helpers\Helper::countImages('imaging_result', Session::get('patient_id'), $hospitalhistory_time->time, 'Cộng hưởng từ') !!}</td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- Siêu âm</td>
                <td style="border:1px solid black;" class="center">{!! App\Helpers\Helper::countImages('imaging_result', Session::get('patient_id'), $hospitalhistory_time->time, 'Siêu âm') !!}</td>
                <td style="border:1px solid black; text-align: center;" width="30%" rowspan="4">
                  <b> Người nhận hồ sơ</b> <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  Họ tên
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- Xét nghiệm</td>
                <td style="border:1px solid black;" class="center">{!! App\Helpers\Helper::countImages('lab_result', Session::get('patient_id'), $hospitalhistory_time->time, 'Xét nghiệm máu') !!}</td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- Khác (nội soi, ............)</td>
                <td style="border:1px solid black;" class="center">{!! App\Helpers\Helper::countImages('imaging_result', Session::get('patient_id'), $hospitalhistory_time->time, 'Nội soi') !!}</td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- Toàn bộ hồ sơ</td>
                <td style="border:1px solid black;" class="center">{{ count($lab_results) + count($imaging_results) }}</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
    @endforeach

  </body>
</html>
