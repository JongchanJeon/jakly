<link rel="stylesheet" href="css/login.css">
<div id="container" class="container">
    <!-- FORM SECTION -->
    <div class="row">
      <!-- 순번찾기 -->
      <!-- END SIGN UP -->
      <!-- SIGN IN -->
      <div class="col align-items-center flex-col sign-in">
        <div class="form-wrapper align-items-center">
          <div class="form sign-in">
            <form action = "function/join.php" method = "POST">
                <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="text" placeholder="이름을 입력해주세요" name = "username" maxlength = "11" >
                </div>
                <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="text" placeholder="생일을 입력해주세요(950328)" name = "birthday" maxlength = "6" >
                </div>
                <button type ="submit">
                등록하기
                </button>
            </form>
          </div>
        </div>
      </div>
      <!-- END SIGN IN -->
    </div>
    <!-- END FORM SECTION -->

  </div>


<script src = "js/login.js"></script>