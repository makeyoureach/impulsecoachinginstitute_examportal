<?php
        require_once('../connection.php');
        $output='';
        $fail = '';
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $emailid = $_POST['email'];
        $mobilenumber = $_POST['mobilenumber'];
        $dateofbirth = $_POST['dateofbirth'];
        $district = $_POST['district'];
        $known = $_POST['known'];
        
        $query = "SELECT * FROM user_details WHERE mobilenumber = $mobilenumber  LIMIT 1";
        $result = mysqli_query($con, $query);
        $count=0;
        while($row = mysqli_fetch_array($result)){
             $count=1;
        }
        
        if($count == 0){

            $sql="Insert into user_details (username, gender, emailid, mobilenumber, dateofbirth, district, known ) 
            values('$username', '$gender', '$emailid', $mobilenumber, '$dateofbirth', '$district', '$known')";
    
            if (mysqli_query($con, $sql)) {
                // echo "New record created successfully";
                $output='success';
            } else {
                $fail='Connection Failed';
            }
        }else{
            
            $output = "Entered mobile number is an already registered. Kindly change it";
        }

    $data["success"]=$output;
    $data["fail"]=$fail;

    echo json_encode($data);
?>