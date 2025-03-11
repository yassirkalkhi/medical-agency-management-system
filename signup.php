<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>
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
            font-size: 0.9em;}
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
    <a href='index' style="color: #29A38F;text-decoration:none; font-size:1.8rem; font-weight: 700; font-family: Arial, Helvetica, sans-serif;">MediSafe</a>
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
                        <h3>Sign up</h3>
                      </div>
                    </div>
                  </div>
                  <form action="php/controllers/signup-cont" method="post" id='form'>
                    <div class="row gy-3 overflow-hidden">
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control shadow-none border-success" name="fullname" id="fullname" placeholder="name@example.com" required>
                          <label for="fullname" class="form-label">Full name</label>
                          <div class="error-message" id="fullnameError"></div>
                        </div>
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control shadow-none border-success" name="username" id="email" placeholder="name@example.com" required>
                          <label for="email" class="form-label">Email</label>
                          <div class="error-message" id="emailError"></div>
                        </div>
                        <div class="form-floating mb-3">
                          <input type="tel" class="form-control shadow-none border-success" name="phone" id="phone" placeholder="+212 XXX-XXXX" required>
                          <label for="email" class="form-label">Phone</label>
                          <div class="error-message" id="phoneError"></div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control shadow-none border-success" name="password" id="password" value="" placeholder="Password" required>
                          <label for="password" class="form-label">Password</label>
                          <div class="error-message" id="passwordError"></div>
                        </div>
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control shadow-none border-success" name="confirmPassword" id="confirmPassword" value="" placeholder="Password" required>
                          <label for="password" class="form-label">Confirm Password</label>
                          <div class="error-message" id="confirmPasswordError"></div>
                        </div>
                      </div>
                      <div class="form-floating mb-3">
                          <input type="date" class="form-control shadow-none border-success" name="date" id="date" value="" placeholder="Password" required>
                          <label for="date" class="form-label">Date of Birth</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                          <label class="form-check-label text-secondary" for="remember_me">
                            Keep me logged in
                          </label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn  btn-lg text-white" type="submit" style="background-color:  #29A38F;">Sign up </button>
                        </div>
                      </div><?php  if(isset($_GET["mes"])and $_GET["mes"]  == "f"){
                      echo '<div class="alert alert-danger mt-3" role="alert">
                       User already exists.
                       </div>';}?>
                        <div class='mt-2'>
                        Already have Account ? <a href="login" class='text-success'>Login Here</a>
                      </div>
                    </div>
                    
                  </form>
              <div class="row">
                 <div class="col-12">
                      <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                        <a href="#!" class="text-secondary"></a>
                      </div>
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
        document.getElementById('form').addEventListener('submit', function(event) {
            event.preventDefault();

            document.getElementById('fullnameError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('phoneError').textContent = '';
            document.getElementById('passwordError').textContent = '';
            document.getElementById('confirmPasswordError').textContent = '';

            const fullname = document.getElementById('fullname').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            let isValid = true;
            if (fullname.trim() === '') {
                document.getElementById('fullnameError').textContent = 'Full name is required.';
                isValid = false;
            }
            if (!validateEmail(email)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address.';
                isValid = false;
            }
            if (!validatePhone(phone)) {
                document.getElementById('phoneError').textContent = 'Please enter a valid phone number.';
                isValid = false;
            }

            if (password.length < 8) {
                document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long.';
                isValid = false;
            }


            if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
                isValid = false;
            }

            if (isValid) {
                this.submit();
            }
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }

        function validatePhone(phone) {
            const re = /^[0-9]{10}$/;
            return re.test(String(phone));
        }
    </script>
</html>