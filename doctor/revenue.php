<?php 
if(isset($_COOKIE['type'])){

    if(!($_COOKIE['type'] == "d")){
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
    <link rel="stylesheet" href="../css/main-doctor-Revenue-style.css" />
    <title>Transactions</title>
</head>
<body>
    <nav class="sidebar ">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../assets/user.jpg" alt="">
                </span>
                <div class="text header-text">
                    <span class="profession">Yasser</span>
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
                        <a href="../doctor/dashboard"><i class="fa-solid fa-house icon"></i>
                        <span class="text nav-text">
                            Dashboard
                        </span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../doctor/revenue"><i class="fa-solid fa-dollar-sign icon"></i>
                        <span class="text nav-text">
                            Transactions
                        </span>
                        </a>
                    </li>
            
                    <li class="nav-link">
                        <a href="../doctor/patiences"><i class="fa-solid fa-user icon"></i>
                        <span class="text nav-text">
                            Patiences
                        </span>
                        </a>
                    </li>
                
                    <li class="nav-link">
                        <a href="../doctor/rendezvous"><i class="fa-solid fa-handshake icon"></i>
                        <span class="text nav-text">
                           Rendez Vous
                        </span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="medicines"><i class="fa-solid fa-file icon"></i>
                        <span class="text nav-text">
                      Prescription
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
           <span >Transactions</span>
           <i class="fa-regular fa-bell"></i>
        </header>
        <div class="main-section h-100">
            <table class="table table-hover rendezvous-table table-striped">
            <tr ><td class='bg-light fw-bold'>Appintment Number</td>
            <td class='bg-light fw-bold'>Date</td>
            <td class='bg-light fw-bold '>Type</td>
            <td class='bg-light fw-bold'>Status</td>
            <td class='bg-light fw-bold'>Start Time</td>
            <td class='bg-light fw-bold'>End Time</td>
            <td class='bg-light fw-bold'>Additional Cost</td></tr>
           
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cabinet";
                    
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                        $sql = "SELECT * FROM schedule";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                        if (!empty($appointments)) {
                    
                            foreach ($appointments as $appointment) {
                                if ($appointment['schedule_status'] == 'checked') {
                                echo "<tr>";
                                    echo '<td>' . htmlspecialchars($appointment['schedule_num']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['schedule_date']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['schedule_type']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['schedule_status']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['start_time']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['end_time']) . '</td>';
                                    echo '<td><p class="badge text-bg-success mt-4">+120$</p></td>';
                                   echo  "</tr>";
                                }
                            }
                         
                        } else {
                            echo 'No appointments found.';
                        }
                    
                        $conn = null;
                    } catch(PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                    ?>
                    
           
           
            </table>
           </div>
           
        </main>
  

<script src="../Js/main-admin.js"></script>
<script src="https://kit.fontawesome.com/ffe464b567.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 

</body>
</html>