<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_GET['id'])) {
        $patient_email = $_GET['id'];
        $sql = "DELETE FROM patience WHERE patient_email = ?;
        DELETE FROM `users` WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$patient_email,$patient_email])) {
            header("Location: ../../admin/patiences");
        } else {
            echo "Error deleting record.";
        }
    } else {
        echo "No patient ID provided.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
