<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Clients</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class='bg-light'>
<header style="height: 70px;" class="">
    <nav class="navbar bg-dark" style="height:100%;">
        <div class="container-fluid">
            <a style="color: #29A38F; font-size:1.8rem; font-weight: 700; font-family: Arial, Helvetica, sans-serif;">MediSafe</a>
            <div class="d-flex gap-4 pe-2 " >
                <a class="nav-link" href="#"><i class="fa-solid fa-envelope" style="font-size: 1.6rem;color: #29A38F"></i></a>
                <a class="nav-link" href="#"><i class="fa-brands fa-facebook" style="font-size: 1.6rem; color: #29A38F;"></i></a>
                <a class="nav-link" href="#"><i class="fa-brands fa-linkedin" style="font-size: 1.6rem;color: #29A38F"></i></a>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid mt-5" >
    <h2>Modify Client</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="Number">Number</label>
            <input type="tel" class="form-control" id="date" name="number" required>
        </div>
          
        <button type="submit" name='btn' class="btn mt-2 p-2 text-white" style='background-color:#6cbdaf;'>Update Client</button>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cabinet";
        
        if(isset($_POST['btn'])){
            try {
                $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $newName = $_POST['name'];
                    $newEmail = $_POST['email'];
                    $newnumber = $_POST['number'];
                    $id = $_GET["id"];
                    $sql = "UPDATE `patience` SET `patient_name`=:name, `patient_email`=:email, `patient_phone`=:number WHERE patient_id=:id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':name', $newName);
                    $stmt->bindParam(':email', $newEmail);
                    $stmt->bindParam(':number', $newnumber);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    $sql1 = "SELECT COUNT(*) as count FROM patience WHERE patient_id = :id";
                    $stmt1 = $pdo->prepare($sql1);
                    $stmt1->bindParam(':id', $id);
                    $stmt1->execute();
                    
                    $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                    if ($result1['count'] > 0) {
                        echo "<div class='alert alert-success mt-3' role='alert'> Modified successfully </div>";
                        echo '<script>window.location.replace("admin/patiences?");</script>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert"> Rendezvous Not Found </div>';
                    }
                    
                    $stmt->closeCursor();
                    $pdo = null;
                }
            } catch(PDOException $e) {
                echo $e;
                exit();
            }
        }
        ?>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/ffe464b567.js" crossorigin="anonymous"></script>

</body>
</html>
