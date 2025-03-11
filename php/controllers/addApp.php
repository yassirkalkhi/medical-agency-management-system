<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {

    $patient_id = $_COOKIE['id'];
    $doctor_id = $_POST['doctorID'];
    $type = $_POST['type'];
    $status = "pending";
    $date = $_POST['appointmentDate'];
    $time_range = $_POST['appointmentTime'];
    list($start_time, $end_time) = explode(' - ', $time_range);
    $start_time = date('H:i:s', strtotime($start_time)); 
    $end_time = date('H:i:s', strtotime($end_time));

    $sql_check = "SELECT * FROM schedule WHERE schedule_date = ? AND start_time = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->execute([$date, $start_time]);
    $existing_appointment = $stmt_check->fetch(PDO::FETCH_ASSOC);

    if ($existing_appointment) {
        header("Location: ../../makeAppointment?message=already_exist");
        exit();
    }
function generateNum(){
  do{
    $servername = "localhost";
    $username = "root";
    $password = "";
     $dbname = "cabinet";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $random_number = mt_rand(100000000, 999999999);
    $sql_check_id = "SELECT COUNT(*) as count FROM schedule WHERE schedule_num = :appointment_id";
    $stmt_check_id = $conn->prepare($sql_check_id);
    $stmt_check_id->bindParam(':appointment_id', $random_number);
    $stmt_check_id->execute();
    $result = $stmt_check_id->fetch(PDO::FETCH_ASSOC);

  } while($result['count'] != 0);
    return $random_number;
}
    $unique_id = generateNum();
    $sql = "INSERT INTO `schedule`(`schedule_num`, `patient_id`, `doctor_id`, `schedule_date`, `schedule_type`, `schedule_status`, `start_time`, `end_time`) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$unique_id, $patient_id, $doctor_id, $date, $type, $status, $start_time, $end_time]);

    $conn = null;

    header("Location: ../../appSuccess?code=$unique_id");
}catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
