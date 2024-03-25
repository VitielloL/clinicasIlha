document.addEventListener('DOMContentLoaded', function() {
    // Máscaras dos campos de cadastro de Pessoas
    document.querySelector('.FLDSTRREQ_cpf').addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    });

    document.querySelector('.FLDSTROPT_cep').addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').replace(/(\d{5})(\d{3})/, '$1-$2');
    });

    // Completar endereço através do cep
    document.getElementById('cep').addEventListener('blur', function() {
        const cep = this.value;

        fetch('https://viacep.com.br/ws/' + cep + '/json/')
            .then(response => response.json())
            .then(dados => CompletarEndereco(dados))
            .catch(() => alert('CEP não encontrado'));
    });

    function CompletarEndereco(dados) {
        if (dados.erro) {
            alert('CEP não encontrado');
            return;
        }

        document.getElementById('uf').value = dados.uf;
        document.getElementById('cidade').value = dados.localidade;
        document.getElementById('bairro').value = dados.bairro;
        document.getElementById('logradouro').value = dados.logradouro;
    }
});