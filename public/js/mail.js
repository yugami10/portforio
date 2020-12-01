// メールの宛先フォーム
function mailFormatTo(event) {
	const id = event.target.id;
	document.getElementsByName('to_radio').forEach( function( element ) {
		if (element.id === id) {
			element.checked = true;
			document.getElementById('to_free').style.display = "";
			document.getElementById('to_const').style.display = "none";
			return;
		}

		element.checked = false;
		document.getElementById('to_free').style.display = "none";
		document.getElementById('to_const').style.display = "";
	});
}

// メールの本文フォーム
function mailFormatContent(event) {
	const id = event.target.id;
	document.getElementsByName('content_radio').forEach( function( element ) {
		if (element.id === id) {
			element.checked = true;
			document.getElementById('content_free').style.display = "";
			document.getElementById('content_const').style.display = "none";
			return;
		}

		element.checked = false;
		document.getElementById('content_free').style.display = "none";
		document.getElementById('content_const').style.display = "";
	});
}
