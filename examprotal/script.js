$(document).ready(function(){
    $('#qust-section1').html("<div><img src='../images/Spinner-3.gif' width='50'/><p>Loading...</p></div>");

    $('#nav-timer').css('display','flex');
    var section1_no=0;
    var section2_no=0;
    let section1_equestions=Array();
    var section2_equestions=Array();
    var section1_tquestions=Array();
    var section2_tquestions=Array();
    var section1_options=Array();
    var section2_options=Array();
    var section1_correctanswer=Array();
    var section2_correctanswer=Array();
    var s1_questionnumber=Array();
    var s2_questionnumber=Array();
    var currentsection='section1';
    var totalquestion_section1 = 0;
    var totalquestion_section2 = 0;
    var opt_count=0;
    var section1_selectedOption=Array();
    var section2_selectedOption=Array();
    var button_backgroundcolor=Array();
    var selectedvalue=-1;
    var x=0;
    var userid = localStorage.getItem('userid');
    var username = localStorage.getItem('username');
    var startingtime = localStorage.getItem('startingtime');
    var answeredquestion = 0;

    if(userid==null || username==null || startingtime==null){
        console.log('hello');
        window.location.href = 'index.php';
    }
    var url = window.location.href;
    var params = (new URL(url)).searchParams;
    url_userid = parseInt(params.get('userid')); 

    console.log("Userid "+userid);

    if(url_userid != userid){
        console.log('hello');
        window.location.href = 'index.php';
    }
    $('#user_name_id').html(username);

    getAnsweredDetails_dummy();

    function getAllQuestions(){

        $.ajax({
            url: 'ajax_fetchSection1Questions.php',
            type: 'get',
            dataType: 'JSON',
            success: function(responses){
                
                responses.forEach(response => {
                    section1_equestions = response[0];
                    section1_tquestions = response[1];
                    section1_options = response[2];
                    section1_correctanswer = response[3];
                    s1_questionnumber = response[4];
                    totalquestion_section1 = section1_tquestions.length-1;
                });
                section1_Question(0);
                // $('#in-text-sidebar-section1').html("Section1 - Language (1 - "+(parseInt(totalquestion_section1)+1)+")");  
                
            }
        });

        $.ajax({
            url: 'ajax_fetchSection2Questions.php',
            type: 'get',
            dataType: 'JSON',
            success: function(responses){
                
                responses.forEach(response => {
                    section2_equestions = response[0];
                    section2_tquestions = response[1];
                    section2_options = response[2];
                    section2_correctanswer = response[3];
                    s2_questionnumber = response[4];
                    totalquestion_section2 = section2_tquestions.length-1;
                });
                // section2_Question(0);
                // $('#in-text-sidebar-section2').html("Section2 - General Science (101 - "+(parseInt(totalquestion_section2)+101)+")");

            }
        });
    }

    function getAnsweredDetails_dummy(){

        $.ajax({
            url:"ajax_fetchAnsweredQuestions.php",
            type:"post",
            data:{
                userid:userid
            },
            dataType:"JSON",
            success:function(responses){
              if(responses){
                responses.forEach(response => {
                    section1_selectedOption = response[0];
                    button_backgroundcolor = response[1];
                    getAllQuestions();
                    button_color();
                    find_the_numberofquestion_answered();
                });
              }else{
                alert("Failed to insert");
              }
            }
        });
    }
    
    function getAnsweredDetails(){

        $.ajax({
            url:"ajax_fetchAnsweredQuestions.php",
            type:"post",
            data:{
                userid:userid
            },
            dataType:"JSON",
            success:function(responses){
              if(responses){
                responses.forEach(response => {
                    section1_selectedOption = response[0];
                    button_backgroundcolor = response[1];
                    // button_color();
                });
              }else{
                alert("Failed to insert");
              }
            }
        });
    }
    
    function button_color(){

        for (var key of Object.keys(button_backgroundcolor)) {

            var k=parseInt(key);
            $('#btn_'+(k+1)).css('background-color', button_backgroundcolor[k]);
        }
    }
    function setRadio(selectqustno,section){
        x=setInterval(
            function radio(){
                if($(".radio_class").is(':checked')){

                    var newvalue = $('input[name="myRadios"]:checked').val();
                    if(section=='section1'){
                        if(selectedvalue!=undefined && newvalue!=selectedvalue){

                            console.log(selectqustno);
                            selectedvalue=newvalue;
                            clearInterval(x);
                            setRadio(selectqustno, 'section1');
                            section1_selectedOption[parseInt(selectqustno)]=selectedvalue;
                            button_backgroundcolor[parseInt(selectqustno)]='#38978C';
                            console.log(section1_selectedOption);

                            questionno = selectqustno;
                            answer = selectedvalue;
                            buttoncolor = '#38978C';
                            console.log('#38978C');
                            $('#btn_'+(selectqustno+1)).css('background-color', button_backgroundcolor[parseInt(selectqustno)]  );
                            answerStored_ajax(userid, questionno, answer, buttoncolor, 'update');
                            find_the_numberofquestion_answered();
                        }
                    }
                }
            },500
        );
    }

    function find_the_numberofquestion_answered(){
        var count=0;
        for (var key of Object.keys(section1_selectedOption)) {
            if(section1_selectedOption[key] != -1){
                count++
            }
        }
        answeredquestion = count;
        $('#answered').html(count);
        $('#nonanswered').html(100-count);
    }

    function answerStored_ajax(userid, questionno, answer, buttoncolor, status ){

        $.ajax({
            url:"ajax_answeredQuestion.php",
            type:"post",
            data:{
                userid:userid,
                questionno:questionno,
                answer:answer,
                buttoncolor:buttoncolor,
                status:status
            },
            dataType:"JSON",
            success:function(responses){
              if(responses){
                getAnsweredDetails();
              }else{
                alert("Failed to insert");
              }
            }
          });
    }

    var previousno1=0;
    var previousno2=0;

    function section1_Question(no){
        clearInterval(x);

        if(no==99){
            $('#saveandnext').css('display', 'none');
            $('#submitassesment').css('display', 'block');
        }else{
            $('#saveandnext').css('display', 'block');
            $('#submitassesment').css('display', 'none');
        }
        // var selectedvalue = $('input[name="myRadios"]:checked').val();
        // if(selectedvalue!=undefined){
        //     section1_selectedOption[parseInt(previousno1)]=selectedvalue;
        // }

        output  = "<div class='card question-card'>";

        output += "<div class='card-header question-box'>";
        output += "<p><span style='font-size:17px; font-weight:bold; padding:5px; text-transform:uppercase'>Question "+s1_questionnumber[no]+"</span></p>";
        output += "<p class='tamil-question'>"+section1_tquestions[no]+"</p>";
        output += "<p class='english-question'>"+section1_equestions[no]+"</p>"; 
        output += "</div>";

        output += "<div class='card-body option-box'>";
        output += "<ul>";
        section1_options.forEach((section1_option,i) => {
            output += "<li>";
            output += "<input type='radio' class='radio_class' name='myRadios' value="+i+" id=option_"+i+" />";
            output += "<label class='form-check-label' id='option_value' for='exampleRadios1'>"+section1_option[no]+"</label>";
            output += "</li>";
        });
        output += "</ul>";
        output += "</div>";
        output += "</div>";
        opt_count++;
        $('#qust-section1').html(output);
        
        selectedvalue=-1;
        setRadio(no,'section1');
        previousno1=no;

        if(section1_selectedOption[no]==undefined){

            questionno = no;
            answer=-1;
            buttoncolor = '#F54D5A';
            answerStored_ajax(userid, questionno, answer, buttoncolor, 'insert');
        }

        var value=section1_selectedOption[no];

        //option value change
        $("#option_"+value).prop("checked", true);

        //button color change
        if(button_backgroundcolor[no]==undefined){
            button_backgroundcolor[no]='#F54D5A';
        }
        $('#btn_'+(no+1)).css('background-color', button_backgroundcolor[no]);

        if(section1_selectedOption[no]==undefined){
            section1_selectedOption[no]=-1;
        }
    }
    
    function section2_Question(no){
        clearInterval(x);
        // var selectedvalue = $('input[name="myRadios"]:checked').val();
        // if(selectedvalue!=undefined){
        //     section2_selectedOption[parseInt(previousno2)]=selectedvalue;
        // }
        
        output  = "<div class='card question-card'>";

        output += "<div class='card-header question-box'>";
        output += "<p><span style='font-size:17px; font-weight:bold; padding:5px'>Question "+s2_questionnumber[no]+"</span></p>";
        output += "<p class='tamil-question'>"+section2_tquestions[no]+"</p>";
        output += "<p class='english-question'>"+section2_equestions[no]+"</p>"; 
        output += "</div>";

        output += "<div class='card-body option-box'>";
        output += "<ul>";
        section1_options.forEach((section2_option,i) => {
            output += "<li>";
            output += "<input type='radio' class='radio_class' name='myRadios' value="+i+" id=option1_"+i+" />";
            output += "<label class='form-check-label' for='exampleRadios1'>"+section2_option[no]+"</label>";
            output += "</li>";
        });
        output += "</ul>";
        output += "</div>";
        output += "</div>";
        
        $('#qust-section2').html(output);
        var number=parseInt(s2_questionnumber[no])-1;
        // selectedvalue=-1;
        setRadio(number, 'section1');
        
        if(section1_selectedOption[number]==undefined){

            questionno = number;
            answer=-1;
            buttoncolor = '#F54D5A';
            answerStored_ajax(userid, questionno, answer, buttoncolor, 'insert');
        }

        previousno2=no;

        var value=section1_selectedOption[number];
        console.log(section1_selectedOption);
        console.log("#option1_"+value, number);
        $("#option1_"+value).prop("checked", true);

        if(section1_selectedOption[number]==undefined){
            section1_selectedOption[number]=-1;
        }
    }

    //Next Questions

    function nextQuestion(){

        if(currentsection=='section1'){
            
            if(section1_no < totalquestion_section1){
                section1_no=section1_no+1;
                section1_Question(section1_no);
            }

        }else if(currentsection=='section2'){

            if(section2_no < totalquestion_section2){
                section2_no=section2_no+1;
                section2_Question(section2_no)
            }

        }
    }

    function previousQuestion(){

         if(currentsection=='section1'){
            
            if(section1_no > 0){
                section1_no=section1_no-1;
                section1_Question(section1_no);
            }

        }else if(currentsection=='section2'){
            
            if(section2_no > 0){
                section2_no=section2_no-1;
                section2_Question(section2_no);
            }
            
        }
    }
    
    $('#previous').click(function(){
        previousQuestion();
    });

    $('#saveandnext').click(function(){
        nextQuestion();
    });

    $('#section2').click(
        function(){

            currentsection='section2';
           
           $('#sidebar-section1').css('display','none');
           $('#sidebar-section2').css('display','block');

           $('.section1').css('display','none');
           $('.section2').css('display','flex');

           $('#section1-btn').css('display','none');
           $('#section2-btn').css('display','block');

           $('#section2').css('border','4px solid #056900');
           $('#section1').css('border','1px solid #056900');
           section2_Question(section2_no);
        //    firstquestionfetching('section2',101);
        }
    )

    $('#section1').click(
        function(){
            currentsection='section1';

           $('#sidebar-section1').css('display','block');
           $('#sidebar-section2').css('display','none');

           $('.section2').css('display','none');
           $('.section1').css('display','flex');

           $('#section2-btn').css('display','none');
           $('#section1-btn').css('display','block');

           $('#section1').css('border','4px solid #056900');
           $('#section2').css('border','1px solid #056900');
           section1_Question(section1_no);
        }
    );
    
    
   $("body").on("click",".qust_btn",function(event){    
       var id=$(this).attr('qust');
       var category=$(this).attr('category');
       var btnid=$(this).attr('id');

       console.log('btn_'+id,btnid);

       if(category=='section1'){

            section1_no = parseInt(id)-1;
            section1_Question(section1_no);

       }else if(category=='section2'){

            section2_no = parseInt(id)-1;
            section2_Question(section2_no);
        }
   });

   $('#submitassesment').click(function(){
       $('#submit_conformation').modal('show');
   });

   $('#close_submit').click(function(){
       $('#submit_conformation').modal('hide');
   });

   $('#proceed_submit').click(function(){

        console.log(section1_correctanswer);
        var mark=0;
        for(var i=0;i<section1_correctanswer.length;i++){

            if(section1_selectedOption[i]==section1_correctanswer[i]){
                mark++;
            }
        }
        console.log('Correct answer '+ mark);
        totalquestions = 100;
        answeredquestions = answeredquestion;
        $.ajax({
            url:"ajax_submission.php",
            type:"post",
            data:{
                userid:userid,
                username:username,
                mark:mark,
                totalquestions:totalquestions,
                answeredquestions:answeredquestions
            },
            dataType:"JSON",
            success:function(responses){
            if(responses){
               window.location.href='submission.php?userid='+userid;
            }else{
                alert("Failed to insert");
            }
            }
        });
   });

});