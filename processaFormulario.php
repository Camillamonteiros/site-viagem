<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$pacote = $_POST['pacote'];
$mensagem = $_POST['mensagem'];
$newsletter = $_POST['newsletter'];

$sql = "INSERT INTO Reservas (nome, email, pacote, mensagem, newsletter)
VALUES ('$nome', '$email', '$pacote', '$mensagem', '$newsletter')";

if ($conn->query($sql) === TRUE) {
  echo "Novo registro criado com sucesso";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>