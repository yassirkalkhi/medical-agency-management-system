<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "cabinet";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule_number = $_POST['schedule_number'];

    $sql = "SELECT s.*, p.patient_name, d.doctor_name 
            FROM schedule s
            LEFT JOIN patience p ON s.patient_id = p.patient_id
            LEFT JOIN doctors d ON s.doctor_id = d.doctor_id
            WHERE s.schedule_num = :schedule_num";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':schedule_num', $schedule_number, PDO::PARAM_INT);

    try {
        $stmt->execute();
        $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($appointment) {
            $schedule_number = $appointment['schedule_num'];
            $patient_name = $appointment['patient_name'];
            $doctor_name = $appointment['doctor_name'];
            $schedule_date = $appointment['schedule_date'];
            $start_time = $appointment['start_time'];
            $end_time = $appointment['end_time'];
            
            $current_time = time(); 
            $appointment_time = strtotime($schedule_date . ' ' . $start_time);
            $time_until_visit = $appointment_time - $current_time;
            $hours = floor($time_until_visit / 3600);
            $minutes = floor(($time_until_visit % 3600) / 60);
            
            $response = "<h3>Appointment Details</h3>";
            $response .= "<div class='info-item'><strong class='ínfo-text'>Schedule Number:</strong> {$schedule_number}</div>";
            $response .= "<div class='info-item'><strong>Patient Name:</strong> {$patient_name}</div>";
            $response .= "<div class='info-item'><strong>Doctor Name:</strong> {$doctor_name}</div>";
            $response .= "<div class='info-item'><strong>Schedule Date:</strong> {$schedule_date}</div>";
            $response .= "<div class='info-item'><strong>Start Time:</strong> {$start_time}</div>";
            $response .= "<div class='info-item'><strong>End Time:</strong> {$end_time}</div>";
            $response .= "<div class='info-item'><strong>Time Until Visit:</strong> {$hours} hours and {$minutes} minutes</div>";

            // Send HTML response
            echo $response;
        } else {
            echo "<p>No appointment found with schedule number '{$schedule_number}'</p>";
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
?>
