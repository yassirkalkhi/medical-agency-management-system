<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $selected_date = $_POST['date'];
    $is_sunday = (date('N', strtotime($selected_date)) == 7);
    if ($is_sunday) {
        echo json_encode(['error' => 'No work on Sunday']);
    } else {
        $sql = "SELECT start_time, end_time FROM schedule WHERE schedule_date = :selected_date";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':selected_date', $selected_date);
        $stmt->execute();
        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $start_time = strtotime('08:00:00');
        $end_time = strtotime('18:00:00');
        $break_start = strtotime('12:00:00');
        $break_end = strtotime('14:00:00');

        $occupied_times = [];
        foreach ($appointments as $appointment) {
            $start = strtotime($appointment['start_time']);
            $end = strtotime($appointment['end_time']);
            for ($t = $start; $t < $end; $t += 3600) {
                $occupied_times[] = $t;
            }
        }

        $available_times = [];
        for ($t = $start_time; $t < $end_time; $t += 3600) {
            $time_sec = $t;
            $occupied = false;
            if (in_array($time_sec, $occupied_times)) {
                $occupied = true;
            }
            if (!$occupied && !($time_sec >= $break_start && $time_sec < $break_end)) {
                $start_time_str = date('H:i', $time_sec);
                $end_time_str = date('H:i', $time_sec + 3600);
                $time_range = $start_time_str . ' - ' . $end_time_str;
                $available_times[] = $time_range;
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['times' => $available_times]);
    }
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
$conn = null;
?>
