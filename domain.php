<?php 
session_start();
$_SESSION['session'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
   Free Dynamic DNS
    </title>
    <meta name="theme-color" content="#23d5ab">
    <meta name="msapplication-navbutton-color" content="#23d5ab">
    <meta name="apple-mobile-web-app-status-bar-style" content="#23d5ab">
    <meta name="Description" content="Free Dynamic DNS !">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bungee&family=Viga&display=swap');
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
      position: relative;
  width: 100%;
  
  display: flex;
  align-items: center;
  justify-content: center;
  background: url("admin/bg.jpg")
     center;
  background-attachment: fixed;
  background-size: cover;
}
body:after {
  content: "";
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.9);
  backdrop-filter: blur(1px);
  z-index: -1;
}
        
        .app {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex; 
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;
        }
        .app .copy {
            width: 100%;
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-family: 'Viga', sans-serif;
            color: rgba(255,255,255,0.6);
            font-size: 13px;
        }
        .app .inner {
            margin-top: 5px;
            position: relative;
            width: 100%;
            display: flex; 
            align-items: center;
            justify-content: center;
        }
        .inner .input {
            position: relative;
            font-family: 'Viga', sans-serif;
            background: #232323;
            color: rgba( 255, 255, 255, 0.4 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 8px );
            -webkit-backdrop-filter: blur( 8px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            width: 400px;
            height: 40px;
            font-size: 15px;
            padding: 0 5px;
        }
        .inner .domains {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            z-index: 9999;
            background: #000;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            background: #232323;
            color: rgba( 255, 255, 255, 0.4 );
            font-family: 'Viga', sans-serif;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur( 8px );
            padding: 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .app .input:before {
            content: 'for4.us';
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            padding: 0 5px;
            z-index: 9999;
            background: #000;
        }
        .app .input:focus {
            outline: none;
            border: none;
        }
        .app .input::placeholder {
            color: rgba( 255, 255, 255, 0.4 );
        }
        .app h1 {
            font-family: 'Viga', sans-serif;
            color: rgba( 255, 255, 255, 0.4 );
            line-height: 25px;
        }
        h1 strong {
            font-family: 'Bungee', cursive;
            font-size: 2em;
        }
        .app .desc {
            font-family: 'Viga', sans-serif;
            color: rgba( 255, 255, 255, 0.4 );
        }
        .app .check {
            position: relative;
            margin-top: 20px;
            font-family: 'Viga', sans-serif;
            background: rgba( 255, 255, 255, 0.4 );
            color: rgba( 255, 255, 255, 0.4 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 8px );
            -webkit-backdrop-filter: blur( 8px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            font-size: 16px;
            padding: 5px 20px;
        }
        .app .check:focus {
            outline: none;
            border: none;
        }

        .app .alert {
            position: relative;
            margin-top: 10px;
            font-family: 'Viga', sans-serif;
            color: rgba( 255, 255, 255, 0.4 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 8px );
            -webkit-backdrop-filter: blur( 8px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            font-size: 14px;
            padding: 3px 15px 3px 25px;
            text-align: center;
            display: none;
        }
        .alert.success {
            background: rgba(124,252,0, 0.4);
        }
        .alert.error, .alert.failed, .alert.exsist, .alert.mistake {
            background: rgba( 255, 0, 0, 0.4 );
        }
        .alert.process {
            background: rgba(0,0,255, 0.4);
        }
        .alert i {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
        }
        .alert.process i {
            top: 25%;
        }

        .app label {
            width: 400px;
            text-align: left;
            font-family: 'Viga', sans-serif;
            color: rgba( 255, 255, 255, 0.7);
            margin-top: 20px;
        }

        .app .details {
            position: relative;
            margin-top: 20px;
            font-family: 'Viga', sans-serif;
            color: rgba( 255, 255, 255, 0.4 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 8px );
            -webkit-backdrop-filter: blur( 8px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            padding: 10px;
            width: 400px;
            text-align: center;
            display: none;
        }
        .details h1{
            font-size: 20px;
        }
        .details .active {
            margin-top: 10px;
            position: relative;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .active .info {
            position: relative;
            font-family: 'Viga', sans-serif;
            background: rgba( 255, 255, 255, 0.1 );
            color: rgba( 255, 255, 255, 0.4 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 8px );
            -webkit-backdrop-filter: blur( 8px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            font-size: 13px;
            padding: 5px 15px;
        }
        .details table {
            margin-top: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            border-top: 1px solid rgba(255,255,255,0.3);
        }
        .active .click {
            position: relative;
            margin-top: 10px;
            font-family: 'Viga', sans-serif;
            background: rgba( 255, 255, 255, 0.4 );
            color: rgba( 255, 255, 255, 0.4 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 8px );
            -webkit-backdrop-filter: blur( 8px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            font-size: 14px;
            padding: 5px 15px;
        }
        .active .click:focus {
            outline: none;
            border: none;
        }



        .app .btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-family: 'Viga', sans-serif;
            background: rgba( 255, 255, 255, 0.4 );
            color: rgba( 255, 255, 255, 0.4 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 8px );
            -webkit-backdrop-filter: blur( 8px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            font-size: 16px;
            padding: 5px 20px;
        }
        .app .btn:focus {
            outline: none;
            border: none;
        }
        @media(max-width:550px) {
            .app .input , .app .details, .app label{
                width: 100%;
            }
        }
        @media(min-width: 551px) {
            .inner .domains {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="app">

        <div class="btn" onclick="window.location.href='index.html';">
            HOME US
        </div>


        <h1>Sky<strong>X</strong>Dipzzy</h1>
        <p class="desc">Free Dynamic Dns For Everyone</p>
        <span class="alert error"><i class="fa fa-times-circle" aria-hidden="true"></i>Fill all forms</span>
        <span class="alert success"><i class="fa fa-check-circle" aria-hidden="true"></i>Success adding new domain</span>
        <span class="alert failed"><i class="fa fa-check-circle" aria-hidden="true"></i>Wrong Ip/Domain</span>
        <span class="alert process"><i class="fa fa-cog fa-spin" aria-hidden="true"></i>Checking domain availablelity</span>
        <span class="alert exsist"><i class="fa fa-check-circle" aria-hidden="true"></i>Domain was taken</span>
        <span class="alert mistake"><i class="fa fa-check-circle" aria-hidden="true"></i>Unexpected error, try again</span>

        <label>
            <b>Domain:</b>
        </label>
        <div class="inner">
            <input class="input" type="text" name="domain" placeholder="user domain" autocomplete="off">
            <div class="domains">.skydipzzy.live</div> CHANGE THIS !
        </div>

        <label id="query" style="display:none">
            <b>Ip Address:</b>
        </label>
        <div class="inner">
            <input class="input" type="text" name="ip" placeholder="ip server whm" style="display:none" autocomplete="off">
        </div>
            <input type="hidden" name="session" value="<?= $_SESSION['session'];?>">

        <div class="check" onclick="fun()">
            CHECK
        </div>

        <div class="details">
            <h1>DETAIL DOMAIN</h1>
            <table>
                <tr>
                    <th style="width: 50%;text-align: left;">Domain</th>
                    <th>:</th>
                    <th style="width: 50%;text-align: right;"><span id="domain"></span></th>
                </tr>
                <tr>
                    <th style="width: 50%;text-align: left;">Ip Address</th>
                    <th>:</th>
                    <th style="width: 50%;text-align: right;"><span id="ip"></span></th>
                </tr>
            </table>
            <div class="active">
                <p class="info">Thanks For Using My Tools :D</p>
            </div>
        </div>

        <span class="copy">Maded With ❤️ By Skydipzzy</span>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fun(){
                const domain = $('input[name="domain"]');
                const ip = $('input[name="ip"]');
                


                $('.failed').hide();
                $('.error').hide();
                $('.process').hide();
                $('.exsist').hide();
                $('.mistake').hide();

                if(domain.val() == '' || domain.val() == null){
                    $('.error').fadeIn();
                    $('.failed').hide();
                    return false;
                }else{
                    if(domain.val().length <= 3) {
                        $('.error').hide();
                        $('.failed').fadeIn();
                        return false;
                    }
                    $('.error').hide();
                    $('.failed').hide();
                }
                

                $('.process').fadeIn();
                //Change .skydipzzy.live with ur domain!
                $.get('docs/lookup.php?domain='+domain.val()+'.skydipzzy.live',function(r){
                    if(!r.is_exsist){
                        $('.process').hide();
                        $('#query').fadeIn();
                        $('input[name="ip"]').fadeIn();
                        $('.check').attr('onclick','change()');
                        $('.check').html('CREATE');
                    }else{
                        $('.process').hide();
                        $('.exsist').fadeIn();

                }
            })
        }

        function change(){
            const domain = $('input[name="domain"]');
            const ip = $('input[name="ip"]').val();
            const session = $('input[name="session"]').val();
            $('.mistake').hide();
            $('.process').fadeIn();
            if(ip == '' || ip == null){
                    $('.error').fadeIn();
                    $('.failed').hide();
                    $('.process').hide();
                    return false;
                }else{
                    if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ip)){
                        $('.error').hide();
                        $('.failed').hide();
                    }else{
                        $('.error').hide();
                        $('.failed').fadeIn();
                        $('.process').hide();
                        return false;
                    }
                }
            $.get('docs/add_domain.php?session='+session+'&domain='+domain.val()+'.skydipzzy.live&ip='+ip,function(r){
                console.log(r)
                    if(r.success){
                        $('.process').hide();
                        $('.success').fadeIn();
                        $('.details').fadeIn();
                        $('#ip').text($('input[name="ip"]').val());
                        $('#domain').text($('input[name="domain"]').val()+'.terbaru-2022.com');
                        $('.details').fadeIn();
                        $('.check').hide();
                    }else{
                        $('.mistake').fadeIn();
                        $('.process').hide();
                    }
            })
        }
        
    </script>
</body>
<iframe scrolling='no' allow='autoplay' src='https://g.top4top.io/m_2239erjnl0.mp3' width='0' height='0' frameborder='no'></iframe>
</html>