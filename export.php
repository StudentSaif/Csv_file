<?php
include("connection.php");
header('Content-Type: text/html; charset=utf-8');

// if(isset($_POST["export"]))
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo"<pre>";
    // var_dump();
    // die();
    
    header('Content-Type: text/csv;');
    header('Content-Disposition: attachment; filename = demo_download.csv');
    $output = fopen("php://output", "w+");
    fputcsv($output, ['id', 'name', 'email', 'phone number', 'address', 'ankit_sir']);
    $query = "SELECT * from csv_details ORDER BY id ASC";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {


        fputcsv($output, $row);
    }
    fclose($output);
}
