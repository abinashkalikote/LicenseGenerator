<?php
    session_start();
    require('./constants/conn.constant.php');
 ?>
<?php

if(isset($_POST['generatelic'])){
    $orgname = $_POST['orgname'];
    $validupto = $_POST['validupto'];
    
    $data = strip_tags($orgname).'@'.$validupto;
    $chiper = "AES-128-CBC";
    $key = "BTSLIC@123456@Forever**&&^^";
    $options = 0;
    $iv = "IISLOVECODINGPHP";
    $lic = openssl_encrypt($data, $chiper, $key, $options, $iv);

    $result = $conn->query("INSERT INTO `license` (`orgName`, `validUpto`, `license`) VALUES ('$orgname', '$validupto', '$lic')");
    if($result){
        $_SESSION['licensecreated'] = "License Created Successfully";
        header('location: ./');
    }else{
        echo "Something Went Wrong";
    }


}

?>