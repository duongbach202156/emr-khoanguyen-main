<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dental Care</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="/web-dentalcare/images/dentalcare-favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/web-dentalcare/css/main.css">
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <style>
      .loading-ring {
          display: flex;
          justify-content: center;
      }
      .lds-dual-ring {
          display: inline-block;
          width: 80px;
          height: 80px;
        }
        .lds-dual-ring:after {
          content: " ";
          display: block;
          width: 64px;
          height: 64px;
          margin: 8px;
          border-radius: 50%;
          border: 6px solid #1dbfaf;
          border-color: #1dbfaf transparent #1dbfaf transparent;
          animation: lds-dual-ring 1.2s linear infinite;
        }
        @keyframes lds-dual-ring {
          0% {
              transform: rotate(0deg);
          }
          100% {
              transform: rotate(360deg);
          }
        }
        .custom-btn {
          background: linear-gradient(105deg,
            /* Base gradient stops */
            #1ddde8, #5b51e5,
            /* Repeat your base gradient stops */
            #1ddde8, #5b51e5,
            /* Repeat your first gradient stop */
            #1ddde8);
          
          background-size: 200% 200%;
          -webkit-animation: rainbow 5s linear infinite;
          animation: rainbow 5s linear infinite;
          /* -webkit-animation: shake 5s linear 2s infinite; */
        }
        @keyframes rainbow {
          0% { background-position: 100% 100% }
          100% { background-position: 0% 0% }
        }
    </style>
</head>