<?php include("../controller/dashbord_control.php"); ?>
 <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.dashboard {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.section {
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    color: #0062FA;
}

p {
    margin-bottom: 10px;
}

 </style>
  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>School Management System</h1>
            <h4>Welcome, Principal!</h4>
        </div>
        <div class="dashboard">
            <div class="section">
                <h2>Principal's Details</h2>
                <p>Name: John Doe</p>
                <p>Email: john.doe@example.com</p>
            </div>
            <div class="section">
                <h2>Student Details</h2>
                <p>Total Students: 500</p>
                <p>Total Students: 60</p>
                <p>Miral Chauhan</p>
                <p>Phone: 1234567890</p>
                <p>Email: mira@gmail.com</p>
            </div>
            <div class="section">
                <h2>Class Teacher Details</h2>
                <p>Total Teachers: 12</p>
                <p>Name: Jane Smith</p>
                <p>Phone: 1234567890</p>
                <p>Email: jane.smith@example.com</p>
            </div>
            <div class="section">
                <h2>Class Details</h2>
                <p>Class : 10</p>
                <p>Total Students: 50</p>
            </div>
            <div class="section">
                <h2>Transportation Details</h2>
                <p>Total Drivers: 2</p>
                <p>Total Vehicles: 5</p>
            </div>
        </div>
    </div>
</body>
</html>

<?php include("../includes/footer.php"); ?>