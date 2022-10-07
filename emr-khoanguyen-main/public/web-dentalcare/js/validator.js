$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**-------- Submit ajax appointment form  ----------*/
// $("#form-1").on('submit', function(e) {

//     e.preventDefault(); 

//     var form = $(this);
//     var actionUrl = form.attr('action');
//     console.log(form.serialize());
    
//     $.ajax({
//         type: "POST",
//         url: actionUrl,
//         data: form.serialize(),
//         success: function(data)
//         {
//           alert(data);
//         }
//     });
    
// });
// var form_submit = document.querySelector('#form-1 .form-submit').classList.add('hidden');
function Validator(options) {

    // Hàm tìm thẻ div cha chứa class 'form-group' của thẻ input
    function getParent(element, selector) {
        while (element.parentElement) {
            if(element.parentElement.matches(selector)){
                return element.parentElement;
            }
            element = element.parentElement;
        }    
    }

    // tạo biến lưu lại các mảng rule (một input có thể có nhiều rule nên cần lưu vào mảng)
    let selectorRules = {};

    // Hàm xác định lỗi
    function validate(inputElement, rule, errorElement, parentInputElement) {
        let errorMessage;
        // Lấy ra các rule của mỗi input
        let rules = selectorRules[rule.selector];
        // Lặp qua từng rule và kiểm tra
        for (let i=0; i < rules.length; i++) {

            switch (inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](formElement.querySelector(rule.selector + ":checked"));
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
                }
                
            if (errorMessage) {break};
        }
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            parentInputElement.classList.add('invalid');
        } else {
            errorElement.innerText = '';
            parentInputElement.classList.remove('invalid');
        }

        return !errorMessage;
    }

    // Lấy element của form cần validate
    let formElement = document.querySelector(options.form)
    
    if (formElement) {
        
        // Xử lý khi nhấn submit
        formElement.onsubmit = (e) => {
            e.preventDefault();

            let isFormValid = true;
            options.rules.forEach(rule => {
                let inputElement = formElement.querySelector(rule.selector);
                // Array.from(inputElements).forEach(inputElement => {
                // })
                let parentInputElement = getParent(inputElement, options.formGroupSelector)
                let errorElement = parentInputElement.querySelector(options.errorSelector);
                let isValid = validate(inputElement, rule, errorElement, parentInputElement);
                if (!isValid) {
                    isFormValid = false;
                }
            });

            if (isFormValid) {
                var btn_submit_form = document.querySelector('#form-1 .form-submit')
                var loading = document.querySelector("#form-1 .loading")
                btn_submit_form.classList.add('hidden');
                loading.classList.remove('hidden')
                formElement.submit();
                // console.log("đã submit");
            }
        }

        // Lặp qua các rule
        options.rules.forEach(rule => {

            // lưu lại các rule cho mỗi input
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            let inputElements = formElement.querySelectorAll(rule.selector);
            // Chuyển nodeList thành mảng và lặp dùng foreach
            Array.from(inputElements).forEach(inputElement => {
                let parentInputElement = getParent(inputElement, options.formGroupSelector)
                let errorElement = parentInputElement.querySelector(options.errorSelector);
                if (inputElement) {
    
                    // Xử lý khi blur khỏi input
                    inputElement.onblur = function() {
                        validate(inputElement, rule, errorElement, parentInputElement);
                    }
                    // Xử lý khi người dùng đang nhập vào input thì ẩn báo lỗi
                    inputElement.oninput = function () {
                        errorElement.innerText = '';
                        parentInputElement.classList.remove('invalid');
                    }
                }
            })
        });
    }
}


// Define rules
//1. Khi có lỗi => trả ra message lỗi
//2. Khi hơp lệ => (undefined)
Validator.isRequired = (selector, message) => {
    return {
        selector: selector,
        test: (value) => {
            return value ? undefined : message || "Please Fill out This Field!!"
        }
    } 
}
Validator.isEmail = (selector, message) => {
    return {
        selector: selector,
        test: (value) => {
            let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || "You have typed an invalid email address!"
        }
    } 
}
Validator.isPhoneNumber = (selector, message) => {
    return {
        selector: selector,
        test: (value) => {
            let regex = /[0]{1}[3,5,7-9]{1}[0-9]{1}[0-9]{2}[0-9]{2}[0-9]{3}/;
            return regex.test(value) ? undefined : message || "You have typed an invalid phone number!"
        }
    } 
}
Validator.minLength = (selector, min, message) => {
    return {
        selector: selector,
        test: (value) => {
            return value.length >= min ? undefined : message || `You have to enter at least ${min} characters!`
        }
    } 
}
Validator.maxLength = (selector, max, message) => {
    return {
        selector: selector,
        test: (value) => {
            return value.length <= max ? undefined : message || `Nhập tối đa ${max} ký tự!`
        }
    } 
}

Validator.isConfirmed = (selector, getConfirmValue, message) => {
    return {
        selector: selector,
        test: (value) => {
            return value === getConfirmValue() ? undefined : message || "Input value is incorrect"
        }
    } 
}

// Sử dụng
