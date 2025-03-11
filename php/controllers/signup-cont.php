<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../../php/model/classes.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    function checkUser($username,$password) {
        $db = new DB("cabinet");
        $query = "SELECT * FROM users WHERE email=? AND password=?";
        $result = $db->query($query,[$username,$password]);
        if (count($result) ==1) {
          $id = $result[0]['id'];
          $type = $result[0]['type'];
          $_COOKIE['id'] = $id;
          $_COOKIE['type'] = $type;
          return true;
        } else {
            return false;
        }
    }
    if (!checkUser($username,$password)) {
        $db = new DB("cabinet");
        $result = $db->query("INSERT INTO `patience`( `patient_name`, `patient_email`, `patient_phone`, `patient_date_of_birth`) VALUES (?,?,?,?)", [$fullname, $username,$phone,$date]);
        $result = $db->query("INSERT INTO `users`( `type`, `email`, `password`) VALUES ('p',?,?)", [$username, $password]);
        session_start();
        $_COOKIE["user"] = $username;
        $_SESSION["fname"] = $fullname;
        $_SESSION["type"] = "p";
        echo '<script>window.location.replace("../../login");</script>';
        exit();
    } else {
        echo '<script>window.location.replace("../../signup?mes=f");</script>';
    }
}
?>