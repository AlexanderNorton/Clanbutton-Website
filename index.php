<!DOCTYPE html>

<html lang = "en">

	<head>

		<title>Clanbutton</title>
		<link rel = "stylesheet" type = "text/css" href = "./css/main.css">
		<link rel = "icon" alt="favicon logo" href = "./images/button.png">
		<script src = "./js/search.js"></script>
		<script type = "text/javascript" src = "js/jquery.min.js"></script>

	</head>

	<body onclick = "hide_list()" onload = "load_items()">
		<div id = "surround" class ="surround">
		<div id = "button" class = "button" style= "display:block;">
			<div class = "button" alt = "Button" onclick = "buttonClicked(searchbox)" style = "position: relative; margin-top:150px;"> </div>
		</div>

		<div id = "searchdisappear" class = "searchdisappear" style = "display:block;">
			<input class = "gamesearch" id = "searchbox" maxlength = "200" type = "text" title = "Search for a game" onkeydown = "enterPressed(event, searchbox)" onkeyup = "autocomplet();" autocomplete = "off" autofocus = "autofocus" placeholder = "Search for any game.."/>
			<div class = "input_container">
				<ul id = "game_list_id" onclick = "buttonClicked(searchbox)"></ul>
			<!--<p class = "stats" onclick="statcollect()">CURRENT SEARCHES</p>
			<center>
			<p class = "currentsearches" id = "stats"></p>
			--></center>
			</div>
			<div id = "output"> </div>
		</div>

		<div id = "inforequest"  style = "display:none;">
			<div class = "buttonmatching" style = "margin-top:150px;"> </div>
			<center> <p class = "findingtext">Finding players that also want to play</p></center>
			<p class = "gamename" id = "gamename"></p>
		</div>
		<center>
		<p id = "playersfound" class = "playersfound" style = "display:none;"></p>
		</center>
		<div id = "submitinfo" class = "submitinfo" style = "display:none;">
			<input class = "enterinfo" id = "enterinfo" maxlength = "25" onkeydown = "infoenterPressed(event, enterinfo)" type = "text" autocomplete = "off" autofocus = "autofocus" placeholder = "Enter your username.."/>
			<center>
			<select name = "selectplatform" class = "selectplatform" onchange="platform(this.value)">
				<option value="Select">Select</option>
  				<option value="steam">Steam</option>
  				<option value="origin">Origin</option>
  				<option value="uplay">Uplay</option>
			</select>
			</center>
			<div id = "selectplatform" style = "display:none;">
			<p><center>Select your platform!</center></p>
			</div>
			<input class = "submitbutton" id = "submitbutton" maxlength = "50" type = "submit" title = "Beam me up, Scotty!" onclick = "playerinfo(enterinfo)" autofocus = "autofocus" value = "Submit"/>
		</div>

		<div id = "aboutbutton" class = "aboutbutton" style = "display:none;">
			<center>
				<br>
				<a href="https://www.linkedin.com/in/alexander-norton"><img class = "creators" src = "./images/Norton_Avatar.png" alt = "Norton LinkedIn Profile"></a></center>
			<p class = "abouttext"><br><br>The Clanbutton is an ongoing personal project.</p>
		</div>
		</div>
	</body>

	<footer>

		<div id = "clickabout" style = "display:block;">
			<p onclick = "aboutClicked()" class = "footertext">CLANBUTTON BETA</p>
		</div>

		<div id = "clickback" class = "clickback" style = "display:none;">
			<p onclick = "backClicked()" class = "footertext">Back to the Clanbutton..</p>
		</div>

		<div id="clickbackabout" class = "clickbackabout" style="display:none;">
			<p onclick="window.location.reload()" class="footertext">Back to the Clanbutton..</p>
		</div>

	</footer>


</html>
