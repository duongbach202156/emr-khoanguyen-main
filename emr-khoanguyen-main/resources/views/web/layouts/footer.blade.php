<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script src="/web-dentalcare/js/main.js"></script>
<script src="/web-dentalcare/js/validator.js"></script>
<script src="/web-dentalcare/js/jquery.js"></script>
<script>
  Validator({
  form: "#form-1",
  formGroupSelector: ".form-group",
  errorSelector: ".form-message",
  rules: [
    Validator.isRequired("#fullname", "Vui lòng nhập đầy đủ tên!"),
    Validator.isRequired("#email", "Vui lòng nhập trường này!"),
    Validator.isEmail("#email", "Địa chỉ email không hợp lệ"),
    Validator.isRequired("#phone-number", "Vui lòng nhập trường này!"),
    Validator.isPhoneNumber("#phone-number", "Số điện thoại không hợp lệ"),
    Validator.isRequired("#formDate", "Vui lòng nhập trường này!"),
    Validator.isRequired("#formTimes", "Vui lòng nhập trường này!"),
    Validator.isRequired("#formAddress", "Vui lòng nhập địa chỉ"),
    Validator.isRequired("#gender", "Chọn giới tính!"),
    Validator.isRequired("input[name='services[]']", "Vui lòng chọn dịch vụ!"),
  ],

});
  // Set min input date
  let today = new Date();
  let dd = today.getDate();
  let mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
  let yyyy = today.getFullYear();
  if(dd<10){
    dd='0'+dd
  } 
  if(mm<10){
    mm='0'+mm
  } 
  today = yyyy+'-'+mm+'-'+dd;
  document.getElementById("formDate").setAttribute("min", today);
  // End set min input date
</script>