    <?php
            require_once('head.php');
        ?>
        <html>
            <head>
                <link rel="stylesheet" href="css/style.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
                <script src='index_script.js'></script>   
                
                <style>
                    li{
                        padding: 10px;
  list-style-type: upper-roman;
                    }
                    #new_regfield{
                        color:#2790D9; font-weight: bold; text-transform: uppercase;
                    }
                    #signup_cont{
                         width:70%
                    }
                    #register_form{
                        display: none; justify-content: center; align-items: center;
                    }
                    #start_mock_con{
                    }
                    @media only screen and (max-width: 768px) {
                        #new_home_reg{
                            flex-direction: column;
                        }
                        #register_form{
                            padding: 5%;
                        }
                        #signup_cont{
                            width: 85%
                        }
                    }
                </style>
            </head>
            <body style="margin-top: 67px; overflow-x: hidden;">
                <div style="text-align: center; margin: 2%;">
                    <h5 style="color: #142C7E">REGISTER FOR MOCK TEST</h>
                </div>
                
                <div class='row' id="register_form">
                    <div class='col-md-5'>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" id="new_regfield">User name</label>
                            <input type="text"  class="form-control" id="username" aria-describedby="emailHelp">
                        </div>
                        
                        <div class="mb-3">
                            <div>
                            <label for="exampleInputEmail1" class="form-label" id="new_regfield">Gender</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" id="new_regfield">Email Id</label>
                            <input type="email"  class="form-control" id="emailid" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Kindly enter your valid emailid</div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" id="new_regfield">Mobile number</label>
                            <input type="text"  class="form-control" id="mobilenumber" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Kindly enter your valid mobile number</div>
                        </div>

                    </div>
                    <div class='col-md-5'>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" id="new_regfield">Date of birth</label>
                            <input type="date"  class="form-control" id="dateofbirth" aria-describedby="emailHelp">
                        </div>
                        
                        <label for="exampleInputEmail1" class="form-label" id="new_regfield">District</label>
                        <div class="mb-3">
                            <select id="district" className="form-control" required>
                                <option></option>
                                <option value='Ariyalur'>Ariyalur</option><option value='Chennai'>Chennai</option><option value='Coimbatore'>Coimbatore</option><option value='Cuddalore'>Cuddalore</option><option value='Dharmapuri'>Dharmapuri</option><option value='Dindigul'>Dindigul</option><option value='Erode'>Erode</option><option value='Kanchipuram'>Kanchipuram</option><option value='Kanyakumari'>Kanyakumari</option><option value='Karur'>Karur</option><option value='Krishnagiri'>Krishnagiri</option><option value='Madurai'>Madurai</option><option value='Nagapattinam'>Nagapattinam</option><option value='Namakkal'>Namakkal</option><option value='Nilgiris'>Nilgiris</option><option value='Perambalur'>Perambalur</option><option value='Pudukkottai'>Pudukkottai</option><option value='Ramanathapuram'>Ramanathapuram</option><option value='Salem'>Salem</option><option value='Sivaganga'>Sivaganga</option><option value='Thanjavur'>Thanjavur</option><option value='Theni'>Theni</option><option value='Thoothukudi'>Thoothukudi</option><option value='Tiruchirappalli'>Tiruchirappalli</option><option value='Tirunelveli'>Tirunelveli</option><option value='Tiruppur'>Tiruppur</option><option value='Tiruvallur'>Tiruvallur</option><option value='Tiruvannamalai'>Tiruvannamalai</option><option value='Tiruvarur'>Tiruvarur</option><option value='Vellore'>Vellore</option><option value='Viluppuram'>Viluppuram</option><option value='Virudhunagar'>Virudhunagar</option>
                            </select>
                            <div id="emailHelp" class="form-text">Provide a district you from</div>
                        </div>

                        <label for="exampleInputEmail1" class="form-label" id="new_regfield">How did you come to know about Impulse Coaching Institute?</label>
                        <div class="mb-3">
                            <select id="known" className="form-control" required>
                            <option ></option>
                            <option value="WhatsApp">WhatsApp</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Telegram">Telegram</option>
                            <option value="Impulse Students">Impulse Students</option>
                            <option value="Google">Google</option>
                            <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div style="text-align: center; display: none;" id='new_register_btn_cont'>
                    <div>
                        <p id='error_start' style="font-weight: 400; font-size: 18px;"></p>
                    </div>
                    <div>
                        <button class='btn btn-primary' id='new_register'>Register</button>
                    </div>
                    <hr/>
                    <div style='margin:20px; font-size: 18px;' >
                    If Already you register? <button style="margin-left: 20px;" class='btn btn-dark' id='exam_signup'>Sign Up</button>
                    </div>
                </div>

                <div class="row" style="display: flex; justify-content: center; align-items: center;" id='exam_start_container'>
                    <div class="col-md-6" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%;">
                        <div style="" id="signup_cont">
                        <div style="text-align: center;" id='new_register_btn_cont'>
                                
                                <div id='new_home_reg' style='margin:20px; display: flex; justify-content: center; align-items: centerd;'>
                                <p>CLICK TO REGISTER</p><button style="margin-left: 20px;" class='btn btn-dark' id='new_register_navigation'>New Register</button>
                                </div>
                            </div>
                            <div style="border: 2px black solid; padding: 20px;">
                                <h5 style="padding: 10px; padding-left: 0px;">SIGN UP</h5>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" style="color:#2790D9; font-weight: bold; text-transform: uppercase;"  class="form-label">Email Id</label>
                                    <input type="email"  class="form-control" id="registered_emailid" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Kindly enter your regiestered emailid</div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" style="color:#2790D9; font-weight: bold; text-transform: uppercase;" class="form-label">Mobile number</label>
                                    <input type="text"  class="form-control" id="registered_mobilenumber" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Kindly enter your regiestered mobile number</div>
                                </div>
                            </div>
                            </div>
                        
                    </div>

                    <div class="col-md-6" style="display: flex; justify-content: center; align-items: center; width: 100%; flex-direction: column;">
                        <div style="margin: 2%;">
                            <h5 style="text-transform: uppercase; padding: 10px;">Instruction</h5>
                        </div>
                        <div style="overflow-y: auto; width: 90%; height: 50vh; background-color: #F7F7F7 ; padding: 20px; border-radius: 20px;">
                        <ul>
                            <li>
                            Be sure to use an appropriate type attribute on all inputs l information) to take advantage of newer input controls like email verification, number selection, and more.
                            </li>
                            <li>
                            il address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                            </li>
                            <li>
                            Be sure  appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
                

                <div class='row' id='exam_start_btn_cont' id="start_mock_con" style=" padding: 30px; padding-bottom: 10px;display: flex; justify-content: center; align-items: center; width: 100%; flex-direction: column; margin: 2%;">
                        
                        <div id='error_log' style="font-weight: 400; font-size: 18px;">

                        </div>
                        <div class="mb-3 form-check" style="font-size: 18px;">
                            <input type="checkbox" class="form-check-input" id="check_point">
                            <label class="form-check-label" for="exampleCheck1">If you agree with all the instruction points, then fill your registered emailid and mobilenumber to start exam</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" id='start_mock' disabled>Start Exam</button>
                </div>
                
            </body>
        </html>