<?php 
require 'db.php';
$sql = "SELECT  employees.name AS employee_name,  departments.name AS department_name FROM employees RIGHT JOIN departments ON employees.department_id = departments.id";
$run = mysqli_query($conn, $sql);

if (!$run) {                 
    echo "<div class='alert alert-danger'>Database not connected</div>"; 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 70px;
            font-family: Arial, sans-serif;
        }

        .riddhi {
            width: 250px;
            margin: 20px auto;
            padding: 10px;
            border-radius: 30px;
            font-weight: bold;
            background-color: #ffc107;
            color: #212529;
            text-align: center;
            font-size: 24px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease;
        }

        .riddhi:hover {
            background-color: #ffca2c;
        }

        .table-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
<h1 class="riddhi">Company Data</h1>
<div class="table-container">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
            <th>Employee_Name</th>
            <th>Department_Name</th>
            <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
    <tbody>
          <?php while ($user = mysqli_fetch_assoc($run)): ?>
            <tr>
                <td><?= $user['employee_name']; ?></td>
                <td><?= $user['department_name']; '----'; ?></td>
                <td class="text-center">
                <a href="edit.php?editId" class="btn btn-sm btn-primary">Edit</a>
                </td>
                <td class="text-center">
                <a href="delete.php?deleteId" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
                <?php endwhile; ?>
    </tbody>
    </table>
</div>
</body>
</html>
