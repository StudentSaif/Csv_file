<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaying data</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <body>
        <div class="container">
            <div class="table-container">
                <div class="title">
                    <h1>ALL RECORDS</h1>
                </div>

                <div class="add-new">
                    <form action="export.php" method="post">
                        <button class="btn btn-info" name="export">Export File</button>
                    </form>
                </div>


                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Sir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        header('Content-Type: text/html; charset=utf-8');
                        include("connection.php");

                        $sql = "SELECT * FROM csv_details";
                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            echo "" . mysqli_error($conn);
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone_number']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['ankit_sir']; ?></td>
                                </tr>

                        <?php

                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>

</html>