document.getElementById('contatos').addEventListener('submit', function(event) {
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var pacote = document.querySelector('input[name="pacote"]:checked');
    var mensagem = document.getElementById('mensagem').value;
    var newsletter = document.querySelector('input[name="newsletter"]:checked');
  
    if(nome === '' || email === '' || !pacote || (newsletter.value === 'sim' && mensagem === '')) {
        alert('Por favor, preencha todos os campos obrigatórios.');
        event.preventDefault();
    } else if(!validateEmail(email)) {
        alert('Por favor, insira um endereço de e-mail válido.');
        event.preventDefault();
    }
  });
  
  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }


  $(document).ready(function() {
    $('#contatos').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: '/src/views/processaFormulario.php',
            type: 'post',
            data: $('#contatos').serialize(),
            success: function() {
                alert('Formulário enviado com sucesso!');
            },
            error: function() {
                alert('Houve um erro ao enviar o formulário.');
            }
        });
    });
});

  