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

        if($submission == 1){
            echo "<script>location.href='submission.php?userid=".$userid."'</script>";
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
            <script src='script.js'></script>   
            
            <style>
                .btn-bar{
                    background-color: #E3EEEE;
                    height: 92.3vh;
                    /* display: none; */
                }
                .qust_btn{
                    background-color: #E2DDD6;
                    padding:8px; 
                    width: 45px; 
                    margin:5px; 
                    border-radius: 5px;
                    cursor: pointer;
                }
                .heading-scroll{
                    /* background-color: #476EAE; */
                    padding: 10px;
                }
                .question-bar{
                    /* background-color: red; */
                    /* height: 100vh; */
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    height: 60vh;
                }
                .question-card{
                    width: 90%;
                    /* height: 70vh; */
                }
                .section-nav{
                    display: flex; 
                    width:100%;
                    /* padding: 3%; */
                }
                .button-nav{
                    padding: 30px;
                    text-align: center;
                    width: 100%;
                    margin-top: 10px;
                    /* height: 5vh; */
                }
                .options{
                    margin-left: 12px;
                }
                li{
                    list-style: none;
                    text-decoration: none;
                    padding: 5px;
                }
                .question-box{
                    /* height: 20vh; */
                    /* min-height: 20vh; */
                    max-height: 35vh;
                    overflow-x: auto;
                    font-size: 18px;
                }
                .option-box{
                    /* height: 10%; */
                    /* max-height: 20vh; */
                }
                .timer{
                    display: flex; 
                    justify-content: end; 
                    align-items: center; 
                    margin-right: 4px; 
                    padding: 10px; 
                    height: 6vh;
                    font-size:18px;
                }
                .side-section{
                    /* padding: 5px; */
                }
                .question-btns{
                    margin-top: 36px;
                    overflow-x: auto; 
                    height:55vh;
                }
                .section_btn1{
                    border-radius: 2px; 
                    padding: 5px; 
                    background-color: #38978C; 
                    color: white;
                    font-size: 15px;
                    border: 2px solid #056900;
                    cursor: pointer;
                }
                .section_btn2{
                    border-radius: 2px; 
                    padding: 5px; 
                    font-size: 15px;
                    background-color: #4B9255; 
                    color: white;
                    cursor: pointer;
                }
                .second-nav{
                    padding: 10px;
                }
                .radio_class{

                }
                #option_value{
                    padding-left: 10px;
                }
                /* @media (max-width: 760px) { 
                    .btn-bar{
                        height: auto;
                    }
                } */
                #qust-section1{
                    margin-top: 30px;
                }

                @media only screen and (max-width: 768px) {
                    .question-box{
                    /* height: 20vh; */
                    /* min-height: 20vh; */
                       max-height: 40vh;
                    }
                    .button-nav{
                        margin-top: 50px;
                    }
                    .btn-bar{
                        height: auto;
                        margin-top: 20px;
                    }
                    #qust-section1{
                        margin-top: 70px;
                    }
                    .question-card{
                    width: 95%;
                    /* height: 70vh; */
                }
                }
            </style>
        </head>
        
        <body style="margin-top: 67px;">
            <div style="overflow: hidden;" id='view_container'>
                
                <div class="row">
                    <div class="col">
                       <div class="second-nav">
                            <div class="heading-scroll" style="text-transform: uppercase;">
                                <marquee direction="left"><h6>*** Mock test for TNPSC Group 4 examination ***</h6></marquee>
                            </div>
                            <div class="section-nav" >
                                <div style="width:100%; display:flex; justify-content: center; align-items: center;">
                                    <button class="section_btn1" id="section1" style="text-transform: uppercase;">Language - English</button>
                                </div>
                                <div style="width:50%; display:none; justify-content: center; align-items: center;">
                                    <button class="section_btn2" id="section2" style="text-transform: uppercase;">General Science</button>
                                </div>
                            </div>
                       </div>
                       
                        <div class='question-bar section1' id="qust-section1" style="font-size: 18px;">
                            <div class="card question-card">
                                
                            </div>
                        </div>

                        <div class='question-bar section2' id="qust-section2" style="display: none;">
                            <div class="card question-card">
                                
                            </div>
                        </div>
                        
                        <div class="button-nav">
                            <button class="btn btn-primary" style="float: left;" id="previous">Previous</button>
                            <button class="btn btn-primary"  style="float: right;" id="saveandnext">Save and Next</button>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float: right; display: none;" id="submitassesment">Submit</button>
                        </div>

                    </div>
                    <div class="col-md-3 btn-bar" >

                        <div class="side-section" id="sidebar-section" style="text-transform: uppercase;">
                            <h6 id="in-text-sidebar-section1" style="text-transform: uppercase; text-align: center; padding: 10px; padding-bottom: 0px;">
                                Section1 - Language
                            </h6>
                            <div style="display: flex; justify-content: center; align-items: center; padding: 20px; padding-bottom: 0px;">
                                <table class="table table-striped" style="background-color: white;">
                                    <tbody>
                                        <tr >
                                            <td style="padding: 5px;"><h6>Total Questions :</h6></td>
                                            <td style="padding: 5px;" id='totalquestion'>100</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px;"><h6>Answered :</h6></td>
                                            <td style="padding: 5px;" id='answered'>---</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px;"><h6>Not Answered :</h6></td>
                                            <td style="padding: 5px;" id='nonanswered'>---</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="question-btns" id="section1-btn">
                            <?php
                                require_once('../connection.php');
                                $sql="select count(id) as count from tnpsc_section1;";
                                $res=$con->query($sql);
                                $count=0;
                                while($row=$res->fetch_assoc()){
                                    $count=$row["count"];
                                }
                                $str='';
                                for($i=1;$i<=$count;$i++){
                                    echo "<button id='btn_".$i."' qust=$i class='qust_btn' category='section1'>$i</button>";
                                }
                                
                            ?>
                        </div>

                        <div class="question-btns" id="section2-btn" style="display: none;">
                            <?php
                                require_once('../connection.php');
                                $sql="select count(id) as count from tnpsc_section2;";
                                $res=$con->query($sql);
                                $count=0;
                                while($row=$res->fetch_assoc()){
                                    $count=$row["count"];
                                }
                                $str='';
                                for($i=1;$i<=$count;$i++){
                                    $q=$i+100;
                                    echo "<button id='btn_'$q qust=$i class='qust_btn' category='section2'>$q</button>";
                                }
                            ?>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Modal to submit -->
            <div class="modal fade" id="submit_conformation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Submit the assesment</h5>
                </div>
                <div class="modal-body">
                    Do you want to SUBMIT the assesment conform, then click proceed to continue.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id='close_submit'>Close</button>
                    <button type="button" class="btn btn-primary" id='proceed_submit'>Proceed</button>
                </div>
                </div>
            </div>
            </div>
        </body>
        <script>
            function handleChange(s){
                console.log("ANNY");
            }
        </script>
    </html>