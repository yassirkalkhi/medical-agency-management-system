<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

if (isset($_POST['medicineName'])) {
    $medicineName = $_POST['medicineName'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM medicaments WHERE medicament_name LIKE :medicineName LIMIT 10";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':medicineName', '%' . $medicineName . '%', PDO::PARAM_STR);
        $stmt->execute();
        $medicines = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            foreach ($medicines as $medicine) {
                   
                echo "<option value='{$medicine['medicament_name']}'>{$medicine['medicament_name']}</option>"; 
            
            }
        } else {
            echo "<tr><td colspan='4'>No medicines found.</td></tr>";
        }

        $conn = null;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
