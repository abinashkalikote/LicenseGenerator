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
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: lightgray;
}

.container_top{
        position: absolute;
        z-index: 200;
        width: 100vw;   
        background-color: lightgray;
    }

form {
    height: 300px;
    width: 400px;
}

.form-control {
    text-transform: capitalize;
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
        <form action="./generateLic.php" method="post" class="card p-3" autocomplete="off">
            <div class="card-header">
                <b>BTS</b> License Generator
            </div>

            <?php 

                if(isset($_SESSION['licensecreated'])){
                    echo '<div class="text-info text-center" id="lic-alert">'.$_SESSION['licensecreated'].'</div>';
                    unset($_SESSION['licensecreated']);
                }

            ?>


            <div class="card-body">
                <div class="mb-3">
                    <label for="orgname" class="form-label">Organization Name</label>
                    <input type="text" class="form-control" id="orgname" name="orgname" placeholder="Ogranization Name"
                        required="required" title="Organization Name">
                </div>
                <div class="mb-3">
                    <label for="validupto" class="form-label">Valid Upto (YYYY/MM/DD)</label>
                    <input type="text" class="form-control" id="validupto" minlength="10" maxlength="10"
                        name="validupto" placeholder="Valid Upto" required="required" title="License Valid Date upto">
                </div>
                <div class="mb-3 d-grid">
                    <button type="submit" name="generatelic" class="btn btn-primary">Generate</button>
                </div>
            </div>
        </form>
    </div>
</body>

<!-- nepali date nepaliDatePicker -->
<script>
$("#validupto").nepaliDatePicker({
    dateFormat: "YYYY/MM/DD",
    ndpYear: true,
    ndpMonth: true,
    disableBefore: "2076/01/01",
    language: "english"
});
</script>

<script>
$(document).ready(() => {
    setTimeout(() => {
        $("#lic-alert").hide("slow");
    }, 5000);

    setTimeout(() => {
        $("#lic-alert").remove();
    }, 8000);
});
</script>

</html>