//Script padrão para mostrar modal e deletar tarefa via ajax

$(document).ready(function(){
    loadScripts();
});

function loadScripts(){
	// Ação para carregar modal
	$('.modalButton').click(function(){
		
		$('.modal').modal('show')
			.find('.modalContent')
			.load($(this).attr('value'));
	});

	// Ação para deletar tarefa via ajax
	$('.deleteTarefa').on('click', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).attr('delete-url');
        var result = confirm('Deseja excluir este intem?');                          
        if(result) {
            $.ajax({
                url: deleteUrl,
                type: 'post',

                success: function(result){
                    if(result == 1){
                        $.pjax.reload({container:"#tarefasGrid"});
                    } else {
                        console.log('erro ao deletar');
                    }
                },
                error: function(e){
                    console.log('server error');
                },
            });
        }
    });
}
