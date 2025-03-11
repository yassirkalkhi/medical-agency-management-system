<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Schedule</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class='bg-light'>
<header style="height: 70px;" class="">
    <nav class="navbar bg-dark" style="height:100%;">
        <div class="container-fluid">
            <a style="color: #29A38F; font-size:1.8rem; font-weight: 700; font-family: Arial, Helvetica, sans-serif;">MediSafe</a>
            <div class="d-flex gap-4 pe-2">
                <a class="nav-link" href="#"><i class="fa-solid fa-envelope" style="font-size: 1.6rem;color: #29A38F"></i></a>
                <a class="nav-link" href="#"><i class="fa-brands fa-facebook" style="font-size: 1.6rem; color: #29A38F;"></i></a>
                <a class="nav-link" href="#"><i class="fa-brands fa-linkedin" style="font-size: 1.6rem;color: #29A38F"></i></a>
            </div>
        </div>
    </nav>
</header>
<div class="container-fluid mt-5">
    <h2>Modify Schedule</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="patient">Patient:</label>
            <select  name="patient" required class="form-control shadow-none border-success" >
                            <?php
                                      $servername = "localhost";
                                      $username = "root";
                                      $password = "";
                                      $dbname = "cabinet";
                                      try {
                                               $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                  $sql = "SELECT * FROM patience";
                                                  $stmt = $pdo->prepare($sql);
                                                  $stmt->execute();
                                                 if ($stmt->rowCount() > 0) { 
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                          echo '<option value="' . $row['patient_id'] . '">' . $row['patient_name'].'</option>';
                                                              }
                                                            } else {
                                                      echo "No doctors found";
                                                                       }
                                                       } catch (PDOException $e) {
                                                                         die("Error: " . $e->getMessage());}$pdo = null;?></select> 
        </div>
        <div class="form-group">
            <label for="doctor">Doctor:</label>
            <select  name="doctor" required class="form-control shadow-none border-success" >
                            <?php
                                      $servername = "localhost";
                                      $username = "root";
                                      $password = "";
                                      $dbname = "cabinet";
                                      try {
                                               $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                  $sql = "SELECT doctor_id, doctor_name, doctor_lastname, doctor_specialization FROM doctors";
                                                  $stmt = $pdo->prepare($sql);
                                                  $stmt->execute();
                                                 if ($stmt->rowCount() > 0) { 
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                          echo '<option value="' . $row['doctor_id'] . '">' . $row['doctor_name'].' - ' . $row['doctor_specialization'] . '</option>';
                                                              }
                                                            } else {
                                                      echo "No doctors found";
                                                                       }
                                                       } catch (PDOException $e) {
                                                                         die("Error: " . $e->getMessage());}$pdo = null;?></select> 
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="checked">checked</option>
                <option value="pending">Pending</option>
                <option value="cancelled">Canceled</option>
            </select>
        </div>
        <button type="submit" name='btn' class="btn mt-2 p-2 text-white" style='background-color:#6cbdaf;'>Update Schedule</button>
    </form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cabinet";

if (isset($_POST['btn'])) {
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $patient = $_POST['patient'];
            $doctor = $_POST['doctor'];
            $date = $_POST['date'];
            $start_time = $_POST['start_time'];
            $end_time = $_POST['end_time'];
            $status = $_POST['status'];
            $scheduleID = $_GET["id"];

            $sql = "UPDATE `schedule` SET `patient_id`=:patient, `doctor_id`=:doctor, `schedule_date`=:date, `start_time`=:start_time, `end_time`=:end_time, `schedule_status`=:status WHERE `schedule_id`=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':patient', $patient);
            $stmt->bindParam(':doctor', $doctor);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':start_time', $start_time);
            $stmt->bindParam(':end_time', $end_time);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $scheduleID);
            $stmt->execute();

            $sql1 = "SELECT COUNT(*) as count FROM schedule WHERE schedule_id = :id";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindParam(':id', $scheduleID);
            $stmt1->execute();
            
            $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            if ($result1['count'] > 0) {
                echo '<script>window.location.replace("admin/dashboard?message=Done");</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert"> Schedule Not Found </div>';
            }

            $stmt->closeCursor();
            $pdo = null;
        }

    } catch (PDOException $e) {
        echo $e;
        exit();
    }
}
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/ffe464b567.js" crossorigin="anonymous"></script>
</body>
</html>
