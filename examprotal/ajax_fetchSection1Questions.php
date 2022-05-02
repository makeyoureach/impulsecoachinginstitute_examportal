<?php

$return_arr = array();
$query='';

// if(isset($_POST['id']) && isset($_POST['category'])){
    require_once ('connection.php');
    // if( $category == 'section1' ){
        $query = "select * from tnpsc_section1 ck";
    // }

    $result = mysqli_query($con,$query);
    
    $englishquestions=array();
    $tamilquestions=array();
    $option1=array();
    $option2=array();
    $option3=array();
    $option4=array();
    $option5=array();
    $option6=array();
    $answer=array();
    $questionno=array();
    while($row = mysqli_fetch_array($result)){
        $englishquestions[]=$row['englishquestion'];
        $tamilquestions[]=$row['tamilquestion'];
        $option1[]=$row['option1'];
        $option2[]=$row['option2'];
        $option3[]=$row['option3'];
        $option4[]=$row['option4'];
        $option5[]=$row['option5'];
        $option6[]=$row['option6'];
        $answer[]=$row['correctanswer'];
        $questionno[]=$row['questionno'];
    }
    $return_arr[] = array($englishquestions, $tamilquestions, array($option1, $option2, $option3, $option4, $option5), $answer, $questionno);
// }

// Encoding array in JSON format
echo json_encode($return_arr);