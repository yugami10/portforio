// メールの件名フォーム
function freeRadioSubject(event) {
	document.getElementById('free_radio_subject').checked = true;
	document.getElementById('const_radio_subject').checked = false;

	// 入力フォームの表示切替・必須切替
	document.getElementById('subject_free').style.display = "";
	document.getElementById('subject_const').style.display = "none";
	document.getElementById('subject_free').setAttribute("required", "required");
	document.getElementById('subject_const').removeAttribute("required");

	document.getElementById('subject_label').setAttribute("for", "subject_free");
}

function constRadioSubject(event) {
	document.getElementById('free_radio_subject').checked = false;
	document.getElementById('const_radio_subject').checked = true;

	// 入力フォームの表示切替・必須切替
	document.getElementById('subject_free').style.display = "none";
	document.getElementById('subject_const').style.display = "";
	document.getElementById('subject_free').removeAttribute("required");
	document.getElementById('subject_const').setAttribute("required", "required");

	document.getElementById('subject_label').setAttribute("for", "subject_const");
}

// メールの宛先フォーム
function freeRadioTo(event) {
	document.getElementById('free_radio_to').checked = true;
	document.getElementById('const_radio_to').checked = false;

	// 入力フォームの表示切替・必須切替
	document.getElementById('to_free').style.display = "";
	document.getElementById('to_const').style.display = "none";
	document.getElementById('to_free').setAttribute("required", "required");
	document.getElementById('to_const').removeAttribute("required");

	// labelのfor属性を動的に変える
	document.getElementById('to_label').setAttribute("for", "to_free");
}

function constRadioTo(event) {
	document.getElementById('free_radio_to').checked = false;
	document.getElementById('const_radio_to').checked = true;

	// 入力フォームの表示切替・必須切替
	document.getElementById('to_free').style.display = "none";
	document.getElementById('to_const').style.display = "";
	document.getElementById('to_free').removeAttribute("required");
	document.getElementById('to_const').setAttribute("required", "required");

	document.getElementById('to_label').setAttribute("for", "to_const");
}

// メールの宛先名フォーム
function freeRadioToName(event) {
	document.getElementById('free_radio_to_name').checked = true;
	document.getElementById('const_radio_to_name').checked = false;

	// 入力フォームの表示切替・必須切替
	document.getElementById('to_name_free').style.display = "";
	document.getElementById('to_name_const').style.display = "none";
	document.getElementById('to_name_free').setAttribute("required", "required");
	document.getElementById('to_name_const').removeAttribute("required");

	document.getElementById('to_name_label').setAttribute("for", "to_name_free");
}

function constRadioToName(event) {
    document.getElementById('free_radio_to_name').checked = false;
    document.getElementById('const_radio_to_name').checked = true;

	// 入力フォームの表示切替・必須切替
	document.getElementById('to_name_free').style.display = "none";
	document.getElementById('to_name_const').style.display = "";
	document.getElementById('to_name_free').removeAttribute("required");
	document.getElementById('to_name_const').setAttribute("required", "required");

    document.getElementById('to_name_label').setAttribute("for", "to_name_const");
}


// メールの本文フォーム
function freeRadioContent(event) {
	document.getElementById('free_radio_content').checked = true;
	document.getElementById('const_radio_content').checked = false;

	// 入力フォームの表示切替・必須切替
	document.getElementById('content_free').style.display = "";
	document.getElementById('content_const').style.display = "none";
	document.getElementById('content_free').setAttribute("required", "required");
	document.getElementById('content_const').removeAttribute("required");

	document.getElementById('content_label').setAttribute("for", "content_free");
}

function constRadioContent(event) {
	document.getElementById('free_radio_content').checked = false;
	document.getElementById('const_radio_content').checked = true;

	// 入力フォームの表示切替・必須切替
	document.getElementById('content_free').style.display = "none";
	document.getElementById('content_const').style.display = "";
	document.getElementById('content_free').removeAttribute("required");
	document.getElementById('content_const').setAttribute("required", "required");

	document.getElementById('content_label').setAttribute("for", "content_const");
}

// 送信時間の設定フォーム
function everydaySendFlagRequired(event) {
	document.getElementById('check_everyday_send_flag').setAttribute("required", "required");
	document.getElementById('select_day_of_week').removeAttribute("required");
}

function dayOfWeekRequired(event) {
	document.getElementById('check_everyday_send_flag').removeAttribute("required");
	document.getElementById('select_day_of_week').setAttribute("required", "required");
}
