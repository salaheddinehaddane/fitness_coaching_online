<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from fito.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Apr 2022 10:30:01 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>S'inscrire</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
        #regForm {
        background-color: #ffffff;
        margin: 0px auto;
        font-family: Raleway;
        padding: 40px;
        border-radius: 10px
    }

    #register{

      color: #6A1B9A;
    }

    h1 {
        text-align: center
    }

    .tab input:focus{

      border:1px solid #2a9a1b !important;
      outline: none;
    }

    input.invalid {

        border:1px solid #e03a0666;
    }

    .tab {
        display: none;
        text-align: center;
    }
    .tab .inside_tab{
        width: 60%;
        margin-right: auto;
        margin-left: auto;
        text-align: start;
    }

    button {
        background-color: #2da81c;
        color: #ffffff;
        border: none;
        border-radius: 50%;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer
    }

    button:hover {
        opacity: 0.8
    }

    button:focus{

      outline: none !important;
    }

    #prevBtn {
        background-color: #bbbbbb
    }


    .all-steps{
          text-align: center;
        margin-top: 30px;
        margin-bottom: 30px;
        width: 100%;
        display: inline-flex;
        justify-content: center;
    }

    .step {
           height: 40px;
        width: 40px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        color: #5d1b9b;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1
    }


    .step.finish {
       color: #fff;
       background: #2da81c;
       opacity: 1;

    }



    .all-steps {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px
    }

    .thanks-message {
        display: none
    }

    .card-body{
        background-color: #F3F3F3;
    }

    .table .ribbon{
      width: 150px;
      height: 150px;
      position: absolute;
      top: -10px;
      left: -10px;
      overflow: hidden;
    }

    .table .ribbon::before,
    table .ribbon::after{
      position: absolute;
      content: "";
      z-index: -1;
      display: block;
      border: 7px solid #ba24f0;
      border-top-color: transparent;
      border-left-color: transparent;
    }

    /* .box{
        margin-right: 5px;
        transition:ease-in-out 0.5s;
    }
    .box:hover{
        border : solid 1px #2da81c;
        color : #2da81c;
    } */
    </style>


</head>

<body class="h-100">
    <div id="app">
        <router-view></router-view>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="{{ asset('/js/app.js') }}"></script>

</body>


</html>
