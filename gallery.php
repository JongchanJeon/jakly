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
  'region'      => '', 
  'credentials' => [
      'key'    => '',
      'secret' => '',
  ],
]);
$bucketName = 'jakly'; // 버킷 이름

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
    <link rel="icon" href="./img/cave.png" type="image/x-icon">
    <title>JAKLY WORLD</title>
</head>
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="./css/font.css">
<body style = "background-image : url('./img/background.png');">
    <h2 class="text-center mt-4 text-white koreanFont">당신의 영혼이 기록되었습니다.</h2>
    <h3 class="text-center my-3 text-white koreanFont">마음이 이끄는 대로 4 가지를 선택해주세요</h3>
<div class="d-flex justify-content-center align-items-center" >


<div class="container">
  <div class = "row d-flex justify-content-center">
    <div class = "qwer d-flex justify-content-center">
    <div class= "col-6" id = "printTarget" style = "background-image : url('./img/photoframe.png'); height:18cm; width:12cm;">

        <div class ="row mt-4 mx-3">
            <div class = "col-6 d-flex justify-content-center">
                <img src="img/default.png" id="photo1" alt="이미지 1" onclick = "removePhoto(this)" style="width:5.0cm; height:4.25cm;"/>
            </div>
            <div class = "col-6 d-flex justify-content-center">
                <img src="img/default.png" id="photo2" alt="이미지 2" onclick = "removePhoto(this)" style="width:5.0cm; height:4.25cm;"/>
            </div>
        </div>
        <div class ="row mt-4 mx-3">
            <div class = "col-6 d-flex justify-content-center">
                <img src="img/default.png" id="photo3" alt="이미지 3" onclick = "removePhoto(this)" style="width:5.0cm; height:4.25cm;"/>
            </div>
            <div class = "col-6 d-flex justify-content-center">
                <img src="img/default.png" id="photo4" alt="이미지 4" onclick = "removePhoto(this)" style="width:5.0cm; height:4.25cm;"/>
            </div>
        </div>

        <div class ="row mt-3">
            <h1 class="col bone text-white d-flex justify-content-center"><?php echo substr($_GET['username'], 0, -6); ?></h1>
        </div>
        <div class ="row">
            <h5 class="col text-white koreanFont d-flex justify-content-center">W i t h J A K L Y</h5>
        </div>
        <div class ="row mx-4">
            
            <h3 class="col bone mt-1 text-white">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['content'];
                }
            ?>
            </h3>
        </div>
        <div class ="row">
            <?php
                $date = date("Y.m.d");
            ?>
            <h4 class="col text-white koreanFont mx-4 d-flex justify-content-center align-items-center"><?= $date?></h4>
            <span class="col d-flex justify-content-center">
                <img src="img/qrcode.png" alt="qrcode" style="width: 1.5cm; height: 1.5cm;"/>
            </span>
        </div>
    </div>
    </div>
  </div>
    <div class= "row d-flex justify-content-center">
        <div class= "col-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-secondary shadow koreanFont mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">사진 정하기</button>
        </div>
        <div class ="col-3 d-flex justify-content-center">
            <button type="button" class="btn btn-secondary shadow koreanFont mt-4" onclick="printSelectedDiv()">출력하기</button>
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
        <?php
    // 가져온 객체 목록에서 파일 경로 출력
    $count = 0;
    echo '<div class="row">';
    if ($objects && is_array($objects['Contents'])) {
    foreach ($objects['Contents'] as $object) {
        $key = $object['Key'];
        if (substr($key, -3) == "jpg") {
            $imageUrl = "https://jakly.s3.ap-northeast-2.amazonaws.com/$key"; // S3 버킷 URL을 사용하여 이미지 URL 생성
?>

    <div class="col">
        <img src="<?= $imageUrl ?>" class="img-fluid mt-2" alt="Your Image" onclick="changeBackground('<?= $imageUrl?>')" style="width:5.5cm; height:4.25cm;">
    </div>

<?php
            $count++;
            if ($count % 2 == 0) {
                echo '</div><div class="row">';
            }
        }
    }
    echo '</div>';
    }else {

        echo "저장된 사진이 없습니다.";
    }
?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end Modal -->
</body>
<script>
    let counter = 1
    function printSelectedDiv() {
        var printContents = document.querySelector('.qwer.d-flex.justify-content-center').outerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = `<div style=" -webkit-print-color-adjust: exact;
            color-adjust: exact;
            ">${printContents}</div>`;
        window.print();
        document.body.innerHTML = originalContents;
    }
    function removePhoto(photo) {
        photo.src = "img/default.png";
        counter--;
    }
    function changeBackground(clickedImage) {
        if(counter <= 4) {
            for(let i = 1; i <= 4; i++) {

                let target = document.getElementById('photo' + i);
                if(target.src.includes('default.png')){
                    document.getElementById('photo' + i).src = clickedImage;
                    counter++;
                    break
                }
            }
        } else {
            alert("출력은 최대 4장의 사진만 가능합니다!");
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>
