<?php
require 'conn.php';

$employeeID = $_POST['employeeID'];
$employeeTitle = $_POST['employeeTitle'];
$employeeID = $_POST['employeeID'];
$employeeID = $_POST['employeeID'];

$stmt = $conn->prepare($sql);
$stmt->execute();