<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Selection</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <style>
        *{
            overflow: hidden;
        }
        .section-1{
            height: calc(100vh - 70px);
            display: flex;
            align-items: center;
        }
        .navbar-brand{
          color: white;
          font-weight: 600;
          font-size: 2rem;
           }
        .nav-button{
         width: 76px;
         height: 39px;
         }
       .nav-button1:hover{
          color:#29A38F ;
         }
         .error-message {
            color: red;
            font-size: 0.9em;
          }
        @media  screen and (max-width:1200px) {
            section .container .svg {
                display: none;
            }
            nav .collapse{
                flex-direction: row;
                align-items: center;
                justify-content: start;
            }
        }
        @media  screen and (max-width:600px) {
            section .container {
                height: 80%;
            }
        }
    </style>
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-9/assets/css/login-9.css">
</head>
<body>
    <header style="height: 70px;" class="">
    <nav class="navbar bg-body-white" style="height:100%;">
  <div class="container-fluid">
    <a href='index'  style="color: #29A38F; font-size:1.8rem;text-decoration:none; font-weight: 700; font-family: Arial, Helvetica, sans-serif;">MediSafe</a>
    <div class="d-flex gap-4 pe-2 " >
              <a class="nav-link" href="#"><i class="fa-solid fa-envelope" style="font-size: 1.6rem;color: #29A38F"></i></a>
              <a class="nav-link" href="#"><i class="fa-brands fa-facebook" style="font-size: 1.6rem; color: #29A38F;"></i></a>
              <a class="nav-link" href="#"><i class="fa-brands fa-linkedin" style="font-size: 1.6rem;color: #29A38F"></i></a>
    </div>
  </div>
</nav>
    </header>
    <section class=" py-3 py-md-5 py-xl-8 section-1" style="background-color:  #29A38F;">
        <div class="container">
          <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 col-xl-7 svg">
              <img src="assets/sapiens.svg" alt="" style="width:700px;">
            </div>
            <div class="col-12 col-md-12 col-xl-5">
              <div class="card border-0 rounded-4">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-4">
                        <h3>Make Appointment</h3>
                      </div>
                    </div>
                  </div>
                  <form action="php/controllers/addApp" method="post" id='form'>
                    <div class="row gy-3 overflow-hidden">
                      <div class="col-12">
                        <label  class="form-label">Select Date</label>
                        <div class=" mb-3">
                            <input type="date" id="appointmentDate" name="appointmentDate" required class="form-control shadow-none border-success">
                          <div class="error-message" id="emailError"></div>
                        </div>
                        <div class=" mb-3">
                          <label  class="form-label" id="appointmentTimelabel">Select Time</label>
                            <select id="appointmentTime" name="appointmentTime" required class="form-select shadow-none border-success" >
                            </select>  <div id="noappointment" style="color: #d52929; display: inline; font-weigth:bold;"></div>
                        </div>
                        <label  class="form-label">Select Doctor</label>
                        <div class=" mb-3">
                            <select  name="doctorID" required class="form-select shadow-none border-success" >
                              <!-- pour lister les docteur   -->
                            <?php
                                      $servername = "localhost";
                                      $username = "root";
                                      $password = "";
                                      $dbname = "cabinet";
                                      try {
                                               $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                  $sql = "SELECT doctor_id, doctor_name, doctor_lastname, doctor_specialization FROM doctors";
                                                  $stmt = $pdo->prepare($sql);
                                                  $stmt->execute();
                                                 if ($stmt->rowCount() > 0) { 
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                          echo '<option value="' . $row['doctor_id'] . '">' . $row['doctor_name'].' - ' . $row['doctor_specialization'] . '</option>';
                                                              }
                                                            } else {
                                                      echo "No doctors found";
                                                                       }
                                                       } catch (PDOException $e) {
                                                                         die("Error: " . $e->getMessage());}$pdo = null;?></select>  
                        </div>
                        <label  class="form-label" >Select Type</label>
                        <div class=" mb-3">
                            <select  name="type"  class="form-select shadow-none border-success">
                              <option value="Consultation Initiale">Consultation Initiale</option>
                              <option value="Évaluation Complète de la Santé">Évaluation Complète de la Santé </option>
                              <option value="Gestion des Maladies Chroniques<">Gestion des Maladies Chroniques</option>
                            </select> <div class="error-message" id="emailError"></div>
                        </div>
                      </div> 
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn  btn-lg text-white" type="submit" style="background-color:  #29A38F;">Take</button>
                        </div>
                      </div>
                     
                      
                      
                    </div>
                  </form>
              <div class="row">
                <?php
                if(isset($_GET['message'])){
                  echo "<div class='error-message' style='margin-top:10px;'> Appointment Already taken</div>";
                }
                
                ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="https://kit.fontawesome.com/ffe464b567.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
      <script>
        $(document).ready(function() {
           var  errordisplay = document.getElementById("noappointment");
function initializeDatePicker() {
        $('#appointmentDate').attr('min', getCurrentDate());
        disablePastDates($('#appointmentDate').val());}

function getCurrentDate() {
        var now = new Date();
        var month = (now.getMonth() + 1).toString().padStart(2, '0');
        var day = now.getDate().toString().padStart(2, '0');
        return now.getFullYear() + '-' + month + '-' + day;}

function disablePastDates(selectedDate) {
        var dateParts = selectedDate.split('-');
        var selectedDateObj = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
        var today = new Date();
        $('#appointmentDate').each(function() {
            var inputDate = new Date($(this).val());
            if (inputDate < selectedDateObj) {
                $(this).prop('disabled', true);
            } else {
                $(this).prop('disabled', false);
            }});}

function fetchAvailableTimes(selectedDate) {
          $.ajax({
                  type: 'POST',
                  url: 'php/controllers/get_available_times',
                  data: { date: selectedDate },
                  dataType: 'json',
                  success: function(response) {
                  $('#appointmentTime').empty();
                    if (response.error) {
                       errordisplay.textContent = response.error;
                       $('#appointmentTime').hide(); 
                       $('#appointmentTimelabel').hide();   } 

                    else if (response.times.length > 0) {
                        $.each(response.times, function(index, time) {
                        $('#appointmentTime').append('<option value="' + time + '">' + time + '</option>');});
                        errordisplay.textContent = ""
                        $('#appointmentTime').show(); 
                        $('#appointmentTimelabel').show(); } 
                    else {
                      errordisplay.textContent = "Day Full"
                       $('#appointmentTime').hide(); 
                       $('#appointmentTimelabel').hide(); }},
                        error: function(xhr, status, error) {
                       console.error('AJAX Error:', status, error);}});}

            
function refrech(){
                       var initialDate = $('#appointmentDate').val();
                       fetchAvailableTimes(initialDate);}


$('#appointmentDate').change(function() {
                        var selectedDate = $(this).val();
                        fetchAvailableTimes(selectedDate);
                        var selectedDate = $(this).val();
                       $('#appointmentDate').attr('min', selectedDate);
                       disablePastDates(selectedDate);});

$('#form').submit(function(event) {
                       event.preventDefault();
                       refrech();
                        $(this).off('submit').submit();
    });


setInterval(initializeDatePicker,1000)});




    </script>
</body>
</html>