<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>License Generator</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <script src="./assets/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./assets/css/datepicker.css">
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/datepicker.js"></script>
</head>

<style>
.container_center {
    height: auto;
    background-color: lightgray;
}

.container_top{
        position: sticky;
        top:0;
        z-index: 200;
        width: 100vw;   
        height: auto;
        /* background-color: lightgray; */
    }
</style>

<body>

    <div class="container_top bg-dark">
        <div class="btn-group m-2 bg-dark">
            <a href="./index.php" class="btn btn-primary">Create License</a>
            <a href="./viewLic.php" class="btn btn-primary">View License</a>
        </div>
    </div>

    <div class="container_center">
        <table class="table table-striped bg-default">
            <tr>
                <th>SN</th>
                <th>Organization Name</th>
                <th>Valid Upto</th>
                <th>License</th>
                <th>Created Date</th>
            </tr>

            <?php
                require("./constants/conn.constant.php");
                $result = $conn->query("SELECT * FROM license ORDER BY `ID` DESC");
                if($result->num_rows > 0){
                    $i = 1;
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>".$i."</td>
                            <td>".$row['orgName']."</td>
                            <td>".$row['validUpto']."</td>
                            <td>".$row['license']."</td>
                            <td>".$row['recDate']."</td>
                        </tr>";
                        $i++;
                    }
                    
                }else{
                    echo "<tr><td colspan='5'>No records found!</td></tr>";
                }
            ?>  
        </table>
    </div>


</body>
</html>