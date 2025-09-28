function limparFormularioCep() {
    // Limpa valores do formulário de cep.
    document.getElementById('logradouro').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('cidade').value = "";
}

function buscarCep(valor) {
    // Nova variável "cep" somente com dígitos.
    const cep = valor.replace(/\D/g, '');

    // Verifica se campo cep possui valor informado.
    if (cep !== "") {
        // Expressão regular para validar o CEP.
        const validacep = /^[0-9]{8}$/;

        // Valida o formato do CEP.
        if (validacep.test(cep)) {
            // Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('logradouro').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";

            // Cria um elemento javascript.
            const script = document.createElement('script');

            // Sincroniza com o callback.
            script.src = `https://viacep.com.br/ws/${cep}/json/?callback=meu_callback`;

            // Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } else {
            // cep é inválido.
            limparFormularioCep();
            alert("Formato de CEP inválido.");
        }
    } else {
        // cep sem valor, limpa formulário.
        limparFormularioCep();
    }
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        // Atualiza os campos com os valores da consulta.
        document.getElementById('logradouro').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
    } else {
        // CEP não Encontrado.
        limparFormularioCep();
        alert("CEP não encontrado.");
    }
}