
<link rel="stylesheet" href="css/login.css">
<div id="container" class="container maxheight">
    <!-- FORM SECTION -->
    <div class="row">

      <div class="col align-items-center flex-col sign-up">
      </div>

      <!-- SIGN IN -->
      <div class="col align-items-center flex-col sign-in">
        <div class="form-wrapper align-items-center">
          <div class="form sign-in">
            <form action = "function/checkName.php" method ="POST">
                <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="text" placeholder="이름을 입력해주세요" name = "username" maxlength = "11" >
                </div>
                <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="text" placeholder="생일을 입력해주세요(950328)" name = "birthday" maxlength = "6" >
                </div>
                <button>
                접속하기
                </button>
            </form>
            <p>
              <span>
                서비스에 문제가 있다면 오른쪽 아래의 버튼을 눌러주세요!
              </span>
            </p>
          </div>
        </div>
        <div class="form-wrapper">
    
        </div>
      </div>
      <!-- END SIGN IN -->
    </div>
    <!-- END FORM SECTION -->
    <!-- CONTENT SECTION -->
    <div class="row content-row">
      <!-- SIGN IN CONTENT -->
      <div class="col align-items-center flex-col">
        <div class="text sign-in">
          <h2>
            Welcome </br> Jakly World
          </h2>
  
        </div>
        <div class="img sign-in">
    
        </div>
      </div>
      <!-- END SIGN IN CONTENT -->
      <!-- SIGN UP CONTENT -->
      <div class="col align-items-center flex-col">
        <div class="img sign-up">
        
        </div>
        <div class="text sign-up">
          <h2>
            Jakly </br> 문의하기
          </h2>
  
        </div>
      </div>
      <!-- END SIGN UP CONTENT -->
    </div>
    <!-- END CONTENT SECTION -->
  </div>
  <script>
  (function(){var w=window;if(w.ChannelIO){return w.console.error("ChannelIO script included twice.");}var ch=function(){ch.c(arguments);};ch.q=[];ch.c=function(args){ch.q.push(args);};w.ChannelIO=ch;function l(){if(w.ChannelIOInitialized){return;}w.ChannelIOInitialized=true;var s=document.createElement("script");s.type="text/javascript";s.async=true;s.src="https://cdn.channel.io/plugin/ch-plugin-web.js";var x=document.getElementsByTagName("script")[0];if(x.parentNode){x.parentNode.insertBefore(s,x);}}if(document.readyState==="complete"){l();}else{w.addEventListener("DOMContentLoaded",l);w.addEventListener("load",l);}})();

  ChannelIO('boot', {
    "pluginKey": ""
  });
</script>

<script src = "js/login.js"></script>
