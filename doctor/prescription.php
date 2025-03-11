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
    <title>Create Prescription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #29A38F;
        }
    </style>
</head>
<body>
    <div class="container bg-white rounded pt-3 ps-5 pe-5 mt-5">
        <h2 class="mt-3">Create Prescription</h2>
        <form action="../php/controllers/create_prescription" method="post">
            <div class="mb-3">
                <label for="patientName" class="form-label">Patient Name:</label>
                <input type="text" class="form-control shadow-none border-success" id="patientName" name="patientName" required>
            </div>
            <div class="mb-3">
                <label for="medicine" class="form-label">Select Medicines:</label>
                <input type="text" name="" id="medicineName" ut="" class="form-control my-3 shadow-none border-success">
                <select class="form-select shadow-none border-success" id="searchResults" name="medicine[]" multiple required>
                </select>
            </div>
            <div class="mb-3">
                <label for="instructions" class="form-label">Instructions:</label>
                <textarea class="form-control shadow-none border-success" id="instructions" name="instructions" rows="3" required><?= htmlspecialchars($_GET["dis"] ?? ''); ?></textarea>
            </div>
 
            <button class="btn btn-lg text-white hover mb-3" type="submit" style="background-color: #29A38F;">Create Prescription</button>

            <!-- Download PDF button -->
            <button type="button" class="btn btn-lg text-white hover mb-3" id="downloadPdfButton"  style="background-color: #29A38F;">Download Prescription PDF</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#medicineName').on('input', function() {
                var medicineName = $(this).val();

                $.ajax({
                    url: '../php/controllers/search_medicine_select',
                    type: 'POST',
                    data: { medicineName: medicineName },
                    success: function(response) {
                        $('#searchResults').html(response);
                    }
                });
            });

            $('#downloadPdfButton').on('click', function() {
                var patientName = $('#patientName').val();
                var medicines = $('#searchResults').val();
                var instructions = $('#instructions').val();

                window.location.href = '../php/controllers/create_pdf?patientName=' + encodeURIComponent(patientName) +
                                        '&medicines=' + encodeURIComponent(medicines) +
                                        '&instructions=' + encodeURIComponent(instructions);
            });
        });
    </script>
</body>
</html>
