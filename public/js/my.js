function changeColor(someClass,color){
	$("." + someClass).css('background-color',color);
}

function myAjax(){
	$.ajax({
		url: 'index.php',
		data:{
			action:'ajax',
		},
		success: function(data){
			var help = eval(data);
			for(var i=0; i<help.length; i++) {
				alert(help[i]);
			}
			$("#myname").html(data + "<br> Эти данные получены с помощью AJAX вызова.");
		}
	});
}