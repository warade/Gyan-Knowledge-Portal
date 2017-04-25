<!DOCTYPE html>
<html>
<title>SAD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding-8 w3-card-2">
    <a href="#home" class="w3-margin-left w3-bar-item w3-button"><b>ABV</b> IIITM</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <!--gotta change these-->
      <a href="index.php" class="w3-bar-item w3-button">Gyan</a>
      <a href="" class="w3-bar-item w3-button">Teachers</a>
      <a href="" class="w3-bar-item w3-button w3-margin-right">Contact</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="campus.jpg" alt="Architecture" width="1500" height="700">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Atal Bihari Vajpayee</b></span> <hr> <span class="w3-hide-small w3-text-light-grey">Indian Institute of Information Technology And Management</span></h1>
  </div>
</header>
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Contact us</h3>
    <p>Lets get in touch and talk about your research!</p>
    <form action="/action_page.php" target="_blank">
      <input class="w3-input" type="text" placeholder="Name" required name="Name">
      <input class="w3-input w3-section" type="text" placeholder="Email" required name="Email">
      <input class="w3-input w3-section" type="text" placeholder="Subject" required name="Subject">
      <input class="w3-input w3-section" type="text" placeholder="Comment" required name="Comment">
      <button class="w3-button w3-black w3-section" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  </div>
  
</div>
</footer>

</body>
</html>