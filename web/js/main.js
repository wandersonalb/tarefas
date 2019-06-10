$(function(){

	//ação parar carregar modal clicar no botão criar tarefa
	$('.modalButton').click(function(){
		$('.modal').modal('show')
			.find('.modalContent')
			.load($(this).attr('value'));
	});

});