<?php
// $servername = "localhost:3306"; // MySQL 서버 호스트 이름
// $username = "root"; // MySQL 사용자 이름
// $password = "root"; // MySQL 비밀번호
// $database = "jakly"; // 사용할 데이터베이스 이름


// MySQL 서버에 연결
$conn = new mysqli($servername, $username, $password, $database);

/* DB 연결 확인 */
if(!$conn){die( 'Could not connect: ' . mysqli_error($conn) ); }

?>
