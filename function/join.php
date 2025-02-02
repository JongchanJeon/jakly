<?php
require "../db/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = $_POST["username"];
        $birth = $_POST["birthday"];
        $insertUsername = strval($username) . strval($birth);
        $myList = array(
            "Be on the lookout for coming events; They cast their shadows beforehand.",
            "Whatever your goal is in life, embrace it, visualize it, and it will be yours.",
            "You learn from your mistakes... You will learn a lot today.",
            "A short stranger will soon enter your life with blessings to share.",
            "The love of your life is stepping into your planet this summer.",
            "Our deeds determine us, as much as we determine our deeds.",
            "A fanatic is one who can't change his mind, and won't change the subject.",
            "Your ability for accomplishment will follow with success.",
            "LIFE CONSISTS NOT IN HOLDING GOOD CARDS, BUT IN PLAYING THOSE YOU HOLD WELL.",
            "It's amazing how much good you can do if you don't care who gets the credit.",
            "He who laughs at himself never runs out of things to laugh at.",
            "You will be called in to fulfill a position of high honor and responsibility.",
            "A chance meeting opens new doors to success and friendship.",
            "Because of your melodic nature, the moonlight never misses an appointment.",
            "Hidden in a valley beside an open stream- This will be the type of place where you will find your dream.",
            "You already know the answer to the questions lingering inside your head.",
            "Nothing astonishes men so much as common sense and plain dealing.",
            "A conclusion is simply the place where you got tired of thinking."
        );

        $randomKey = array_rand($myList);
        $randomValue = $myList[$randomKey];
        // INSERT 쿼리 작성
        $sql = "INSERT INTO user (username, content) VALUES (?, ?)";
    
        // MySQLi 프리페어드 스테이먼트 생성
        $stmt = mysqli_prepare($conn, $sql);
    
        if ($stmt) {
            // 바인딩 매개변수 설정
            mysqli_stmt_bind_param($stmt, 'ss', $insertUsername, $randomValue);
    
            // 쿼리 실행
            if (!mysqli_stmt_execute($stmt)) {
                echo "<script>alert('등록을 실패 하였습니다!'); window.location.href='../join.php';</script>";
                exit;
            } 
    
            // 스테이먼트 닫기
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('등록을 실패 하였습니다!'); window.location.href='../join.php';</script>";
            exit;
        }
        echo "<script>alert('등록이 완료되었습니다!'); window.location.href='../join.php';</script>";
        
    }catch (Exception $e) {
        echo "<script>alert('등록을 실패 하였습니다!'); window.location.href='../join.php';</script>";
        exit;
    }
}   
?>