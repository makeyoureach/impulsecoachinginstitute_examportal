<?php
require_once('../connection.php');

    if(empty($_POST["submit_file"]))
    {
        //  // Redirect browser
        //  header("Location: http://localhost/impulse/v1/examprotal/sme.php");
        //  exit;
    }else{
        $file = $_FILES["file"]["tmp_name"];
        $file_open = fopen($file,"r");
        $count=0;
        // echo $con;
        $section=$_POST["section"];
        $table = '';
 
        if($section=='section1'){
            $table='tnpsc_section1';
        }else if($section=='section2'){
            $table='tnpsc_section2';
        }

        if($table!=''){

            $sql = "truncate table ".$table;

            if (mysqli_query($con, $sql)) {
                while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
                {
                    if($count>=1){
                        
                        $sno = $csv[0];
                        $englishquestion = $csv[1];
                        $tamilquestion = $csv[2];
                        $option1 = $csv[3];
                        $option2 = $csv[4];
                        $option3 = $csv[5];
                        $option4 = $csv[6];
                        $option5 = $csv[7];
                        $option6 = $csv[8];
                        $answer = $csv[9];
                        
                    $sql="Insert into $table (questionno, englishquestion, tamilquestion, option1, option2, option3, option4, option5, option6, correctanswer) values($sno, '$englishquestion', '$tamilquestion', '$option1', '$option2', '$option3', '$option4', '$option5', '$option6', $answer)";
                        if (mysqli_query($con, $sql)) {
                            echo "New record created successfully";
                        } else {
                            // echo "Error: " . $sql . "<br>" . mysqli_error($con);
                        }
                        echo "<br />";
                        echo "<br />";
                    }
                    $count++;
                }
                // Redirect browser
                header("Location: http://localhost/impulse/v1/examprotal/sme.php");
                exit;
            } else {
            // echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }else{
            echo "Table Not Found";
        }
    }
?>