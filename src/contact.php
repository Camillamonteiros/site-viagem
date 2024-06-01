<?php
    $host = 'localhost';
    $db = 'contatos';
    $user = 'root@localhost';
    $pass ='';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = strip_tags(trim($_POST["nome"]));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $pacote = strip_tags(trim($_POST["pacote"]));
        $mensagem = strip_tags(trim($_POST["mensagem"]));
        $newsletter = isset($_POST["newsletter"]) && $_POST["newsletter"] == 'sim' ? 'sim' : 'não';

        if (empty($nome)|| empty($email) || empty($pacote) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Por favor, preencha todos os campos obrigatórios e forneça um endereço de e-mail válido.";
            exit;
    }
    $stmt = $conn->prepare("INSERT INTO contatos (nome, email, pacote, mensagem, newsletter) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $email, $pacote, $mensagem, $newsletter);

    if ($stmt->execute()) {
        echo "Obrigado! Sua mensagem foi enviada.";
    } else {
        echo "Desculpe, algo deu errado e não conseguimos enviar sua mensagem.";
    }

    $stmt->close();
}

$conn->close();
?>
