const criaJogo = sprite => {
	
	let etapa = 1;

	let palavraSecreta;

	let lacunas = [];

	const processaChute = chute => {

		if (!chute.trim()) throw Error("Chute inválido!");

		const exp = new RegExp(chute, 'gi');
		let resultado, acertou = false;

		while(resultado = exp.exec(palavraSecreta)){

			// lacunas[resultado.index] = chute;
			// acertou = true;
			acertou = lacunas[resultado.index] = chute;

		}
			

		// var arrayPalavra = palavraSecreta.split("");

		// for (var i = 0; i < lacunas.length; i++) {
		// 	if(chute==arrayPalavra[i]){
		// 		lacunas[i]=chute;
		// 		var acertou = true;
		// 	}
		// }

		if (!acertou) sprite.nextFrame();
		// }
	};

	const setPalavraSecreta = palavra => {
		if (!palavra.trim()) throw Error("Palavra secreta inválida!");
		palavraSecreta = palavra;
		criaLacuna();
		proximaEtapa();
	};

	const criaLacuna = () => lacunas = Array(palavraSecreta.length).fill('');

	const proximaEtapa = () => etapa = 2;

	const getLacunas = () => lacunas;

	const getEtapa = () => etapa;

	const ganhou =  () => {
        
        return lacunas.length ? 
        	!lacunas.some(lacunas => {
        	return lacunas == '';
        }):false;

        // for (var i = 0; i < lacunas.length; i++) {
        // 	if (lacunas[i]=="") return false;
        // 	else return true;
        // }
    };

    const perdeu = () => sprite.isFinished();

    const ganhouOuPerdeu = () => ganhou() || perdeu();

    const reinicia = () => {
        palavraSecreta = '';
		etapa = 1;
		lacunas = [];
		sprite.reset();
    };

    // adicionou novas propriedades
    return {
        setPalavraSecreta,
        getLacunas,
        getEtapa,
        processaChute,
        ganhou,
        perdeu,
        ganhouOuPerdeu,
        reinicia
    };

};