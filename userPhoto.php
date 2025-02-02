<?php
require "./db/db.php";
$sql = "SELECT * FROM user WHERE username = ?";
        
// MySQLi 프리페어드 스테이먼트 생성
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // 매개 변수를 바인딩합니다.
    mysqli_stmt_bind_param($stmt, "s", $_GET['username']);
    
    // 스테이먼트를 실행합니다.
    mysqli_stmt_execute($stmt);
    
    // 결과를 얻습니다.
    $result = mysqli_stmt_get_result($stmt);
    

    // 스테이먼트를 닫습니다.
    mysqli_stmt_close($stmt);
}
// 과거의 날짜
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// 항상 변경됨
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

// HTTP/1.0
header("Pragma: no-cache");
require './vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
// AWS S3 클라이언트 설정
$s3Client = new S3Client([
  'version'     => 'latest',
  'region'      => '', // 예: 'us-west-2'
  'credentials' => [
      'key'    => '',
      'secret' => '',
  ],
]);
$bucketName = ''; // 버킷 이름
// $keyName = 'sfasfasfa/sfasfasfa_0_1_photo.jpg'; // 가져올 파일 경로 및 이름
$prefix = $_GET['username'] . "/";
try {
    // 폴더 안의 객체 목록 가져오기
    $objects = $s3Client->listObjects([
        'Bucket' => $bucketName,
        'Prefix' => $prefix,
    ]);

    
    // // 사진 가져오기
    // $photoUrl = $s3Client->getObjectUrl($bucketName, $keyName);
    // echo "Photo URL: $photoUrl\n";
} catch (S3Exception $e) {
    // 오류 발생 시 처리
    echo "Error: " . $e->getMessage() . "\n";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAKLY WORLD</title>
</head>
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link rel="icon" href="./img/cave.png" type="image/x-icon">
  <title>JAKLY WORLD</title>
  <body class="min-vh-100 min-vw-100 d-flex justify-content-center align-items-center" style = "background-image : url('./img/background.png');">
    

<div class="container">
  <h3 class="text-center mb-4 text-white">JAKLY WORLD에 오신 것을 환영합니다.</h3>
  <div class="d-flex justify-content-center">
<h5 class="text-center mb-4 text-white">뼈문자의 뜻은 -> 
<?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['content'];
    }
?>
</h5>
</div>
  <?php
    // 가져온 객체 목록에서 파일 경로 출력
    $count = 0;
    $carouselItems = ''; // 케러셀 아이템을 저장할 변수 초기화

    if ($objects && is_array($objects['Contents'])) {
        foreach ($objects['Contents'] as $object) {
            $key = $object['Key'];
                $imageUrl = "";

                // 각 이미지에 대한 케러셀 아이템 동적 생성
                $activeClass = $count === 0 ? 'active' : ''; // 첫 번째 아이템은 active 클래스 추가
                if(substr($key, -3) == "mp4"){
                    $carouselItems .= "
                <div class='carousel-item $activeClass'>
                    <video class='d-block w-100' controls>
                        <source src='$imageUrl' type='video/mp4'>
                    </video>
                </div>
            ";
                }else {
                    $carouselItems .= "
                        <div class='carousel-item $activeClass'>
                            <img src='$imageUrl' class='d-block w-100' alt='...'>
                        </div>
                    ";
                }

                $count++;
            
        }
    }
?>

<div id="carouselExampleAutoplaying" class="carousel slide w-50 mx-auto" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php echo $carouselItems; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

  <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-secondary shadow koreanFont mt-5" onclick="downloadZip()">모든 사진 저장하기</button>
    
  </div>
  <div class="w-100  d-flex justify-content-center">
  <div id="spinner" class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</div>


</body>
<script>
  hideSpinner()
  function downloadZip() {
      alert("다운로드를 시작합니다(1분 이내)")
        showSpinner()
      // AJAX 요청을 통해 서버에서 압축 파일을 생성하고 다운로드
      const xhr = new XMLHttpRequest();
      <?php
      $zip = './function/createZip.php?username='. $_GET['username'];
      
      ?>
      xhr.open('GET', '<?php echo $zip;?>', true);
      xhr.responseType = 'blob';

      xhr.onload = function () {
          if (xhr.status === 200) {
            hideSpinner()
              // Blob 데이터를 다운로드할 수 있는 링크 생성
              const link = document.createElement('a');
              link.href = window.URL.createObjectURL(xhr.response);
              link.download = 'images.zip';
              link.click();
              
          }
      };

      xhr.send();
  }
  function showSpinner() {
    // 스피너 표시
    document.getElementById('spinner').style.display = 'block';
}

function hideSpinner() {
    // 스피너 감추기
    document.getElementById('spinner').style.display = 'none';
}
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>
