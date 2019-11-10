const criaController = jogo => {

	const $entrada = $(".entrada");
	const $lacunas = $(".lacunas");

	// consulta jogo.getLacunas() e exibe para o usuário cada lacuna 

    const exibeLacunas = () => {
    	$lacunas.empty();
    	jogo.getLacunas().forEach(val => {
    		criaLi(val);
    	});
    };

    const criaLi = chute => $lacunas.append($("<li>").addClass('lacuna').text(chute));

    // muda o texto do placeHolder do campo de entrada    
    const mudaPlaceHolder = texto => $entrada.val("").attr({"placeholder": texto});

    // passa para jogo.setPalavraSecreta() o valor digitado pelo jogador e chama o a função `exibeLacunas()` e `mudaPlaceHolder()` definidas no controller. 

    const guardaPalavraSecreta = () => {

    	try{
    		jogo.setPalavraSecreta($entrada.val().trim());
	        mudaPlaceHolder("chute");
	        exibeLacunas();	
    	}catch(err){
    		alert(err.message);
    	}
        

    };

    const leChute = () => {
    	try{

    		jogo.processaChute($entrada.val().trim().substr(0,1));
	    	$entrada.val('');
	    	exibeLacunas();

	    	setInterval(() => {
	    		if(jogo.ganhouOuPerdeu()){
		    		if(jogo.ganhou()){
		    			alert("Você ganhou!");
		    		}else if(jogo.perdeu()){
		    			alert("Você perdeu!");
		    		}
		    		recomeca();
	    		}
	    	},300);

    	}catch(err){
    		alert(err.message);
    	}
    };

    const recomeca = () => {
    	jogo.reinicia();
    	mudaPlaceHolder("Palavra secreta");
    	exibeLacunas();
    }

    // faz a associação do evento keypress para capturar a entrada do usuário toda vez que ele teclar ENTER
    const inicia = () => {

        $entrada.keypress(event => {
            if (event.which == 13) {
                switch (jogo.getEtapa()) {
                    case 1:
                        guardaPalavraSecreta();
        				break;
                    case 2:
                        leChute();
                        break;
                }
            }
        });
    };

    // retorna um objeto com a propriedade inicia, que deve ser chamada assim que o controller for criado. 
    return { inicia };

};