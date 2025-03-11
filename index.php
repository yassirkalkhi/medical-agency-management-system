<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main-index-style.css" />
    <title>Project</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="index">MediSafe</a>
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- SideBar -->
        <div class="sidebar offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header text-white">
            <h5 class="offcanvas-title fs-5" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white shadow-none " data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item  mx-2 ">
                <a class="nav-link active d-flex justify-content-center gap-3 align-items-center" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item mx-2 btntohide ">
                <button type="button" class="nav-link active d-flex justify-content-center gap-3 align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Reach Us!!</h5>
                                <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                  <div class="modal-body">
                                    <form class="row g-3 subject-form" >
                                      <div class="col-md-5">
                                       <label for="inputname4" class="form-label">Name</label>
                                       <input type="text" class="form-control shadow-none" id="inputnamed4">
                                     </div>
                                     <div class="col-md-7">
                                       <label for="inputEmail4" class="form-label">Email</label>
                                       <input type="email" class="form-control shadow-none" id="inputEmail4">
                                     </div>
                                     <div class="col-12">
                                       <label for="inputsubject" class="form-label">Subject</label>
                                       <textarea name="" id="inputsubject" class="form-control shadow-none"></textarea>
                                     </div>
                            </div>
                           <div class="modal-footer">
                         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Send</button>
                      </div>
                   </div>
                 </div>
              </div>
              </form>
              </li>
              <li class="nav-item mx-2 btntohide">
                <a class="nav-link active " aria-current="page" href="#">About</a>
              </li>
             
            <li class="nav-item rounded itemtohide">
        <?php    if(isset( $_COOKIE["id"])){
    $id = $_COOKIE["id"];
    if( $_COOKIE["type"] == "p"){
      echo "  <a href='makeAppointment' class='nav-link  d-flex justify-content-center gap-3 align-items-center'>
      Make Appointment
      </a>";
    }
    elseif( $_COOKIE["type"] == "d"){
      echo "<a href='doctor/dashboard?$id'>
      <button class='btn btn-outline-light nav-button nav-button1 btntohide' type='button'>Dash</button></a>";
    } elseif( $_COOKIE["type"] == "a"){
      echo "
      <a href='admin/dashboard' class='nav-link  d-flex justify-content-center gap-3 align-items-center'>
Admin Space
      </a>";
    }
}
  else {
    echo "  <a href='login' class='nav-link  d-flex justify-content-center gap-3 align-items-center'>
Login
      </a>";
}
?>

           

            <li class="nav-item rounded itemtohide">
              <p class="mb-0 p-2">
                <a class="nav-link dropdown-toggle d-flex justify-content-center gap-3 align-items-center" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Services
                </a>
              </p>
              <div class="collapse" id="collapseExample">
                <div class="card card-body">


                  <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">  <i class="fa-solid fa-user-doctor"></i></div>
                    <div class="card-body">
                      <h5 class="card-title">Generaliste</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                  <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header"> <i class="fa-solid fa-heart-pulse"></i></div>
                    <div class="card-body">
                      <h5 class="card-title">cardialogie</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header"> <i class="fa-solid fa-briefcase-medical"></i></div>
                    <div class="card-body">
                      <h5 class="card-title">Urgence</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                  <div class="card text-white  bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="fa-solid fa-handshake-angle"></i></div>
                    <div class="card-body">
                      <h5 class="card-title">assistance</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  

                </div>
              </div>
            </li>
            </ul>
            <?php



if(isset( $_COOKIE["id"])){
    $id = $_COOKIE["id"];
    if( $_COOKIE["type"] == "p"){
      echo "<a href='show'>
      <button class='btn me-2 btn-outline-light nav-button nav-button1 btntohide' type='button'>Track</button></a><a href='makeAppointment?$id'>
      <button class='btn btn-outline-light nav-button nav-button1 btntohide me-2' type='button'><i class='fa-solid fa-calendar-check lg'></i></button></a><a href='logout?$id'>
      <button class='btn btn-outline-light nav-button nav-button1 btntohide' type='button'>Logout</button></a>";
    }
    elseif( $_COOKIE["type"] == "d"){
      echo "<a href='doctor/dashboard?$id'>
      <button class='btn btn-outline-light nav-button nav-button1 btntohide' type='button'>Dash</button></a>";
    } elseif( $_COOKIE["type"] == "a"){
      echo "<a href='admin/dashboard'>
      <button class='btn btn-outline-light nav-button nav-button1 btntohide' type='button'>Admin </button></a>";
    }
}
  else {
    echo "<a href='login'>
          <button class='btn btn-outline-light nav-button nav-button1 btntohide' type='button'>Login</button></a>";
}
?>

           
          </div>
        </div>
      </div>
    </nav>

    <script src="https://kit.fontawesome.com/ffe464b567.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
