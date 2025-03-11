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

        // Output search results
        if ($stmt->rowCount() > 0) {
            foreach ($medicines as $medicine) {
                $id = $medicine['medicament_id'];
                $dis = $medicine['medicament_presentation'];
                echo "<tr>";
                echo "<td>{$medicine['medicament_name']}</td>"; 
                echo "<td>{$medicine['medicament_dosage_form']}</td>"; 
                echo "<td>{$medicine['medicament_presentation']}</td>"; 
                echo "<td><a href='prescription?dis=$dis' class='btn btn-primary'> Prescription </a> </td>";
                echo "</tr>";
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
