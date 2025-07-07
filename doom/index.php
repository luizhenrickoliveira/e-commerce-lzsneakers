<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LZ Sneakers - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<style>* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background: #fff;
  color: #000;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding: 2rem;
}

header {
  background: #fff;
  border-bottom: 1px solid #e0e0e0;
  padding: 1rem 2rem;
  width: 100%;
  max-width: 500px;
  text-align: center;
  margin-bottom: 2rem;
}

header h1 {
  font-size: 1.5rem;
  font-weight: bold;
  text-transform: uppercase;
  color: #000;
  margin-bottom: 0.5rem;
}

header p {
  font-size: 1rem;
  color: #555;
}

.login-container {
  width: 100%;
  max-width: 400px;
  background: #f7f7f7;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 2rem;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

form {
  display: flex;
  flex-direction: column;
}

label {
  font-weight: 600;
  margin-bottom: 0.5rem;
  font-size: 1rem;
  color: #000;
}

input[type="text"],
input[type="password"] {
  padding: 0.6rem 0.8rem;
  margin-bottom: 1.5rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 1rem;
  outline: none;
  transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-color: #000;
}

input[type="submit"] {
  background: #000;
  color: #fff;
  border: none;
  padding: 0.8rem;
  font-size: 1rem;
  font-weight: 600;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.3s ease;
}

input[type="submit"]:hover {
  background: #333;
}

@media (max-width: 480px) {
  body {
    padding: 1rem;
  }

  .login-container {
    padding: 1.5rem;
  }
}
</style>
<body>

        <?php

// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'empresa_do_luiz'; 

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Acessar o IF quando o usuario clicar no botão de acesso do formulario
if (!empty($dados["Sendlogin"])) {
    // Preparar a consulta SQL
    $query_usuario = "SELECT id, senha FROM usuarios WHERE usuario = ? LIMIT 1";
    $stmt = $conn->prepare($query_usuario);
    $stmt->bind_param("s", $dados["usuario"]);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows == 1) {
        // Usuário encontrado, verificar senha
        $row_usuario = $resultado->fetch_assoc();
        if (md5($dados["senha_usuario"], $row_usuario['senha'])) {
            // Senha correta - iniciar sessão e redirecionar
            session_start();
            $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['usuario'] = $dados["usuario"];
            
            header("Location: dashboard.php"); // redireciona para página restrita
            exit();
        } else {
            echo "<p style='color: red'>Erro: Senha incorreta!</p>";
        }
    } else {
        echo "<p style='color: red'>Erro: Usuário não encontrado!</p>";
    }
}

?>

<header>
    <h1>LZ SNEAKERS</h1>
    <p>Os melhores tênis, todas as marcas, em um só lugar!</p>
  </header>
  <div class="login-container">
  
 <!-- Inicio do formulario -->
<form method="POST" action="">

<label>Usuário: </label>
<input type="text" name="usuario" placeholder="digite o usuário" required><br><br>

<label>Senha: </label>
<input type="password" name="senha_usuario" placeholder="digite a senha" required><br><br>

<input type="submit" name="Sendlogin" value="Acessar">
</form>
<!-- fim do formulario -->
</div>
</body>
</html>