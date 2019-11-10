var botaoPlacar = $("#botao-placar");
var botaoSinc = $("#botao-sinc");

var placar = $('.placar');

var localPlacar = "http://localhost:3000/placar";

function inserePlacar(){
	var tabela = $(".placar").find('tbody');
	var numPalavras = $("#qtPalavras").text();
	var numCaracteres = $("#qtCaracteres").text();
	// var botaoRemoverTabela = "<a href='#' id='botao-remover' class='btn-floating waves-effect waves-light red'><i class='small material-icons'>delete</i></a>";
	var usuario = $("#usuarios").val();
	var linha = novaLinha(usuario,numPalavras);
	// linha.find('.botao-remover').click(removeLinhaTabela);


	//depois se for antes é prepend
	tabela.prepend(linha);
	placar.slideDown(500);
	scrollPlacar();
	sincronizaPlacar();

}

function buscaPlacar(){
	$("#spinner").show();
	$.get(localPlacar, montaPlacar).fail(function () {
		$("#erro").show();
		setTimeout(function () {
			$("#erro").toggle();
		},3000);
	}).always(function(){
		$("#spinner").toggle();
	});
}

function montaPlacar(data){
	var tabela = $(".placar").find('tbody');
	$(data).each(function(data) {
		var linha = novaLinha(this.usuario,this.pontos);
		
		tabela.prepend(linha);
	});
	
}


function scrollPlacar(){
	var posPlacar = placar.offset().top;
	$("html").animate({"scrollTop": posPlacar +"px"}, "slow");
}

function novaLinha(usuario,numPalavras){
	//cria o elemento html
	var linha = $("<tr>");
	var colunaUsuario = $("<td>").text(usuario);
	var colunaPalavras = $("<td>").text(numPalavras);
	var colunaRemover = $("<td>");
	var link = $("<a>").addClass('botao-remover').addClass('btn-floating').addClass('waves-effect').addClass('waves-light').addClass('red').attr('href','#');
	var icone = $("<i>").addClass('small').addClass('material-icons').text('delete');

	linha.append(colunaUsuario);
	linha.append(colunaPalavras);
	linha.append(colunaRemover.append(link.append(icone)));
	linha.find('.botao-remover').click(removeLinhaTabela);
	return linha;
}

function removeLinhaTabela(event) {
	event.preventDefault();
	var linha = $(this).parent().parent();
	linha.fadeOut(500);
	setTimeout(function(){
		linha.remove();
	},500);

	setTimeout(function(){
		sincronizaPlacar();
	},501);
	
};

function mostraPlacar(){
	placar.stop().slideToggle();
}

function escondePlacar(){
	placar.stop().slideUp();
}

function sincronizaPlacar(){
	var pontuacaoPlacar = [];
	var listaPlacar = $("tbody>tr");
	listaPlacar.each(function() {
		var usuario = $(this).find("td:nth-child(1)").text();
		var palavras = $(this).find("td:nth-child(2)").text();
		var score = {
			usuario: usuario, 
			pontos: palavras
		};
		pontuacaoPlacar.push(score);
		
	});
	var dados = {
		placar: pontuacaoPlacar
	};
	$.post(localPlacar, dados).done(function(){
		$(".tooltip").tooltipster("open").tooltipster("content", "Sucesso ao sincronizar!");
	}).fail(function(){
		$(".tooltip").tooltipster("open").tooltipster("content", "Falha ao sincronizar");
	}).always(function(){
		setTimeout(function(){
			$(".tooltip").tooltipster("close");
		},1200);
	});
	
}