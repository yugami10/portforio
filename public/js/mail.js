// メールの宛先フォーム
function freeRadioTo(event) {
	document.getElementById('free_radio_to').checked = true;
	document.getElementById('const_radio_to').checked = false;
	document.getElementById('to_free').style.display = "";
	document.getElementById('to_const').style.display = "none";
}

function constRadioTo(event) {
	document.getElementById('free_radio_to').checked = false;
	document.getElementById('const_radio_to').checked = true;
	document.getElementById('to_free').style.display = "none";
	document.getElementById('to_const').style.display = "";
}


// メールの本文フォーム
function freeRadioContent(event) {
	document.getElementById('free_radio_content').checked = true;
	document.getElementById('const_radio_content').checked = false;
	document.getElementById('content_free').style.display = "";
	document.getElementById('content_const').style.display = "none";
}

function constRadioContent(event) {
	document.getElementById('free_radio_content').checked = false;
	document.getElementById('const_radio_content').checked = true;
	document.getElementById('content_free').style.display = "none";
	document.getElementById('content_const').style.display = "";
}
