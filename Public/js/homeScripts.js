$(function(){

	currentTime()
})

function currentTime(){

	let date = new Date()
	let hour = date.getHours()
	let min = date.getMinutes()
	let sec = date.getSeconds()



	hour = (hour < 10) ? "0" + hour : hour;
	min = (min < 10) ? "0" + min : min;
	sec = (sec < 10) ? "0" + sec : sec;

	let time = hour + ":" + min + ":" + sec

	if(min == 0 && sec == 0){

		window.location.reload(1);
	}else{

		$('#clock').text(time)
		let t = setTimeout(function(){ currentTime() }, 1000);
	}
}