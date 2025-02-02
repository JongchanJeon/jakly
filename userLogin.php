<?php
// 현재 날짜 이후로 캐시가 만료되도록 설정
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// 항상 수정된 내용을 다운로드하도록 설정
header("Cache-Control: no-store, no-cache, must-revalidate");

// 프록시 서버에 응답을 캐시하지 않도록 설정
header("Cache-Control: post-check=0, pre-check=0", false);

// 캐시를 비활성화
header("Pragma: no-cache");
foreach ($_COOKIE as $key => $value) {
    setcookie($key, "", time() - 3600, "/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/font.css">
    <title class = "koreanFont">JAKLY WORLD</title>
    <link rel="icon" href="./img/cave.png" type="image/x-icon">
    <title>JAKLY WORLD</title>
</head>
<body style = "background-image : url('./img/background.png');" class="min-vh-100">
<div class="container min-vh-100">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <!-- 왼쪽 영역 -->
            <div class="col-md-6 col-lg-6">
                <div class= "row d-flex align-items-center justify-content-center">
                    <div class="col-12">
                        <p class="fs-1 my-4 d-flex justify-content-center text-white koreanFont">A N I M A G R A P H</p>
                        <p class="fs-1 my-4 d-flex justify-content-center text-white bone">A N I M A G R A P H</p>
                        <div class ="col-12 px-5 py-5">
                            <p class="fs-5 my-1 text-left text-white koreanFont">이 이야기에서 어떠한 동기를 찾으려는 자는 기소될 것이다.</p>
                            <p class="fs-5 my-1 text-left text-white bone">persons attempting to find a motive in this narrative will be prosecuted</p>
                            <br>
                            <p class="fs-5 my-1 text-left text-white koreanFont">이 이야기에서 어떠한 교훈을 찾으려는 자는 추방될 것이다</p>
                            <p class="fs-5 my-1 text-left text-white bone">persons attempting to find a moral in this narrative will be banished</p>
                            <br>
                            <p class="fs-5 my-1 text-left d-flex text-white koreanFont">이 이야기에서 어떠한 플롯을 찾으려는 자는 총살될 것이다.</p>
                            <p class="fs-5 my-1 text-left d-flex text-white bone">persons attempting to find a plot in this narrative will be shot</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 오른쪽 영역 -->
            <div class="col-md-6 col-lg-6 mt-md-4 mt-lg-0 ">
                <div class= "row d-flex align-items-center justify-content-center">
                <div class="col-10">
                    <p class="fs-1 my-4 d-flex justify-content-center text-white koreanFont">영혼을 기록하며...</p>
                <form class="col-12 px-4 py-4 border border-dark rounded-5 shadow " style = "background-color : white" action = "./function/userCheckName.php" method = "post" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label koreanFont">영문 이름을 입력해주세요</label>
                        <input type="text" class="form-control form-control-lg shadow koreanFont" id="username" name = "username" placeholder="ex) jongchan (영어 소문자만)" oninput="validateUsername(this)" required>
                    </div>
                    <div class="mb-4">
                        <label for="formGroupExampleInput2" class="form-label koreanFont">생일을 입력해주세요</label>
                        <input type="text" class="form-control form-control-lg shadow koreanFont" id="birthday" name = "birthday" placeholder="ex) 950328" oninput="validateBirthday(this)" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input shadow koreanFont" id="exampleCheck1" required>
                        <label class="form-check-label koreanFont" for="exampleCheck1">* 안내사항 *<br>관람 중 촬영된 이미지는 소장하실 수 있으며 , 일주일뒤에 폐기됩니다.</label>
                    </div>
                    <div class= "d-flex justify-content-end">
                        <button type="submit" class="btn btn-secondary shadow koreanFont">기록펼치기</button>
                    </div>
                </form>
            </div>
                </div>
            </div>

        </div>
  </div>
  <script>
        function validateUsername(inputField) {
            // 영어 소문자만 남기기
            const lowercaseEnglishOnly = inputField.value.replace(/[^a-z]/g, '');

            // 입력 필드에 적용
            inputField.value = lowercaseEnglishOnly;
        }
        function validateBirthday(inputField) {
            // 숫자만 남기기
            const inputValue = inputField.value.replace(/\D/g, '');

            // 6자리만 남기기
            const sixDigitValue = inputValue.slice(0, 6);

            // 입력 필드에 적용
            inputField.value = sixDigitValue;
        }
        function validateForm() {
            // 폼 전송 전에 birthday 유효성 검사
            const birthdayInput = document.getElementById('birthday');
            const birthdayValue = birthdayInput.value;

            if (birthdayValue.length === 6 && /^\d+$/.test(birthdayValue)) {
                // 6자리 숫자인 경우
                return true; // 제출을 허용
            } else {
                // 6자리 숫자가 아닌 경우
                alert('생일은 무조건 6자리 숫자여야 합니다.');
                return false; // 제출을 허용하지 않음
            }
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>