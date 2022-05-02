$(document).ready(function(){
    $('#section2').click(
        function(){
           $('.section1').css('display','none');
           $('.section2').css('display','flex');
           $('#section2').css('background-color','blue');
           $('#section1').css('background-color','grey');
        }
    )

    $('#section1').click(
        function(){
           $('.section2').css('display','none');
           $('.section1').css('display','flex');
           $('#section1').css('background-color','blue');
           $('#section2').css('background-color','grey');
        }
    );

   $("body").on("click",".qust_btn",function(event){
      
       var id=$(this).attr('id');
       var category=$(this).attr('category');
       

       var qty=1;

       $.ajax({
       url:"ajax_mockquestions.php",
       type:"post",
       data:{
           id:id,
           category:category
       },
       dataType:"JSON",
       success:function(res){
           if(res){
             console.log("hello");
           }else{
           alert("Failed Try Again");
           }
       }
       });
       console.log(id, category);
   });

});