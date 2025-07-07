<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); 
    exit();
}
$total_produtos = 120;
$total_vendas = 75;
$total_usuarios = 15;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - LZ Sneakers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background: #fff;
  color: #000;
}

header {
  background: #fff;
  border-bottom: 1px solid #e0e0e0;
  padding: 1rem 2rem;
  display: flex;
  justify-content: center; /* centralizado, igual seu exemplo */
  align-items: center;
  font-weight: 700;
  font-size: 1.8rem;
  letter-spacing: 2px;
  text-transform: uppercase;
}

main {
  max-width: 900px;
  margin: 2rem auto;
  padding: 2rem;
}

h2 {
  font-size: 1.4rem;
  margin-bottom: 1.5rem;
  border-left: 4px solid #000;
  padding-left: 0.5rem;
  color: #000;
}

.welcome {
  font-size: 1.2rem;
  margin-bottom: 2rem;
  font-weight: 600;
  color: #000;
}

.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 2rem;
}

.card {
  background: #f7f7f7;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 1rem;
  text-align: center;
  transition: box-shadow 0.3s ease, transform 0.3s ease;
  cursor: default;
}

.card:hover {
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  transform: translateY(-2px);
}

.card h3 {
  font-size: 1rem;
  margin-bottom: 0.5rem;
  color: #000;
}

.card p {
  font-size: 0.9rem;
  margin-bottom: 0.8rem;
  color: #000;
}

.logout {
  display: inline-block;
  margin-top: 2rem;
  padding: 0.6rem 1rem;
  background: #000;
  color: #fff;
  border-radius: 4px;
  text-decoration: none;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s ease;
}

.logout:hover {
  background: #333;
}

@media (max-width: 768px) {
  .cards {
    grid-template-columns: 1fr;
  }
}
</style>
</head>
<body>

<header>LZ Sneakers - Dashboard</header>

<main>
    <div class="welcome">
        Olá, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>! Seja bem-vindo ao painel da loja.
    </div>

    <div class="cards">
        <div class="card">
            <h3><?php echo $total_produtos; ?></h3>
            <p>Produtos cadastrados</p>
        </div>
        <div class="card">
            <h3><?php echo $total_vendas; ?></h3>
            <p>Vendas realizadas</p>
        </div>
        <div class="card">
            <h3><?php echo $total_usuarios; ?></h3>
            <p>Usuários cadastrados</p>
        </div>
    </div>

    <a href="index.html" class="login">Sair</a>
</main>

</body>
</html>