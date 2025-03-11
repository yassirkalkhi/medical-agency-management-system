<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Successfully Booked</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 5rem;
        }
        .container {
            background-color: #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            padding: 2rem;
            border-radius: 0.5rem;
            text-align: center;
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body  style="background-color:  #29A38F;">
    <div class="container">
        <h1 class="mb-4">Appointment Successfully Booked</h1>
        <p>Your appointment has been successfully booked. Here is the Track Code Keep It !!</p>
        <?php 
        if(isset($_GET['code'])){
            $code = $_GET['code'];
            echo " <div id='codeText'>$code</div> ";
        }
         
        ?><br>
        <a  class="copy-btn btn btn-secondary" onclick="copyCode()">Copy Code</a>
        <a href="index" class="btn btn-success">Back to Home</a>
    </div>

    <script>
        function copyCode() {
            var codeText = document.getElementById("codeText").innerText;
            var tempInput = document.createElement("textarea");
            tempInput.value = codeText;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            alert("Code copied to clipboard!");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+7sBjve1XCwaRy6p4ng4KnKwzK4E25jUA4gWqFPZh6O/xAM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-zdZ2Cb6yQ8s1nAosLC3WRypZZBZlVqH1m8Rh7K0tOK+jHRzsv2P3A0eEDpQT5WH6" crossorigin="anonymous"></script>
</body>
</html>
