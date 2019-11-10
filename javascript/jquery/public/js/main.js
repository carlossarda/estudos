var tempoInicial =  $("#tempo-digitacao").text();

var textoDigitado = $(".campo-digitacao");

var botaoReset = $("#botao-reset");

var botaoRemover = $("#botao-remover");

// $(document).ready(function() {
// 	tamanhoFrase();
// 	cronometro();
// 	contadores();
// 	$("#botao-reset").click(reseta);
// });

$(function() {
	tamanhoFrase();
	cronometro();
	contadores();
	comparaTexto();
	buscaPlacar();
	botaoPlacar.click(mostraPlacar);
	botaoReset.click(reseta);
	botaoFrase.click(fraseAleatoria);
	botaoId.click(buscaFrase);
	botaoSinc.click(sincronizaPlacar);
	arrumaSelect();
	$('.tooltip').tooltipster({
		trigger: "custom"
	});
});

function contadores(){
	textoDigitado.on("input",function(){
	    var conteudo = textoDigitado.val();
	    var contCaracter = conteudo.length;
	    $("#qtCaracteres").text(contCaracter);
	    var contPalavras = conteudo.split(/\S+/).length-1;
	    $("#qtPalavras").text(contPalavras);
	});
}

function cronometro(){
	 
	 textoDigitado.one("focus", function(){
	 	var tempoRestante = $("#tempo-digitacao").text();
	 	botaoReset.attr("disabled", true);
	    var cronometroId = setInterval(function(){
	        tempoRestante--;
	        $("#tempo-digitacao").text(tempoRestante);
	        if(tempoRestante<1){
				clearInterval(cronometroId);
				finalizaJogo();
	        }

	    },1000);
	 });
}


function finalizaJogo() {
	textoDigitado.attr("disabled", true);
    botaoReset.attr("disabled", false);
    textoDigitado.toggleClass("campo-digitacao-finalizado");
    botaoReset.toggleClass('pulse');
    inserePlacar()
    textoDigitado.tooltipster("close");
}

function reseta(){
	textoDigitado.attr("disabled", false);
    textoDigitado.val("");
    $("#tempo-digitacao").text(tempoInicial);
    $("#qtCaracteres").text(0);
    $("#qtPalavras").text(0);
    textoDigitado.toggleClass("campo-digitacao-finalizado");
    textoDigitado.removeClass('campo-certo');
    textoDigitado.removeClass('campo-errado');
    botaoReset.toggleClass('pulse');
    escondePlacar()
    cronometro();
}

function comparaTexto(){
	
	textoDigitado.on("input", function(){
		var frase = $(".frase").text();
		var digitado = textoDigitado.val();

		var comparavel = frase.substr(0,digitado.length);
		var compara = digitado.match(comparavel);

		if (compara != null ){
			textoDigitado.removeClass('campo-errado');
			textoDigitado.addClass('campo-certo');
			
		}else{
			textoDigitado.removeClass('campo-certo');
			textoDigitado.addClass('campo-errado');
			
		}

		//mesma coisa que anterior
		// var ehCorreto = (digitado == comparavel);

		// textoDigitado.toggleClass("campo-certo", ehCorreto);
		// textoDigitado.toggleClass("campo-errado", !ehCorreto);

		//mais do mesmo
		// var digitouCorreto = frase.startsWith(digitado);
		
		// if(digitouCorreto) {
		// 	textoDigitado.removeClass("campo-errado");
		// 	textoDigitado.addClass("campo-certo");
		// } else {
		// 	textoDigitado.removeClass("campo-certo");
		// 	textoDigitado.addClass("campo-errado");
		// }
	}).tooltipster({
		trigger: "custom",
		content: 'Digite o mais rápido que puder!',
		triggerOpen: {
			click: true
		},
		functionPosition: function(instance, helper, position){
	        position.coord.top += 6;
	        position.coord.left -= 350;
	        return position;
    	}
		
	});
}