<?php
session_start();
ob_start();

include 'webapp/config.php';

if (isset($_REQUEST['request_demo_email']))  {
    $admin_email = "rajalakshmi612@gmail.com";
    $subject = "Request Demo - Myskoo";

    $email = $_REQUEST['request_demo_email'];
    $firstName = $_REQUEST['request_demo_name'];
    $mobile = $_REQUEST['request_demo_phone'];

    // Message
    $message =
        '<html>
<head>
  <title>Request Demo</title>
</head>
<body style="text-align:center; width: 70%; background-color:#d3d3d3; margin-top:10px; padding: 10px;">
    <table style="text-align: center; width: 70%;">
        <tr>
            <th colspan="2"><p><h3>Request Demo Details </h3></p></th>
        </tr>
        <tr>
            <th>Name </th>
            <td>' . $firstName . '</td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td>' . $mobile . '</td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td>' . $email . '</td>
        </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

//send email
    mail($admin_email, "$subject", $message, implode("\r\n", $headers));
    header("Location: aboutus.php?succ=1");
}
else{
    header("Location: aboutus.php?err=1");
}
?>

