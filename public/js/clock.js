function myClock(){
	var d = new Date();
	//d.getTime();// + " milliseconds since 1970/01/01");
	//d.getTime();// - Number of milliseconds since 1/1/1970 @ 12:00 AM
	//d.getSeconds();// - Number of seconds (0-59)
	//d.getMinutes();// - Number of minutes (0-59)
	//d.getHours();// - Number of hours (0-23)
	//d.getDay();// - Day of the week(0-6). 0 = Sunday, ... , 6 = Saturday
	//d.getDate();// - Day of the month (0-31)
	//d.getMonth();// - Number of month (0-11)
	//d.getFullYear();// - The four digit year (1970-9999)
	var mon = d.getMonth() + 1;
	var curD = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds() + "  " + d.getDate() + "/" + mon + "/" + d.getFullYear();
	$("#timer").html(curD);
	$("#timer").css('font-size',d.getSeconds() + 'px');
}