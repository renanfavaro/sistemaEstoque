$(function(){
	$('input[name=price]').mask("#.##0,00", {reverse: true});
	$('input[name=cod], input[name=quantity], input[name=min_quantity]').mask('#');
});

function clicou() {
	window.print();
}

