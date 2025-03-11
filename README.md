<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Agency System - README</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            border-left: 5px solid #007bff;
            padding-left: 10px;
            margin-top: 25px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            background: #007bff;
            color: white;
            margin: 6px 0;
            padding: 12px;
            border-radius: 6px;
            display: flex;
            align-items: center;
        }

        ul li::before {
            content: "✔";
            margin-right: 10px;
            font-weight: bold;
        }

        .code-box {
            background: #222;
            color: #fff;
            padding: 12px;
            border-radius: 6px;
            font-family: monospace;
            overflow-x: auto;
            margin: 10px 0;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            ul li {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>🏥 Medical Agency System</h1>
        <p>A web-based system for managing medical agency operations, including appointment scheduling, medication tracking, and prescription printing.</p>

        <h2>🚀 Features</h2>
        <ul>
            <li>Appointment Management – Schedule and manage patient appointments</li>
            <li>Doctor & Client Profiles – Maintain detailed medical records</li>
            <li>Medication Management – Track inventory and orders</li>
            <li>Prescription Printing – Generate and print prescriptions</li>
            <li>Admin Dashboard – Manage users, appointments, and medications</li>
        </ul>

        <h2>🛠 Tech Stack</h2>
        <ul>
            <li>📌 <strong>Frontend:</strong> HTML, CSS, JavaScript</li>
            <li>📌 <strong>Backend:</strong> PHP</li>
            <li>📌 <strong>Database:</strong> MySQL</li>
        </ul>

        <h2>⚡ Installation</h2>
        <div class="code-box">
            1. Clone the repository: <br>
            <code>git clone https://github.com/your-username/medical-agency.git</code>
        </div>
        <div class="code-box">
            2. Import the database: <br>
            <code>Import database.sql into MySQL</code>
        </div>
        <div class="code-box">
            3. Configure the database connection in: <br>
            <code>config.php</code>
        </div>
        <div class="code-box">
            4. Run the project on a local server (XAMPP/LAMP)
        </div>

        <h2>💡 Contribution</h2>
        <p>Want to improve this project? Fork the repository, make changes, and submit a pull request! 🚀</p>

        <footer>
            📜 Licensed under MIT License | Created with ❤️ by [Your Name]
        </footer>
    </div>

</body>
</html>
