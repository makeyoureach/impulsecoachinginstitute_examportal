<?php
        require_once('../connection.php');

        $output='';
        $fail = '';
        $return_arr=array();
        $userid = $_POST['userid'];
        $questionno = $_POST['questionno'];
        $answer = $_POST['answer'];
        $buttoncolor = $_POST['buttoncolor'];
        $status = $_POST['status'];

        if($status=='insert'){
            $sql="Insert into question_details (userid, questionno, answer, buttoncolor ) 
            values( $userid, $questionno, $answer, '$buttoncolor' )";
            
            if (mysqli_query($con, $sql)) {
                $output = 'Insert sucessfully';
            } else {
                $fail='Failed to insert';
            }
        }else if($status=='update'){
            $sql="UPDATE question_details SET answer = $answer, buttoncolor = '$buttoncolor'
             WHERE userid = $userid and questionno= $questionno";
            
            if (mysqli_query($con, $sql)) {
                $output = 'Update sucessfully';
            } else {
                $fail='Failed to update';
            }
        }
        
    $data["success"]=$output;
    $data["fail"]=$fail;

    echo json_encode($return_arr);
?>