<?php

include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['file']['name']) && $_FILES['file']['name']) {

        $tempname = $_FILES['file']['tmp_name'];
        $fileType = mime_content_type($tempname);

       
        if ($fileType != 'text/csv' && $fileType != 'application/vnd.ms-excel') {
            echo "<script type=\"text/javascript\">
                    alert(\"Invalid File: Please Upload a CSV File.\");
                    window.location = \"index.php\"
                  </script>";
            exit();
        }

        $row = 1;

        if (($handle = fopen($tempname, 'r+')) !== FALSE) {

            while (($getData = fgetcsv($handle, 1000, ",")) !== FALSE) 
            {
                
                if ($row != 1) 
                {
                    $id = mysqli_real_escape_string($conn, $getData[0]);
                    $name = mysqli_real_escape_string($conn, $getData[1]);
                    $email = mysqli_real_escape_string($conn, $getData[2]);
                    $phone_number = mysqli_real_escape_string($conn, $getData[3]);
                    $address = mysqli_real_escape_string($conn, $getData[4]);
                    $ankit_sir = mysqli_real_escape_string($conn, $getData[5]);

                    $sql = "INSERT INTO csv_details (id, name, email, phone_number, address, ankit_sir) VALUES ('$id', '$name', '$email', '$phone_number', '$address', '$ankit_sir')";
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        echo "Error: " . mysqli_error($conn);
                        exit();
                    }
                }
                $row++;
            }
            fclose($handle);

            echo "<script type=\"text/javascript\">
                    alert(\"CSV File has been successfully Imported.\");
                    window.location = \"fetch_data.php\"
                  </script>";
        } else {
            echo "<script type=\"text/javascript\">
                    alert(\"Error opening file.\");
                    window.location = \"index.php\"
                  </script>";
        }
    } else {
        echo "<script type=\"text/javascript\">
                alert(\"Please Upload a File.\");
                window.location = \"index.php\"
              </script>";
    }
}

?>
