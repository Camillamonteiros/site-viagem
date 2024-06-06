<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$pacote = $_POST['pacote'];
$mensagem = $_POST['mensagem'];
$newsletter = $_POST['newsletter'];

$stmt = $conn->prepare("INSERT INTO Reservas (nome, email, pacote, mensagem, newsletter) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $email, $pacote, $mensagem, $newsletter);

if ($stmt->execute()) {
  echo "Novo registro criado com sucesso";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
