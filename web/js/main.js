$(function(){

	//ação parar carregar modal clicar no botão criar tarefa
	$('#modalButton').click(function(){
		$('#modalNovaTarefa').modal('show')
			.find('#modalNovaTarefaContent')
			.load($(this).attr('value'));
	});

	//ação parar carregar modal clicar no botão visualizar tarefa
	$('#modalViewButton').click(function(){
		$('#modalViewTarefa').modal('show')
			.find('#modalViewTarefaContent')
			.load($(this).attr('value'));
	});

	//ação parar carregar modal clicar no botão editar tarefa
	$('.modalEditButton').click(function(){
		$('#modalEditTarefa').modal('show')
			.find('#modalEditTarefaContent')
			.load($(this).attr('value'));
	});

});