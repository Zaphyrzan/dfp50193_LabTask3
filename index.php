<?php
require 'conn.php';

if (isset($_POST['searchNationality'])) {
    $nationality = $_POST['nationality'];
    $sql = "SELECT * FROM employee WHERE employeeNationality = ?";
    //Read data from database
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $nationality);
} else if (isset($_POST['searchDepartment'])) {
    $department = $_POST['department'];
    $sql = "SELECT * FROM employee WHERE employeeDepartment = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $department);
} else {
    $sql = "SELECT * FROM employee";
    $stmt = $conn->prepare($sql);
}
//Send sql statement to mySql database
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Task 3</title>
</head>

<body>
    <h1>Wan Industry Sdn Bhd</h1>
    <h3>Employee List</h3>
    <div class="myclass">
        <form method="POST" action="">

            <select name="nationality">
                <option>
                    Nationality
                </option>
                <option value="Malaysian">Malaysia</option>
                <option value="Singapore">Singapore</option>
                <option value="Australian">Australia</option>
            </select>
            <input type="submit" name="searchNationality" value="search" />
        </form>

        <div class="myclass">
            <form method="POST" action="">

                <select name="department">
                    <option>
                        Department
                    </option>
                    <option value="IT">IT</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Human Resource">Human Resource</option>
                </select>
                <input type="submit" name="searchDepartment" value="search" />
                <input type="submit" name="display" value="Display All" />
            </form>

            
            <table border="1" cellpadding="8" cellspacing="0">
                <tr bgcolor="#ffd700">
                    <th>Employee ID</th>
                    <th>Employee Title</th>
                    <th>Employee First Name</th>
                    <th>Tindakkan</th>
                </tr>
                <?php
                while ($row = $result->fetch_object()) {
                ?>
                    <tr>
                        <td><?php echo $row->employeeID; ?></td>
                        <td><?php echo $row->employeeTitle; ?></td>
                        <td><?php echo $row->employeeFname; ?></td>
                        <td>
                            <a href="details.php?employeeID=<?php echo $row->employeeID; ?>">View Details</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
</body>

</html>