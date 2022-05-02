$(document).ready(function(){

    $('#check_point').click(function(){
        if($("#check_point").is(':checked')){
            document.getElementById("start_mock").disabled = false;
        }else{
            document.getElementById("start_mock").disabled = true;
        }
    });

    $('#new_register').click(function(){

        var username=document.getElementById("username").value;
        var email=document.getElementById("emailid").value;
        var gender = $('input[name="gender"]:checked').val();
        var mobilenumber=document.getElementById("mobilenumber").value;
        var dateofbirth=document.getElementById("dateofbirth").value;
        var district=document.getElementById("district").value;
        var known=document.getElementById("known").value;
        console.log(username, email, gender, mobilenumber, dateofbirth, district, known);

        if(username!='' && email!='' && gender!='' && mobilenumber && dateofbirth!='' && district!=''
        && known!=''){
            $.ajax({
                url:"login.php",
                type:"post",
                data:{
                    username:username,
                    email:email,
                    gender:gender,
                    mobilenumber:mobilenumber,
                    dateofbirth:dateofbirth,
                    district:district,
                    known:known
                },
                dataType:"JSON",
                success:function(res){
                  if(res.success == 'success'){
                    
                    $('#error_start').html("<p style='color:green'>Exam start successfully</p>");
                    document.getElementById("username").value='';
                    document.getElementById("emailid").value='';
                    $('#male').prop('checked',false);
                    $('#female').prop('checked',false);
                    document.getElementById("mobilenumber").value='';
                    document.getElementById("dateofbirth").value='';
                    document.getElementById("district").value='';
                    document.getElementById("known").value='';
                    $('#register_form').css('display','none');
                    $('#new_register_btn_cont').css('display','none');
                    $('#exam_start_container').css('display','flex');
                    $('#exam_start_btn_cont').css('display','flex');

                  }else{
                    $('#error_start').html("<p style='color:red'>"+res.success+"</p>");
                  }
                }
              });
        }else{
            $('#error_start').html("<p style='color:red'>Kindly filled the all fields</p>");
        }
    });

    $('#exam_signup').click(function(){
        $('#register_form').css('display','none');
        $('#new_register_btn_cont').css('display','none');
        $('#exam_start_container').css('display','flex');
        $('#exam_start_btn_cont').css('display','flex');
    });

    $('#new_register_navigation').click(function(){
        $('#register_form').css('display','flex');
        $('#new_register_btn_cont').css('display','block');
        $('#exam_start_container').css('display','none');
        $('#exam_start_btn_cont').css('display','none');
    });

    $('#start_mock').click(function(){

        var email=document.getElementById("registered_emailid").value;
        var mobilenumber=document.getElementById("registered_mobilenumber").value;

        if(email!='' && mobilenumber){
            $.ajax({
                url:"ajax_startexam.php",
                type:"post",
                data:{
                    email:email,
                    mobilenumber:mobilenumber
                },
                dataType:"JSON",
                success:function(res){
                  if(res.success == 'success'){
                      
                    localStorage.removeItem("userid");
                    localStorage.removeItem("username");
                    localStorage.removeItem("startingtime");

                    localStorage.setItem('userid', res.userid);
                    localStorage.setItem('username', res.username);
                    localStorage.setItem('startingtime', res.startingtime);

                    window.location.href = "view.php?userid="+res.userid;

                  }else{
                    $('#error_log').html("<p style='color:red'>"+res.success+"</p>");
                  }
                }
              });
        }else{
            $('#error_log').html("<p style='color:red'>Kindly filled the all fields</p>");
        }
    });

});