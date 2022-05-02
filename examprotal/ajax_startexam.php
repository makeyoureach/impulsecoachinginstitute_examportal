<?php
        require_once('../connection.php');
        $output='';
        $fail = '';

        $emailid = $_POST['email'];
        $mobilenumber = $_POST['mobilenumber'];

        $userid;
        $username = '';
        $startingtime = time();
        $submittedstatus = 0;
        $comment = 'started';

        $query = "SELECT * FROM user_details WHERE mobilenumber = $mobilenumber  and emailid = '$emailid' LIMIT 1";
        $result = mysqli_query($con, $query);
        $count=0;

        while($row = mysqli_fetch_array($result)){
             $count=1;
             $userid = $row['id'];
             $username = $row['username'];
        }
        
        if($count == 1){
            
            $query = "SELECT * FROM submission_details WHERE userid = $userid LIMIT 1";
            $result = mysqli_query($con, $query);
            $count=0;

            while($row = mysqli_fetch_array($result)){
                $count=1;
                $data["startingtime"]=$row['startingtime'];
            }

            $data["userid"]=$userid;
            $data["username"]=$username;
            
            
            if($count ==  0){
                $sql="Insert into submission_details (userid, username, startingtime, submittedstatus, comment ) 
                values( $userid, '$username', '$startingtime', $submittedstatus, '$comment' )";
                
                if (mysqli_query($con, $sql)) {
                    // echo "New record created successfully";
                    $data["startingtime"]=$startingtime;
                    $output='success';
                } else {
                    $fail='Connection Failed';
                }
            }else{
                $output='success';
            }
            
        }else{
            $output = "Invalid credential. Kindly check it";
        }

    $data["success"]=$output;
    $data["fail"]=$fail;

    echo json_encode($data);
?>