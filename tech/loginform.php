<!DOCTYPE HTML>
<html>
<head>
	<title>Infodesk Portal: Sys Admin</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	<!--<script src="assets/js/jquery.min.js"></script>-->
	<style>
		@import url('https://fonts.googleapis.com/css?family=Questrial');
	</style>
</head>
<body>


	<div id="page-wrapper">


		<div id="wrapper">

			<section class="panel color4">
				<div class="intro color0">
					<h1 class="major" style="font-family:'Questrial',sans-serif;font-weight:100;">Infodesk Portal</h1>
					<h2 class="major" style="font-family:'Questrial',sans-serif;font-weight:100;">Contact</h2>
					<p>For any queries, please contact :-</p>
					<ul>
						<li><b>Samyak-  +91 9969696969</b></li>
						<li><b>Rakshit- +91 9696969691</b></li>
					</ul>
				</div>
				<div class="inner columns divided">

					<div class="span-2-75">

						<form method="POST" action="input.php" id="f1" style="font-family:'Questrial',sans-serif;font-weight:100;">

						    <div class="field half">
								<h2 class="major" style="font-family:'Questrial',sans-serif;font-weight:100;">Login</h2>
							</div>
							<div class="field quarter">
							</div>
							<!-- ham-->
							<div class="field quarter">
							<div id="myNav" class="overlay">
							  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
							  <div class="overlay-content">
							    <a href="#">Home</a>
							    <a href="loginform.php">Login</a>
							  </div>
							</div>
							<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

							<script>
							function openNav() {
							    document.getElementById("myNav").style.height = "100%";
							}

							function closeNav() {
							    document.getElementById("myNav").style.height = "0%";
							}
							</script>
						</div>
							<!--ham end-->
							<div class="field mhalf">
								<label for="username">Infodesk User Login</label>
								<input type="text" name="user" id="user" placeholder="Username" required/>
							</div>
							<div class="field mhalf">
								<label for="username">Password</label>
								<input type="password" name="pass" id="pass" placeholder="Password" required/>
							</div>
							<div class="field half">
					        <ul class="actions">
										<li><a href="#first" class="button special color1 circle icon fa-angle-right">Next</a></li>
						    </ul>
							</div>
					</div>

					<div class="span-2-25">
							<h2>REMEMBER!</h2>
							<ol>
								<li> Do not press BACKSPACE or BACK.</li>
								<li> If Connection Failure, Report it to System Admin Organizer immediately.</li>
							<li> In case of Wrong Submission, inform it to System Admin Organizer and make sure he notes the Wrong Submission.</li>
							</ol>
					</div>
			       <div class="span-3-25" id="first">
                          <h2 class="major" style="font-family:'Questrial',sans-serif;font-weight:100;">System Admin</h2>

            <div class="field">
					 <label for="username">System Admin</label>
					 <input type="text" name="username" id="username" placeholder="Username" required/>
				    </div>
				    <div class="field">
						<label for="password">Password</label>
					    <input type="password" name="password" id="password" placeholder="Password" required/>
				    </div>
						<div class="field">
							<ul class="actions">
								<li><button onClick="sendForm()" class="button special">Login</button></li>
								<li><input type="reset" value="Reset" /></li>
							</ul>
            </div>

		            </div>
		            </form>
		            <div class="span-1-5">
							<h2 class="major" style="font-family:'Questrial',sans-serif;font-weight:100;font-size:40px;">TechTatva '17</h2>
							<ul class="contact-icons color1">
								<li class="icon fa-facebook"><a href="https://www.facebook.com/MITtechtatva/">facebook.com/MITtechtatva</a></li>
								<li class="icon fa-twitter"><a href="https://twitter.com/mittechtatva?lang=en">@MITtechtatva</a></li>
								<li class="icon fa-instagram"><a href="https://www.instagram.com/mittechtatva/">@mittechtatva</a></li>

							</ul>
							<br>
							<br>
							<br>
							<h3 style="font-family:'Questrial',sans-serif;font-weight:100;font-size:16px;"><b>Designed by System Admin in MIT, Manipal.</b></h3>
					</div>
              </div>
              </div>
         </section>
        </div>
</div>
		<!--scripts-->

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/main.js"></script>


	</body>
	</html>
