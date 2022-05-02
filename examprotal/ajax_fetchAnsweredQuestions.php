<?php

$return_arr = array();
$query='';

// if(isset($_POST['id']) && isset($_POST['category'])){
    require_once ('connection.php');

    $userid = $_POST['userid'];
    $query = "select * from question_details ck where userid = $userid";
    $result = mysqli_query($con, $query);
    
    $questionsanswer=array();
    $buttonscolor=array();

    while($row = mysqli_fetch_array($result)){

        $questionsanswer[$row['questionno']] = $row['answer'];
        $buttonscolor[$row['questionno']] = $row['buttoncolor'];
    }
    $return_arr[] = array( $questionsanswer, $buttonscolor );
// Encoding array in JSON format
echo json_encode($return_arr);