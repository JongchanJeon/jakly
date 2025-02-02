<?php
require "../db/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        $username = $_POST["username"];
        $birth = $_POST["birthday"];
        $insertUsername = strval($username) . strval($birth);
        // INSERT 쿼리 작성
        $sql = "SELECT * FROM user WHERE username = ?";
        
        // MySQLi 프리페어드 스테이먼트 생성
        $stmt = mysqli_prepare($conn, $sql);
    
        if ($stmt) {
            // 매개 변수를 바인딩합니다.
            mysqli_stmt_bind_param($stmt, "s", $insertUsername);
            
            // 스테이먼트를 실행합니다.
            mysqli_stmt_execute($stmt);
            
            // 결과를 얻습니다.
            $result = mysqli_stmt_get_result($stmt);
            
            // 결과 행의 수 확인
            $row_count = mysqli_num_rows($result);
    
            if ($row_count > 0) {
                echo "<script>alert('정보를 찾았습니다!'); window.location.href='../userPhoto.php?username=$insertUsername';</script>";
            } else {
                echo "<script>alert('정보를 찾을 수 없습니다!'); window.location.href='../userLogin.php';</script>";
            }
    
            // 결과 세트 닫기
            mysqli_free_result($result);
            
            // 스테이먼트 닫기
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('정보를 찾을 수 없습니다!'); window.location.href='../userLogin.php';</script>";
            exit;
        }
    } catch (Exception $e) {
        echo "<script>alert('정보를 찾을 수 없습니다!'); window.location.href='../userLogin.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('정보를 찾을 수 없습니다!'); window.location.href='../userLogin.php';</script>";
    exit;
}
?>
