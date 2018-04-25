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
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for($i=2;$i<=$arrayCount;$i++){
$SlNo = trim($allDataInSheet[$i]["A"]);
$userFirstName = trim($allDataInSheet[$i]["C"]);
$userLastName = trim($allDataInSheet[$i]["D"]);
$userGender = trim($allDataInSheet[$i]["E"]);
$userEmail = trim($allDataInSheet[$i]["F"]);
$userMobielCode = trim($allDataInSheet[$i]["G"]);
$userMobielNumber = trim($allDataInSheet[$i]["H"]);

$first_name = trim($allDataInSheet[$i]["C"]);
$middel_name = "";
$last_name = trim($allDataInSheet[$i]["D"]);
$gender = trim($allDataInSheet[$i]["E"]);

$country_code = trim($allDataInSheet[$i]["G"]);
$tel_phone_1 = trim($allDataInSheet[$i]["H"]);
$country_code1 = "";
$tel_phone_2 = "";

$reg_email = trim($allDataInSheet[$i]["F"]);
$pwd = time();

$institution_hospital = trim($allDataInSheet[$i]["I"]);
$office_address = trim($allDataInSheet[$i]["J"]);
$country = trim($allDataInSheet[$i]["N"]);
$reg_state = trim($allDataInSheet[$i]["L"]);
$reg_city = trim($allDataInSheet[$i]["K"]);
$pin_code = trim($allDataInSheet[$i]["M"]);


$delegate_plan = trim($allDataInSheet[$i]["B"]);

$delegate_fee = "";
$accompanying_person = "";
$per_person_charges = "";
$lt_member = "";
$lt_member_fee = "";
$total = $delegate_fee+$per_person_charges+$lt_member_fee;


$payment_request = "Offline";
$remarks = "BULK REGISTER";
$payment_mode = "Cash / Cheque / DD";
$check_no = "";
$check_date = "";
$amount = "";
$received_by = "Admin";
$comments = "BULK REGISTER";
$date_time = date("Y-m-d h:i:s");
$status = "1";
$email_status = "1";



if(!empty($SlNo))
{

$query = "SELECT reg_email FROM registration_master WHERE reg_email = '".$reg_email."'";
$sql = mysql_query($query);
$recResult = mysql_fetch_array($sql);
$existEmail = $recResult["reg_email"];
if($existEmail=="") {

$prefix="IIRSI2018_";
$last_registration_sql="SELECT COUNT(`id`) as registration_count FROM `registration_master` WHERE `registration_id`!='' AND `status`=1 ORDER BY registration_id DESC";
$last_registration_exe = mysql_query($last_registration_sql);
$last_registration_fetch = mysql_fetch_array($last_registration_exe);
$last_registration_value = $last_registration_fetch['registration_count'];
$new_registration_no = $last_registration_value+101;
$new_registration_value = $prefix.$new_registration_no;
$registration_id = $new_registration_value;
$lm_id = 0;	
$reg_no="None";


$registration_id = $new_registration_value;

$registration_sql="INSERT INTO `registration_master` (`lm_id`, `registration_id`, `first_name`, `middel_name`, `last_name`, `gender`, `country_code`, `tel_phone_1`, `country_code1`, `tel_phone_2`, `reg_email`, `pwd`, `office_address`, `institution_hospital`, `country`, `reg_state`, `reg_city`, `pin_code`, `delegate_plan`, `delegate_fee`, `accompanying_person`, `per_person_charges`, `lt_member`, `lt_member_fee`, `total`, `payment_request`, `remarks`, `payment_mode`, `check_no`, `check_date`, `amount`, `received_by`, `comments`, `date_time`, `status`, `email_status`) 

VALUES ('$lm_id', '$registration_id', '$first_name', '$middel_name', '$last_name', '$gender', '$country_code', '$tel_phone_1', '$country_code1', '$tel_phone_2', '$reg_email', '$pwd', '$office_address', '$institution_hospital', '$country', '$reg_state', '$reg_city', '$pin_code', '$delegate_plan', '$delegate_fee', '$accompanying_person', '$per_person_charges', '$lt_member', '$lt_member_fee', '$total', '$payment_request', '$remarks', '$payment_mode', '$check_no', '$check_date', '$amount', '$received_by', '$comments', '$date_time', '$status', '$email_status')";


$registration_exe = mysql_query($registration_sql);

if($registration_exe)
{
$registration_user_id = mysql_insert_id();

include_once('offline-registration-mail-confirmation.php');

} 

}
}
 
} 


header("Location: bulk-registration.php?success=1");
exit;
}
else
{
	
header("Location: bulk-registration.php?error=1");
exit;
}



/*
$user_id=$_SESSION['adminuserid'];
$username = $_SESSION['adminusername'];


$lm_id = $_REQUEST['lm_id'];
$registration_id = $_REQUEST['registration_id'];

$first_name = $_REQUEST['first_name'];
$middel_name = $_REQUEST['middel_name'];
$last_name = $_REQUEST['last_name'];
$gender = $_REQUEST['gender'];

$country_code = $_REQUEST['country_code'];
$tel_phone_1 = $_REQUEST['tel_phone_1'];
$country_code1 = $_REQUEST['country_code1'];
$tel_phone_2 = $_REQUEST['tel_phone_2'];

$reg_email = $_REQUEST['reg_email'];
$pwd = $_REQUEST['pwd'];

$institution_hospital = $_REQUEST['institution_hospital'];
$office_address = $_REQUEST['office_address'];
$country = $_REQUEST['country'];
$reg_state = $_REQUEST['reg_state'];
$reg_city = $_REQUEST['reg_city'];
$pin_code = $_REQUEST['pin_code'];

$delegate_plan = $_REQUEST['delegate_plan'];
$delegate_fee = $_REQUEST['delegate_fee'];
$accompanying_person = $_REQUEST['accompanying_person'];
$per_person_charges = $_REQUEST['per_person_charges'];
$lt_member = $_REQUEST['lt_member'];
$lt_member_fee = $_REQUEST['lt_member_fee'];
$total = $delegate_fee+$per_person_charges+$lt_member_fee;


$payment_request = "Offline";
$remarks = $_REQUEST['comments'];
$payment_mode = $_REQUEST['payment_mode'];
$check_no = $_REQUEST['check_no'];
$check_date = $_REQUEST['check_date'];
$amount = $_REQUEST['amount'];
$received_by = $_REQUEST['received_by'];
$comments = $_REQUEST['comments'];
$date_time = date("Y-m-d h:i:s");
$status = "1";
$email_status = "1";


if($lt_member=='Yes')
{
	$lm_prefix="LM/";
	$last_lm_sql="SELECT COUNT(`id`) as reg_count  FROM `iirsi_members` WHERE `reg_no`!='' AND `status`=1 ORDER BY reg_no DESC";
	$last_lm_exe = mysql_query($last_lm_sql);
	$last_lm_fetch = mysql_fetch_array($last_lm_exe);
	$last_lm_value = $last_lm_fetch['reg_count'];
	$new_lm_no = $last_lm_value+1;
	$new_lm_value = $lm_prefix.$new_lm_no;

	$reg_no = $new_lm_value;
		
	$lm_registration_sql="INSERT INTO `iirsi_members` (`reg_no`, `first_name`, `middel_name`, `last_name`, `gender`, `country_code`, `tel_phone_1`, `country_code1`, `tel_phone_2`, `reg_email`, `office_address`, `institution_hospital`, `country`, `reg_state`, `reg_city`, `pin_code`, `date_time`, `status`) 

	VALUES ('$reg_no', '$first_name', '$middel_name', '$last_name', '$gender', '$country_code', '$tel_phone_1', '$country_code1', '$tel_phone_2', 
	'$reg_email', '$office_address', '$institution_hospital', '$country', '$reg_state', '$reg_city', '$pin_code', '$date_time', '$status')";

	$lm_id=$reg_no;
	$lm_registration_exe = mysql_query($lm_registration_sql);

}
 

$prefix="IIRSI2018_";
$last_registration_sql="SELECT COUNT(`id`) as registration_count FROM `registration_master` WHERE `registration_id`!='' AND `status`=1 ORDER BY registration_id DESC";
$last_registration_exe = mysql_query($last_registration_sql);
$last_registration_fetch = mysql_fetch_array($last_registration_exe);
$last_registration_value = $last_registration_fetch['registration_count'];
$new_registration_no = $last_registration_value+101;
$new_registration_value = $prefix.$new_registration_no;
$registration_id = $new_registration_value;


if(!empty($lm_id))
{
		$lm_registration_sql="SELECT id,reg_no FROM `iirsi_members` WHERE `reg_no`='$lm_id'";
		$lm_registration_exe = mysql_query($lm_registration_sql);
		$lm_registration_cnt = @mysql_num_rows($lm_registration_exe);
		if($lm_registration_cnt>0)
		{
		$lm_registration_fetch = mysql_fetch_array($lm_registration_exe);	
		$lm_id=$lm_registration_fetch['id'];
		$reg_no=$lm_registration_fetch['reg_no'];
		}
		else
		{
		$lm_id = 0;	
		$reg_no="None";
		}
}
else
{
$lm_id = 0;	
$reg_no="None";
}



$registration_id = $new_registration_value;

$registration_sql="INSERT INTO `registration_master` (`lm_id`, `registration_id`, `first_name`, `middel_name`, `last_name`, `gender`, `country_code`, `tel_phone_1`, `country_code1`, `tel_phone_2`, `reg_email`, `pwd`, `office_address`, `institution_hospital`, `country`, `reg_state`, `reg_city`, `pin_code`, `delegate_plan`, `delegate_fee`, `accompanying_person`, `per_person_charges`, `lt_member`, `lt_member_fee`, `total`, `payment_request`, `remarks`, `payment_mode`, `check_no`, `check_date`, `amount`, `received_by`, `comments`, `date_time`, `status`, `email_status`) 

VALUES ('$lm_id', '$registration_id', '$first_name', '$middel_name', '$last_name', '$gender', '$country_code', '$tel_phone_1', '$country_code1', '$tel_phone_2', '$reg_email', '$pwd', '$office_address', '$institution_hospital', '$country', '$reg_state', '$reg_city', '$pin_code', '$delegate_plan', '$delegate_fee', '$accompanying_person', '$per_person_charges', '$lt_member', '$lt_member_fee', '$total', '$payment_request', '$remarks', '$payment_mode', '$check_no', '$check_date', '$amount', '$received_by', '$comments', '$date_time', '$status', '$email_status')";


$registration_exe = mysql_query($registration_sql);

if($registration_exe)
{
$registration_user_id = mysql_insert_id();

include_once('offline-registration-mail-confirmation.php');

header("Location: view-registration.php?id=$registration_user_id&success=1");
}
else
{
header("Location: add-registration.php?error=1");
}
*/
?>