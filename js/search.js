function load_items(){
    $(".button").hide();
    $(".searchdisappear").hide();
    $(".button").slideDown(100);
    $(".searchdisappear").slideDown(100);
}

function buttonClicked(field) {
		if (field.value.length > 0) {
			$(".inforequest").hide();
			$(".submitinfo").hide();
			$(".clickback").hide();
			$(".playersfound").hide();
			$(".inforequest").slideDown();
			$(".submitinfo").slideDown();
			$(".clickback").slideDown();
			$(".playersfound").slideDown();
			window.gamevar = field.value;
			window.increments = 0
			window.gamertag = '';
			window.platformid = '';
			document.getElementById('inforequest').style.display='block';
			document.getElementById('submitinfo').style.display='block';
			document.getElementById('searchdisappear').style.display='none';
			document.getElementById('button').style.display='none';
			document.getElementById("gamename").innerHTML = field.value;
			document.getElementById("clickabout").style.display='none';
			document.getElementById('clickback').style.display='block';
			document.getElementById('playersfound').style.display='block';
			//document.getElementById("stats").style.display='none';
			findingPlayers();
			window.statusIntervalId = setInterval(findingPlayers, 7000);
		}
	}

function enterPressed(e, field) {
    if (e.keyCode == 13) {
        var tb = document.getElementById("searchbox");
		if (field.value.length > 0) {
			buttonClicked(field);
		}
	}
}

function infoenterPressed(e, field) {
    if (e.keyCode == 13) {
        var tb = document.getElementById("searchbox");
		if (field.value.length > 0) {
			playerinfo(field);
		}
	}
}

function findingPlayers(){
	if (gamertag.length > 1 && platformid.length > 1){
		$.ajax({
		type: 'POST',
		url: './php/postrefresh.php',
		data: {gameinput: gamevar, counter: "counter", username: gamertag, platform: platformid},
		success: function(reponse) {$("#playersfound").html(reponse);}
		});
	if (increments == 0){
		$.ajax({
		type: 'POST',
		url: './php/sethistory.php',
		data: {gameinput: gamevar, counter: "counter", username: gamertag, platform: platformid},
		success: function(reponse) {$("#playersfound").html(reponse);}
		});
		window.increments = window.increments + 1
	}
	document.getElementById('submitinfo').style.display='none';
	}
}

function playerinfo(field){
	if (field.value.length > 2){
		window.gamertag = field.value;
		findingPlayers();
	}
}

function platform(field){
	if (field.length > 2){
		window.platformid = field;
		findingPlayers();
	}else{
	}
}
function aboutClicked(field) {
	document.getElementById('searchdisappear').style.display='none';
	document.getElementById('button').style.display='none';
	document.getElementById('aboutbutton').style.display='block';
	document.getElementById('clickabout').style.display='none';
	document.getElementById('clickbackabout').style.display='block';
	document.getElementById('aboutbutton').style.display='block';
	$(".searchdisappear").slideUp();
	$(".button").slideUp();
	$(".clickabout").slideUp();
	$(".creators").hide();
       $(".creators").slideDown(100);
	
}

function backClicked(field) {
	$.ajax({
		type: 'POST',
		url: './php/postrefresh.php',
		data: {ready: "true"}
	});
	clearInterval(statusIntervalId);
	location.reload();
}

function closeIt()
{
  $.ajax({
	type: 'POST',
	url: './php/postrefresh.php',
	data: {ready: "true"}
	});
	clearInterval(statusIntervalId);
}
window.onbeforeunload = closeIt;

function autocomplet() {
	var workchecker = 0;
	var min_length = 1;
	var keyword = $('#searchbox').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: './php/postsuggest.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#game_list_id').show();
				$('#game_list_id').html(data);
			}
		});
		
	} else {
		$('#game_list_id').hide();
	}
}

function statcollect() {
	$.ajax({
	type: 'POST',
	url: './php/poststats.php',
	success: function(data) {$("#stats").html(data);}
	});
}

function set_item(item) {
	$('#searchbox').val(item);
	$('#game_list_id').hide();
}

function hide_list() {
$('#game_list_id').hide();
}