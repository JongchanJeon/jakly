<?php
require '../vendor/autoload.php';

use Aws\S3\S3Client;

// AWS S3 설정
$s3 = new S3Client([
    'version'     => 'latest',
    'region'      => '',
    'credentials' => [
        'key'    => '',
        'secret' => '/v',
    ],
  ]);

// S3 버킷과 파일 경로 설정
$bucket = 'jakly';

$directory = $_GET['username']. "/";
// 임시 디렉토리
$tempDir = sys_get_temp_dir();

// Zip 파일 생성
$zipFile = "$tempDir/images1.zip";
$zip = new ZipArchive();
if (!$zip->open($zipFile, ZipArchive::CREATE)) {
    exit("error");
}
// S3에서 파일을 읽어와서 Zip에 추가
$objects = $s3->getIterator('ListObjects', ['Bucket' => $bucket, 'Prefix' => $directory]);
foreach ($objects as $object) {
    $key = $object['Key'];
    $content = $s3->getObject(['Bucket' => $bucket, 'Key' => $key])['Body']->getContents();
    $zip->addFromString(basename($key), $content);
}

$zip->close();

// 다운로드 헤더 설정
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="images.zip"');
header('Content-Length: ' . filesize($zipFile));

// Zip 파일 출력
readfile($zipFile);

// 임시 디렉토리에 생성한 Zip 파일 삭제
unlink($zipFile);
?>
