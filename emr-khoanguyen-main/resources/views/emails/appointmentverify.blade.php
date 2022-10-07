<h3>Xác nhận đặt lịch khám</h3>
<h4>Xin chào <b>{{ $appointment->name }}</b></h4>
Bạn đã đặt một cuộc hẹn vào <b>{{ $appointment->time }}, {{ date('d-m-Y', strtotime($appointment->date)) }}</b>
<br>
Vui lòng bấm link bên dưới để xác nhận đặt lịch.
<br> <br>
<a href="{{ route('appointmentPatient.verified.get', $appointment->token) }}">Bấm để xác nhận lịch hẹn</a>
<br>
<i>Link có thời hạn 5 phút</i>
{{-- <form action="{{ route('appointmentPatient.verified.post', $appointment->token) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit">Xác nhận đặt lịch</button>
</form> --}}
