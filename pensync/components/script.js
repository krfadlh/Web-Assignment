$(document).ready(function(){
    $('.collapsible').collapsible();
    $('.modal').modal();
	$('.dropdown-button').dropdown();
	$('select').material_select();
	$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15 // Creates a dropdown of 15 years to control year
	});
	
});


function setStartTime() {
	if (validateDate()) {
		var date = new Date($('#tanggal').val());
		if (date.getDay() == 0 || date.getDay() == 6) {
			var start = 6;
		} else {
			var start = 17;
		}
		var finish = 20;
		var option = '<option style="color: #e53935;" value="" disabled selected="">Pilih jam mulai</option>';
		while(start <= finish) {
			if (start / 10 <= 1) {
				option += '<option style="color: #e53935;" value="0' + start.toString() + ":00:00" + '">0' + start.toString() + ":00:00" + '</option>';
			} else {
				option += '<option style="color: #e53935;" value="' + start.toString() + ":00:00" + '">' + start.toString() + ":00:00" + '</option>';
			}
			start++;
		}
		$('#start-time').prop('disabled', false);
	} else {
		var option = '<option style="color: #e53935;" value="" disabled selected="">Pilih jam mulai</option>';
		$('#start-time').prop('disabled', true);
	}
	$('#start-time').empty();
	$('#start-time').html(option);
	$('select').material_select();
}

function setFinishTime() {
	var start = parseInt($('#start-time').val().split(":")[0]) + 1;
	var finish = 21;
	var option = '<option style="color: #e53935;" value="" disabled selected="">Pilih jam selesai</option>';
	while(start <= finish) {
		option += '<option style="color: #e53935;" value="' + start.toString() + ":00:00" + '">' + start.toString() + ":00:00" + '</option>';
		start++;
	}
	$('#finish-time').empty();
	$('#finish-time').html(option);
	$('#finish-time').prop('disabled', false);
	$('select').material_select();
}

function validateDate() {
	var date = new Date($('#tanggal').val());
	var now = new Date();
	var nextWeek = new Date(now.getTime() + 2 * 24 * 60 * 60 * 1000);

	//alert(date + ", " + now);
	$('#validasi-tanggal').empty();
	if ($('#tanggal').val() != "") {
		if (date.getTime() >= nextWeek.getTime()) {
			return true;
		} else {
			$('#validasi-tanggal').html('<p style="color: #e53935;margin-left: 55px;margin-bottom: 10px;">Peminjaman minimal untuk 3 hari kedepan</p>');
			return false;
		}
	} else {
		$('#validasi-tanggal').html('<p style="color: #e53935;margin-left: 55px;margin-bottom: 10px;"><br></p>');
		return false;
	}
}

function validatePassword(id) {
	if ($(id).val().length >= 8 && alphabetCheck($(id).val()) == true && numericCheck($(id).val()) == true) {
		return true;
	} else {
		return false;
	}
}

function alphabetCheck(str) {
	for(i = 0 ; i < str.length; i++) {
		var code = str.charCodeAt(i);
		if((code > 64 && code < 91) || (code > 96 && code < 123)) {
			return true;
		}
	}
	return false;
}

function numericCheck(str) {
	for(i = 0 ; i < str.length; i++) {
		var code = str.charCodeAt(i);
		if(code > 47 && code < 58) {
			return true;
		}
	}
	return false;
}

function validateSubmit() {
	if ($('#event-name').val() == "" || $('#pj').val() == "" || $('#nrp').val() == "" || $('#tanggal').val() == "" || !validateDate() || $('#start-time').val() == "Pilih jam mulai" || $('#finish-time').val() == "Pilih jam selesai") {
		$('#submit-request').addClass('disabled');
	} else {
		$('#submit-request').removeClass('disabled');
	}
}

function validateChange() {
	if ($('#old_password').val() == "" || validatePassword('#new_password') == false || validatePassword('#retype_password') == false || $('#new_password').val() != $('#retype_password').val()) {
		$('#submit-password').addClass('disabled');
	} else {
		$('#submit-password').removeClass('disabled');
	}
}