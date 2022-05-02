<?php
    require_once('head.php');
    require_once('../connection.php');
    $userid = $_GET['userid'];

    $query = "SELECT * FROM submission_details WHERE userid = $userid LIMIT 1";
    $result = mysqli_query($con, $query);
    $count=0;
    $submission = -1;

    while($row = mysqli_fetch_array($result)){
        $count=1;
        $submission = $row['submittedstatus'];
    }

    if($submission != 1){
        die();
    }
    if($count == 0){
        die();
    }
?>
    <html>
        <head>
            <link rel="stylesheet" href="css/style.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

            <style>
                #submission_container{
                        width: 80%;
                    }
                @media only screen and (max-width: 768px) {
                    #submission_container{
                        width: 90%;
                    }
                }
            </style>
        </head>
        
        <body style="margin-top: 67px; display: flex; justify-content: center; align-items: center; width: 100%;">
            <div style="overflow: hidden;" id='submission_container' >
                <div class="alert alert-info" role="alert" style="text-align: center; font-weight: 500;">
                    Your MOCK exam has been submitted successfully.
                </div>

                <div>
                    <h5 style="margin: 30px; margin-left: 0;">RESULT SUMMARY</h5>
                    <div class="table-responsive" >
                        <table class="table align-middle">
                            <thead style="white-space: nowrap;">
                                <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">MARK</th>
                                <th scope="col">TOTAL QUESTION</th>
                                <th scope="col">ANSWERED QUESTION</th>
                                <th scope="col">STARTED TIME</th>
                                <th scope="col">SUBMITTED TIME</th>
                                </tr>
                            </thead>

                            <tbody style="white-space: nowrap;">
                                <tr>
                                    <?php
                                        require_once('head.php');
                                        require_once('../connection.php');
                                        date_default_timezone_set('Asia/Kolkata');

                                        $userid = $_GET['userid'];

                                        $query = "SELECT * FROM submission_details WHERE userid = $userid LIMIT 1";
                                        $result = mysqli_query($con, $query);
                                        $count=0;
                                        $submission = -1;

                                        while($row = mysqli_fetch_array($result)){

                                            $count=1;
                                            $start = date('H:i A', $row['startingtime']);
                                            $end = date('H:i A', $row['submittedtime']);
                                            
                                            $submission = $row['submittedstatus'];
                                            $str='<th scope="row" style="text-transform: uppercase;">'.$row['username'].'</th>';
                                            $str.= '<td>'.$row['mark'].'</td>';
                                            $str.= '<td>100</td>';
                                            $str.= '<td>'.$row['answeredquestions'].'</td>';
                                            $str.= '<td>'.$start.'</td>';
                                            $str.= '<td>'.$end.'</td>';
                                            echo $str;
                                        }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="alert alert-success" role="alert" style="text-align: center; font-weight: 500;">
                    If you want to know the rank list. Kindly vist our website
                    <a href="https://impulsecoachinginstitute.co.in/">https://impulsecoachinginstitute.co.in/</a>   
                </div>
            </div>
        </body>
        <script>
           var userid = localStorage.getItem('userid');
           var url = window.location.href;
            var params = (new URL(url)).searchParams;
            url_userid = parseInt(params.get('userid')); 

            console.log("Userid "+userid);
            
            if(url_userid != userid){
                console.log('hello');
                window.location.href = 'index.php';
            }
        </script>
</html>