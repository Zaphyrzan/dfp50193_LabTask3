<?php
require 'conn.php';
$employeeID = $_GET['employeeID'];
$sql = "SELECT * FROM employee WHERE employeeID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $employeeID);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Full Details</title>
</head>

<body>
    <table>
        <h2>Employee Full Details</h2>
        <tr>
            <td><label for="employeeID">Employee ID</label></td>
            <td>
                <?php echo $row->employeeID; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeeTitle">Employee Title</label></td>
            <td>
                <?php echo $row->employeeTitle; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeeFname">Employee First Name</label></td>
            <td>
                <?php echo $row->employeeFname; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeeLname">Employee Last Name</label></td>
            <td>
                <?php echo $row->employeeLname; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeeIC">Employee IC</label></td>
            <td>
                <?php echo $row->employeeIC; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeeDoB">Employee Date-Of-Birth</label></td>
            <td>
                <?php echo $row->employeeDoB; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeeNationality">Employee Nationality</label></td>
            <td>
                <?php echo $row->employeeNationality; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeeDepartment">Employee Department</label></td>
            <td>
                <?php echo $row->employeeDepartment; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeePosition">Employee Position</label></td>
            <td>
                <?php echo $row->employeePosition; ?>
            </td>
        </tr>
        <tr>
            <td><label for="employeeSalary">Employee Salary</label></td>
            <td>
                <?php echo $row->employeeSalary; ?>
            </td>
        </tr>
    </table>

    <p></p>
    <p></p>
    <a href="index.php">Go back</a>
</body>

</html>