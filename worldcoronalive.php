<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php  include 'links.php'; ?>
    <?php include 'style.php'; ?>
</head>
<body onload="fetch()">
<nav class="navbar navbar-expand-lg nav_style p-3">
  <a class="navbar-brand pl-5" href="#">COVID-19</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto  pr-5">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="index.php#aboutid">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php#sympid">Symptoms</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php#preventid">Prevention</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="indiacoronalive.php">IndiaCoronaLive</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indiadaywise.php">IndiaDayWiseReport</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="index.php#contactid">Contact</a>
      </li> -->
    </ul>
  </div>
</nav>

<!-- *********************** corona latest updates *********** -->
<section class="corona_update container-fluid">
<div class="my-3">
    <h3 class="text-uppercase text-center">COVID-19 LIVE UPDATES OF THE WORLD</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped text-center" id="tbval">
        <tr>
            <th>Country</th>
            <th>TotalConfirmed</th>
            <th>TotalRecovered</th>
            <th>TotalDeaths</th>
            <th>NewConfirmed</th>
            <th>NewRecovered</th>
            <th>NewDeaths</th>
        </tr>
    </table>
</div>
</div>
</section>










<!---- ////////////////// top cursor ///////////// -->

<div class="container scrolltop float-right pr-5">
    <i class="fa fa-arrow-up" onclick="topFunction()" id="myBtn"></i>
</div>


<!--//////////////Footer///////////////////////-->
<footer class="mt-5">
    <div class="footer_style text-white text-center container-fluid">
        <p>copyright by Arham</p>
    </div>

</footer>
<script type="text/javascript">

$('.count').counterUp({
    delay:10,
    time:3000
})


mybutton = document.getElementById("myBtn");
//When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}
//when the user clicks on the button, scroll to the top of the document 
function topFunction() {
document.body.scrollTop = 0; //for safari
document.documentElement.scrollTop=0; //for chrome, Firefox and, IE
}

function fetch(){
    $.get("https://api.covid19api.com/summary",
    
    function(data){
      //  console.log(data['Countries'].length);
      var tbval = document.getElementById('tbval');
      for(var i=1; i<(data['Countries'].length);i++){
          var x = tbval.insertRow();
          x.insertCell(0);

          tbval.rows[i].cells[0].innerHTML = data['Countries'][i-1]['Country'];
          tbval.rows[i].cells[0].style.background = '#7a4a91';
          tbval.rows[i].cells[0].style.color = '#ffffff';
          
          x.insertCell(1);
          tbval.rows[i].cells[1].innerHTML = data['Countries'][i-1]['TotalConfirmed'];
          tbval.rows[i].cells[1].style.background = '#4bb7d8';

          x.insertCell(2);
          tbval.rows[i].cells[2].innerHTML = data['Countries'][i-1]['TotalRecovered'];
          tbval.rows[i].cells[2].style.background = '#4bb7d8';

          x.insertCell(3);
          tbval.rows[i].cells[3].innerHTML = data['Countries'][i-1]['TotalDeaths'];
          tbval.rows[i].cells[3].style.background = '#f36e23';

          x.insertCell(4);
          tbval.rows[i].cells[4].innerHTML = data['Countries'][i-1]['NewConfirmed'];
          tbval.rows[i].cells[4].style.background = '#4bb7d8';

          x.insertCell(5);
          tbval.rows[i].cells[5].innerHTML = data['Countries'][i-1]['NewRecovered'];
          tbval.rows[i].cells[5].style.background = '#9cc850';

          x.insertCell(6);
          tbval.rows[i].cells[6].innerHTML = data['Countries'][i-1]['NewDeaths'];
          tbval.rows[i].cells[6].style.background = '#f36e23';



	
      }
    }
    
    );
}

</script>
</body>
</html>