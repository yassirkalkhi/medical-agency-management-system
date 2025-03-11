<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #29A38F;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #29A38F;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background-color: #29A38F;
            color: white;
            cursor: pointer;
        }
        #appointment-details {
            margin-top: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 8px;
            
        }
        .info-item {
            margin-bottom: 10px;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2>Appointment Details</h2>
        <label for="schedule_number">Enter Schedule Number:</label>
        <input type="text" id="schedule_number" name="schedule_number" required>
        <button id="fetch_appointment">Fetch Appointment</button>
        
        <div id="appointment-details"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#fetch_appointment').click(function(e) {
                e.preventDefault();
                var scheduleNumber = $('#schedule_number').val();

                $.ajax({
                    type: 'POST',
                    url: 'php/controllers/appointment_info.php',
                    data: { schedule_number: scheduleNumber },
                    success: function(response) {
                        $('#appointment-details').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>
</body>
</html>
