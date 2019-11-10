// var tempoInicial =  $("#tempo-digitacao").text();

// var textoDigitado = $(".campo-digitacao");

// var botaoReset = $("#botao-reset");

// var botaoRemover = $("#botao-remover");

// var frase = $(".frase").text();


var botaoFrase = $("#botao-frase");
var botaoId = $("#botao-id");

var localFrases = "http://localhost:3000/frases";

function fraseAleatoria() {
	$("#spinner").show();

	$.get(localFrases, trocaFraseAleatoria).fail(function () {
		$("#erro").show();
		setTimeout(function () {
			$("#erro").toggle();
		},3000);
	}).always(function(){
		$("#spinner").toggle();
	});
}

function trocaFraseAleatoria(data){
	var numeroAleatorio = Math.floor(Math.random() * data.length) ;
	var frase = $(".frase");
	frase.text(data[numeroAleatorio].texto)
	var tempo = $("#tempo-digitacao").text(data[numeroAleatorio].tempo);
	tamanhoFrase();
}

function tamanhoFrase(){
	var frase = $(".frase").text();
	var nrPalavras = frase.split(" ").length;
	var tamanhoFrase = $("#tamanho-frase").text(nrPalavras);
}

function buscaFrase(){
	var fraseId = $("#frase-id").val();
	var dados = {id: fraseId};
	$("#spinner").show();
	$.get(localFrases, dados, trocaFrase).fail(function () {
		$("#erro").show();
		setTimeout(function () {
			$("#erro").toggle();
		},3000);
	}).always(function(){
		$("#spinner").toggle();
	});
}

function trocaFrase(data){
	var frase = $(".frase");
	frase.text(data.texto)
	$("#tempo-digitacao").text(data.tempo);
	tamanhoFrase();
}