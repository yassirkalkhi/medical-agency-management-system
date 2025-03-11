<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../../php/model/classes.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    function checkUser($username, $password) {
        $db = new DB("cabinet");
        $query = "SELECT * FROM users WHERE email=? AND password=?";
        $result = $db->query($query, [$username, $password]);     
        if (count($result) == 1) {
            return $result[0]; 
        } else {
            return false;
        }
    }
    $user = checkUser($username, $password);
    if ($user) {
        $id = $user['id'];
        $type = $user['type'];
        
        if ($type == "p") {
            $db = new DB("cabinet");
            $query = "SELECT * FROM patience WHERE patient_email = ?";
            $result = $db->query($query, [$username]);
            if (count($result) == 1) {
                $userid = $result[0]['patient_id'];
                setcookie("id", $userid, time() + 3600, "/"); 
                setcookie("type", "p", time() + 3600, "/"); 
                header("Location: ../../index");
                exit();
            }
        } elseif ($type == "d") {
            $db = new DB("cabinet");
            $query = "SELECT * FROM doctors WHERE doctor_email = ?";
            $result = $db->query($query, [$username]);
            if (count($result) == 1) {
                $userid = $result[0]['doctor_id'];
                setcookie("id", $userid, time() + 3600, "/"); 
                setcookie("type", "d", time() + 3600, "/"); 
                header("Location: ../../index");
                exit();
            }
        } elseif ($type == "a") {
            $db = new DB("cabinet");
            $query = "SELECT * FROM admin WHERE email = ?";
            $result = $db->query($query, [$username]);
            if (count($result) == 1) {
                $userid = $result[0]['id'];
                setcookie("id", $userid, time() + 3600, "/"); 
                setcookie("type", "a", time() + 3600, "/"); 
                header("Location: ../../index");
                exit();
            }
        } else {
            echo '<script>window.location.replace("../../login?mes=f");</script>';
        }
    } else {
        echo '<script>window.location.replace("../../login?mes=f");</script>';
    }
}
?>
