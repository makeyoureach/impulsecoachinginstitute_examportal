<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
} */
</style>
</head>
<body>

<span id="demo"></span>

<script>
// Set the date we're counting down to
var localhosttime = localStorage.getItem('startingtime');
var currentDateObj = new Date(parseInt(localhosttime)*1000);
var numberOfMlSeconds = currentDateObj.getTime();
var addMlSeconds = 60 * 60 * 1000 * 1;

var countDownDate = new Date(numberOfMlSeconds + addMlSeconds).getTime();
// var countDownDate = new Date("Apr 9, 2022 13:00:00").getTime();
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = "<span style='color:red; font-size:18px;'>"+ hours + "h "
  + minutes + "m " + seconds + "s </span>";
  // If the count down is over, write some text 
  if (distance<0) {
    clearInterval(x);
    $('#proceed_submit').trigger('click');
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

</body>
</html>
