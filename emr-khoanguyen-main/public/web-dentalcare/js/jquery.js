$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/** Set min input date */
// function setMinTimeStart() {
//     let today = new Date();
//     let dd = today.getDate();
//     console.log(dd);
//     let mm = today.getMonth()+1;
//     let yyyy = today.getFullYear();
//     if(dd<10){
//       dd='0'+dd
//     } 
//     if(mm<10){
//       mm='0'+mm
//     } 
    
//     today = yyyy+'-'+mm+'-'+dd;
//     document.getElementById("formDate").setAttribute("min", today);
// }

/** End set min input date */

/**------ Load ajax time list ---------*/
var timeList = '<option value="">Thời gian</option><option value="08:00">08:00 Sáng</option><option value="08:30">08:30 Sáng</option><option value="09:00">09:00 Sáng</option><option value="09:30">09:30 Sáng</option><option value="10:00">10:00 Sáng</option><option value="10:30">10:30 Sáng</option><option value="11:00">11:00 Sáng</option><option value="13:00">13:00 Chiều</option><option value="14:00">14:00 Chiều</option><option value="15:00">15:00 Chiều</option><option value="15:30">15:30 Chiều</option><option value="16:00">16:00 Chiều</option><option value="16:30">16:30 Chiều</option><option value="17:00">17:00 Chiều</option><option value="17:30">17:30 Chiều</option><option value="18:00">18:00 Chiều</option>'

$('.form-group #formDate').on('change', function() {
    var value = $('.form-group #formDate').val();
    $.ajax({
        url: '/loadTimeList',
        type: 'GET',
        data: {
            value
        }, success: function(result) {
            if(result){
                $('.form-group #formTimes').html(timeList)
            }
        }
    })
})
/**-------- End Load ajax time list ---------*/



