<?php 
if(isset($_COOKIE['type'])){

    if(!($_COOKIE['type'] == "a")){
       header("Location: ../index");
    }
}else{
    header("Location: ../index");
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main-doctor-dashboard-style.css" />
    <title>Document</title>
</head>
<body>
    <nav class="sidebar ">
        <header>
            <div class="image-text">
                <span class="image">
                    <i class="fa-solid fa-bars"></i>
                </span>
                <div class="text header-text">
                    <span class="profession">Admin
</span>
                </div>
            </div>
        </header>
         <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links"> 
                     <li class="search-box nav-links">
                       <i class="fa-solid fa-magnifying-glass icon"></i>
                         <input type="search" placeholder="Search..">
                        </li>
                    <li class="nav-link">
                        <a href="../admin/dashboard"><i class="fa-solid fa-house icon"></i>
                        <span class="text nav-text">
                            Dashboard
                        </span>
                        </a>
                    </li>
                 
            
                    <li class="nav-link">
                        <a href="../admin/patiences"><i class="fa-solid fa-user icon"></i>
                        <span class="text nav-text">
                            Patiences
                        </span>
                        </a>
                    </li>
                
                    <li class="nav-link">
                        <a href="../admin/rendezvous"><i class="fa-solid fa-handshake icon"></i>
                        <span class="text nav-text">
                           Rendez Vous
                        </span>
                        </a>
                    </li>
                   
                </ul>
            </div>
            <div class="bottom-content">
                <ul>
                      <li class="nav-link-red ">
                      <a href="../logout"><i class="fa-solid fa-right-from-bracket fa-flip-horizontal icon"></i>
                    <span class="text nav-text">
                        Logout
                    </span>
                    </a>
                </li>
                <li class="mode nav-link-mode" >
                    <div class="moon-sun">
                        <i class="fa-solid fa-moon moon icon"></i>
                        <i class="fa-solid fa-sun sun icon"></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                </ul>
              
            </div>
         </div>
    </nav>
    <main>
        <header>
           <span >Dashboard</span>
           <i class="fa-regular fa-bell"></i>
        </header>
        <div class="upper-section  rounded ">
            <div class="up">
                <div class="upperelement rounded bg-light  d-flex justify-content-start  align-items-center ">
                                          <div class="box rounded  d-flex align-items-center justify-content-center  h-50 w-25" style='background:#CCFFFF;'   ><i class="fa-regular fa-user fs-1 "  style='color:#66FFFF;'></i></div>
                                          <div class="text-box"><span class="fw-bolder fs-2"><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT COUNT(*) as client_count FROM patience";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo $result['client_count'];
    } else {
        echo 0;
    }

    $conn = null;
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
</i></span><br><span class="fw-semibold fs-5">Client <i class="fa-solid fa-arrow-up text-success"></i></span></div>
                  </div>
                  <div class="upperelement rounded bg-light d-flex justify-content-start  align-items-center ">
                                    <div class="box rounded  d-flex align-items-center justify-content-center  h-50 w-25" style="background:#FFCC99;"><i class="fa-regular fa-handshake fs-1 " style="color:#FFB266;"></i></div>
                                    <div class="text-box"><span class="fw-bolder fs-2"><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $doctor_id = $_COOKIE['id'];

    $sql = "SELECT COUNT(*) AS appointment_count
            FROM schedule s
            INNER JOIN doctors d ON s.doctor_id = d.doctor_id
            WHERE d.doctor_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$doctor_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $appointment_count = $result['appointment_count'];
    echo $appointment_count;

    $conn = null;

} catch(PDOException $e) {

    die("Connection failed: " . $e->getMessage());
}
?>
</span><br><span class="fw-semibold fs-5">Rendezvous</span></div>
                  </div>
                  <div class="upperelement rounded bg-light d-flex justify-content-start  align-items-center ">
                    <div class="box rounded  d-flex align-items-center justify-content-center  h-50 w-25"  style="background:#C4FFD4;"><i class="fa-solid fa-check fs-1"  style="color:#9DEEB2;" ></i></div>
                    <div class="text-box"><span class="fw-bolder fs-2"><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $status_to_count = "checked";

    $sql = "SELECT COUNT(*) AS checked_appointments_count
            FROM schedule
            WHERE schedule_status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$status_to_count]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $checked_appointments_count = intval($result['checked_appointments_count']);
    $additional_fee = $checked_appointments_count ;
    echo "$additional_fee";

    $conn = null;

} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

</span><br><span class="fw-semibold fs-5">Checked</span></div>
                  </div>
            </div>
            <div class="up">
            <div class="upperelement rounded bg-light d-flex justify-content-start  align-items-center ">
                                    <div class="box rounded  d-flex align-items-center justify-content-center  h-50 w-25" style="background:#00CC66;"><i class="fa-solid fa-dollar-sign fs-1 text-success" ></i></div>
                                    <div class="text-box"><span class="fw-bolder fs-2"><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabinet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $status_to_count = "checked";

    $sql = "SELECT COUNT(*) AS checked_appointments_count
            FROM schedule
            WHERE schedule_status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$status_to_count]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $checked_appointments_count = intval($result['checked_appointments_count']);
    $additional_fee = $checked_appointments_count * 120;
    echo "$additional_fee$"; 

    $conn = null;

} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?></span><br><span class="fw-semibold fs-5">Profit<i class="fa-solid fa-arrow-up text-success ms-2"></i></span></div>
                  </div>
                  <div class="upperelement rounded bg-light d-flex justify-content-start  align-items-center ">
                                    <div class="box rounded  d-flex align-items-center justify-content-center  h-50 w-25" style="background:#FF9999;"><i class="fa-solid fa-dollar-sign fs-1 text-danger" ></i></div>
                                    <div class="text-box"><span class="fw-bolder fs-2">900$</span><br><span class="fw-semibold fs-5">Bills<i class="fa-solid fa-arrow-down text-danger ms-2"></i></span></div>
                  </div>
               
                  <div class="upperelement rounded bg-light d-flex justify-content-start  align-items-center ">
                    <div class="box rounded  d-flex align-items-center justify-content-center  h-50 w-25"  style='background:#CCCCFF;'><i class="fa-solid fa-money-check-dollar fs-1"  style='color:#9999FF;'></i></div>
                    <div class="text-box"><span class="fw-bolder fs-2">100K$</span><br><span class="fw-semibold fs-5">Transactions</span></div>
                  </div>
               
               
               
                
                 
            </div>
    
        
           
           </div>
       <div class="down-section">
        <div class="left">
            down left
        </div>
        <div class="right">
            down right
        </div>
       </div>
        </main>
  

<script src="../Js/main-admin.js"></script>
<script src="https://kit.fontawesome.com/ffe464b567.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 

</body>
</html>