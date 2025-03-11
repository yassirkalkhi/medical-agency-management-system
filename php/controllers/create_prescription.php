<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientName = $_POST["patientName"];
    $medicines = $_POST["medicine"];
    $instructions = $_POST["instructions"];
    $doctor_id = $_COOKIE["id"];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO prescriptions (patient_name, medicine_id, instructions,doctor_id) VALUES (?, ?,?, ?)";
        $stmt = $conn->prepare($sql);
       foreach($medicines as $medicine){
        $stmt->execute([$patientName, $medicine, $instructions,$doctor_id]);
       }
       $conn = null;
        header("Location: ../../doctor/medicines");
        exit();
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>
