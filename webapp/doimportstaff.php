<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";


$uploadedStatus = 0;

if ( isset($_POST["submit"]) ) {
    if ( isset($_FILES["file"])) {
//if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else {
            if (file_exists($_FILES["file"]["name"])) {
                unlink($_FILES["file"]["name"]);
            }
            $storagename = 'import/'.time()."_bulk.xlsx";
            move_uploaded_file($_FILES["file"]["tmp_name"],  $storagename);
            $uploadedStatus = 1;
        }
    } else {
        echo "No file selected <br />";
    }
}

if($uploadedStatus==1) {

    /************************ YOUR DATABASE CONNECTION END HERE  ****************************/


    set_include_path(get_include_path() . PATH_SEPARATOR . 'import/Classes/');
    include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
    $inputFileName = $storagename;

    try {
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    } catch (Exception $e) {
        die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
    }


    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
    $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


    for ($i = 2; $i <= $arrayCount; $i++) {
        $SlNo = trim($allDataInSheet[$i]["A"]);
        $firstName = trim($allDataInSheet[$i]["B"]);
        $lastName = trim($allDataInSheet[$i]["C"]);
        $email = trim($allDataInSheet[$i]["D"]);
        $jobType = trim($allDataInSheet[$i]["E"]);
        $jobPosition = trim($allDataInSheet[$i]["F"]);
        $dob = trim($allDataInSheet[$i]["G"]);
        $gender = trim($allDataInSheet[$i]["H"]);
        $address = trim($allDataInSheet[$i]["I"]);
        $cityId = trim($allDataInSheet[$i]["J"]);
        $mobile = trim($allDataInSheet[$i]["K"]);

        $pwd = md5('123456');
        $username = $_SESSION['adminusername'];
        $user_id=$_SESSION['adminuserid'];
        $date = date("Y-m-d");
        $uName = $firstName . $lastName;

        if (!empty($SlNo)) {
            $sql = "INSERT INTO `users` (name, email, password, confirmed, delete_status, created_at, updated_at) VALUES ('$uName','$email','$pwd','0','1','$date','$date')";
            $exe = mysql_query($sql);
            $last_id = mysql_insert_id();

            $s = "INSERT INTO `role_user` (user_id, role_id) values ('$last_id', 4)";
            $e = mysql_query($s);

            $insert_staff_sq1 = "INSERT INTO `staff_info` (user_id, school_id, firstname_person, lastname_person,job_type,job_position,dob,gender,address, city, mobile, email, photo, created_by, updated_by, created_at, updated_at)
VALUES ('$last_id', '$user_id', '$firstName','$lastName','$jobType', '$jobPosition', '$dob','$gender','$address','$cityId','$mobile','$email','$target','$username','$username','$date','$date')";
            $insert_staff_exe = mysql_query($insert_staff_sq1);
        }
    }

        header("Location: staff.php?import=1");
        exit;
}
else
{
    header("Location: import-staff.php?error=1");
    exit;
}
?>