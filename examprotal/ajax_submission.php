<?php

    require_once('../connection.php');

    $output='';
    $fail = '';
    $return_arr=array();

    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $submittedtime = time();
    $submittedstatus = 1;
    $mark = $_POST['mark'];
    $answeredquestions = $_POST['answeredquestions'];
    $totalquestions = $_POST['totalquestions'];

    $sql="UPDATE submission_details SET submittedtime = '$submittedtime', submittedstatus = $submittedstatus, mark = $mark, 
    totalquestions = $totalquestions, answeredquestions = $answeredquestions WHERE userid = $userid ";
    
    if (mysqli_query($con, $sql)) {
        $output = 'updated';
    } else {
        $fail='failed';
    }

    $data["success"]=$output;
    $data["fail"]=$fail;

    echo json_encode($data);
?>