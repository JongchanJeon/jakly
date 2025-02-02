<?php
// 과거의 날짜
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// 항상 변경됨
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

// HTTP/1.0
header("Pragma: no-cache");

// require './vendor/autoload.php';

// use Aws\S3\S3Client;
// use Aws\S3\Exception\S3Exception;
// // AWS S3 클라이언트 설정
// $s3Client = new S3Client([
//   'version'     => 'latest',
//   'region'      => 'ap-northeast-2', // 예: 'us-west-2'
//   'credentials' => [
//       'key'    => 'arn:aws:s3:::jakly',
//       'secret' => 'AKIAUH3IID4E62RM27Y2',
//   ],
// ]);
// $bucketName = 'jakly'; // 버킷 이름
// $keyName = 'default/default.png'; // 가져올 파일 경로 및 이름

// try {
//     // S3에서 파일 가져오기
//     $result = $s3Client->getObject([
//         'Bucket' => $bucketName,
//         'Key'    => $keyName
//     ]);

//     // 파일 내용 출력
//     echo $result['Body'];
// } catch (S3Exception $e) {
//     // 오류 발생 시 처리
//     echo "Error: " . $e->getMessage();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JAKLY</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="css/gallery.css" />
  <link rel="stylesheet" href="./css/font.css">
</head>

<body style = "background-image : url('./img/background.png');">
  <h1 class="mt-5 d-flex justify-content-center text-white ">당신의 영혼이 기록되었습니다.</h1>
  <h2 class="mt-3 d-flex justify-content-center text-white">마음이 이끄는 대로 4 가지를 선택해주세요</h2>
  <hr />
  <div class="container-fluid">
    <div class="row">
    <div class = "col"> 
    <div class ="row d-flex justify-content-center">
      <div class="col-md-6 p-5" id="targetDiv" style = "background-image : url('./img/photoframe.png');">
        <div class="photos mt-1">
          <div id="photo1" class="photo-frame">
            <img src="img/default.png" alt="이미지 1" />
          </div>
          <div id="photo2" class="photo-frame">
            <img src="img/default.png" alt="이미지 2" />
          </div>
          <div id="photo3" class="photo-frame">
            <img src="img/default.png" alt="이미지 3" />
          </div>
          <div id="photo4" class="photo-frame">
            <img src="img/default.png" alt="이미지 4" />
          </div>
        </div>
        <div class="mb-1">
          <h3 class="bone mt-1 text-white"><?php echo substr($_GET['username'], 0, -6); ?></h3>
          <h6 class="bone mt-1 text-white">W i t h J A K L Y</h6>
          <h6 class="bone mt-1 text-white">persons attempting to find a moral in this narrative will be banished</h6>
          <div class ="row">
            <h6 class="col-md-auto f-date" id = "currentDate">2023.01.23</h6>
            <img src="img/qrcode.png" alt="qrcode" class="col-md-auto px-0" style="width: 50px; height: 50px; margin-left: auto;"/>
          </div>
        </div>
      </div>
      </div>
      </div> 
      <div class="col-md-5 bg-light p-6 ">
  <div class="photos2">
    <div id="image1" class="photo-frame">
      <img src="img/1.png" alt="이미지 1" />
    </div>
    <div id="image2" class="photo-frame">
      <img src="img/2.png" alt="이미지 2" />
    </div>
    <div id="image3" class="photo-frame">
      <img src="img/3.png" alt="이미지 3" />
    </div>
    <div id="image4" class="photo-frame">
      <img src="img/4.png" alt="이미지 4" />
    </div>
    <div id="image5" class="photo-frame">
      <img src="img/5.png" alt="이미지 5" />
    </div>
    <div id="image6" class="photo-frame">
      <img src="img/6.png" alt="이미지 6" />
    </div>
    <div id="image1" class="photo-frame">
      <img src="img/7.png" alt="이미지 1" />
    </div>
    <div id="image2" class="photo-frame">
      <img src="img/8.png" alt="이미지 2" />
    </div>
    <div id="image3" class="photo-frame">
      <img src="img/9.png" alt="이미지 3" />
    </div>
    <div id="image4" class="photo-frame">
      <img src="img/10.png" alt="이미지 4" />
    </div>
    <div id="image5" class="photo-frame">
      <img src="img/11.png" alt="이미지 5" />
    </div>
    <div id="image6" class="photo-frame">
      <img src="img/12.png" alt="이미지 6" />
    </div>
    <div id="image6" class="photo-frame">
      <img src="img/12.png" alt="이미지 6" />
    </div>
    <div id="image6" class="photo-frame">
      <img src="img/12.png" alt="이미지 6" />
    </div>
    <div id="image6" class="photo-frame">
      <img src="img/12.png" alt="이미지 6" />
    </div>
    <div id="image6" class="photo-frame">
      <img src="img/12.png" alt="이미지 6" />
    </div>
    <div id="image6" class="photo-frame">
      <img src="img/12.png" alt="이미지 6" />
    </div>

    
  </div>
  <div style ="text-align : center;">
    <!-- <button type="button" class="btn btn-outline-success btn-lg mt-2" style ="margin-right : 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">테마변경</button> -->

    <button type="button" onclick="printSelectedDiv()" class="btn btn-outline-success btn-lg mt-2" style ="margin-right : 10px; background-color: #622A0F ;">영혼찾아가기</button>
  </div>
</div>

    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add your image source here -->
        <img src="img/frame1.jpg" class="img-fluid mt-2" alt="Your Image" onclick="changeBackground('./img/frame1.jpg')" style="width: 100%; height: 300px; object-fit: cover;">
        <img src="img/frame2.jpg" class="img-fluid mt-2" alt="Your Image" onclick="changeBackground('./img/frame2.jpg')" style="width: 100%; height: 300px; object-fit: cover;">
        <img src="img/frame3.jpg" class="img-fluid mt-2" alt="Your Image" onclick="changeBackground('./img/frame3.jpg')" style="width: 100%; height: 300px; object-fit: cover;">
        <img src="img/frame4.jpg" class="img-fluid mt-2" alt="Your Image" onclick="changeBackground('./img/frame4.jpg')" style="width: 100%; height: 300px; object-fit: cover;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
<script>
  const currentDate = new Date(); 
  const formattedDate = `${currentDate.getFullYear()}.${String(currentDate.getMonth() + 1).padStart(2, '0')}.${String(currentDate.getDate()).padStart(2, '0')}`;
  document.getElementById("currentDate").textContent = formattedDate;
</script>


<script>
  //image insert and delete 
  let counter = 1

    const photos1Images = document.querySelectorAll(".photos img");
    const photos2Images = document.querySelectorAll(".photos2 img");

    photos1Images.forEach((image, index) => {
      image.addEventListener("click", () => {
        // 기본 이미지로 변경
        image.src = "img/default.png";
        // 비어 있는 첫 번째 사진틀 위치 추적
        if(counter > 1) {
          counter--;
        }
      });
    });

    
    photos2Images.forEach((image, index) => {
      image.addEventListener("click", () => {
        if(counter > 4) {
          alert("출력은 최대 4장의 사진만 가능합니다!");
        } else {
          const newImageSrc = image.src;
          
          for(let i = 1; i <= 4; i++) {
        const targetPhoto = document.getElementById("photo" + i);
        if(targetPhoto && targetPhoto.querySelector("img").src.includes("default.png")) {
          targetPhoto.querySelector("img").src = newImageSrc;
          // 비어 있는 다음 사진틀 위치로 업데이트
          counter = i + 1;
          break;
        }
      }
    }
  });
});

function printSelectedDiv() {
    var printContents = document.querySelector('.col-md-6.p-5').outerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = `<div style="font-size: 10pt; width:40%; -webkit-print-color-adjust: exact;
        color-adjust: exact;
        background-color: #28a745; ">${printContents}</div>`;
    window.print();
    document.body.innerHTML = originalContents;
}


  function changeBackground(imageUrl) {
    document.getElementById('targetDiv').style.backgroundImage = "url('" + imageUrl + "')";
  }


</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-t0Zq9DE+mo4YRDtpJ3TSMzqU5LI7gOG/dRd+Ckx7ufBdyOkq1Y2qOBtaTBaYIdMz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</html>
