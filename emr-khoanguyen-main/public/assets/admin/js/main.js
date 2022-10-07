$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// function countdown time
function startTimer(duration, display) {
    var timer = duration;
    setInterval(function () {
        seconds = parseInt(timer % 60, 10);

        display.textContent = seconds;

        if (--timer < 0) {
            timer = 0;
        }
    }, 1000);
}

function removeRow(id, url, page, urlLoadAjax)
{
    $.ajax({
        type: 'DELETE',
        datatype: 'JSON',
        data: {id},
        url: url,
        success: function(result) {
            if(result.error == false) {
                toastr.success('Xóa thành công')
                $('#rowId_' + id).remove();
                $('.loadAjax').load(urlLoadAjax + page + ' .loadAjax');
                // display = document.querySelector('#time');
                // startTimer(2, display);
                // setTimeout(function(){
                //     window.location.reload()
                // }, 3000)
            } else {
                toastr.error('Xóa thất bại.')
            }
        },
    })
}

var base_url = window.location.origin;
$('#city_id').on('change', function(){
    let city_id = $('#city_id').val();
    
    let ward = '<option value="">Chọn Phường / Xã</option>';
    $.ajax({
        type: 'GET',
        data: {
            city_id,
        },
        url: base_url + '/emr/patient/loadDistrict',
        success: function(result) {
            console.log(result)
            $('#district_id').html(result)
            $('#ward_id').html(ward)
        }
    })
})

$('#district_id').on('change', function(){
    let district_id = $('#district_id').val()
    if(district_id){
        $.ajax({
            type: 'GET',
            data: {district_id},
            url: base_url + '/emr/patient/loadWard',
            success: function(result) {
                $('#ward_id').html(result)
            }
        })
    }
})

$('.search_khoa_nguyen').on('keyup', function(){
    let full_name = $('.search_khoa_nguyen').val()
    console.log(full_name);
    $.ajax({
        type: 'GET',
        data: {full_name},
        url: base_url + '/emr/patient/loadPatientName',
        success: function(result) {
            $('.result_search_khoa_nguyen').html(result)
        }
    })
})
// console.log($('.select_search'));
// $(".select_search").on('change', function(){
//     alert(this.value)
//   });
$('.select_search').on('change', function(){
    let full_name = $('.select_search').val()
    console.log(full_name);
    // $.ajax({
    //     type: 'GET',
    //     data: {full_name},
    //     url: base_url + '/emr/patient/loadPatientName',
    //     success: function(result) {
    //         $('.result_search_khoa_nguyen').html(result)
    //     }
    // })
})
$('#search_khoa_nguyen').on('keyup', function(){
    let full_name =$('#search_khoa_nguyen').val()
    // console.log(full_name);
    $.ajax({
        type: 'GET',
        data: {full_name},
        url: base_url + '/emr/patient/loadPatientName',
        success: function(result) {
            $('#fullname_patient').html(result)
        }
    })
})

$('#select_patient').on('keyup', function(){
    let full_name =$('#select_patient').val()
    // console.log(full_name);
    $.ajax({
        type: 'GET',
        data: {full_name},
        url: base_url + '/emr/patient/loadPatientName',
        success: function(result) {
            $('#selected_patient').html(result)
        }
    })
})

$('#url_image').on('change', function(){
    let url_image = $(this).val()
    if (url_image != '') {
        $('#link_show_image').attr('href', url_image)
        $('#show_image').attr('src', url_image)
        $('#box_show_image').css('display', 'block')
    } else {
        $('#box_show_image').css('display', 'none')
    }

    // $.ajax({
    //     type: 'GET',
    //     data: {url_image},
    //     url: base_url + '/emr/loadimage',
    //     success: function(result) {
    //         $('#show_image').attr('src', result)
    //     }
    // })
})