<?php
session_start();

// Definição dos produtos
$produtos = [
    ['image' => 'img/Whisky-Royal.png', 'title' => 'Royal Salute', 'price' => 1300.00],
    ['image' => 'img/walker.png', 'title' => 'Double Black', 'price' => 373.00],
    ['image' => 'img/goldz.png', 'title' => 'Gold Label', 'price' => 230.00],
    ['image' => 'img/jack.png', 'title' => 'Jack Daniel\'s Honey', 'price' => 160.00],
    ['image' => 'img/macallan.png', 'title' => 'Macallan', 'price' => 2998.00],
    ['image' => 'img/imagem.png', 'title' => 'Blue Label', 'price' => 1300.00],
];

// Inicializa o carrinho se não estiver iniciado
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adiciona um produto ao carrinho
if (isset($_POST['adicionar'])) {
    $produto_id = intval($_POST['adicionar']);
    if (!isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id] = 1; // Adiciona o produto com quantidade 1
    } else {
        $_SESSION['carrinho'][$produto_id] += 1; // Incrementa a quantidade
    }
}

// Remove um produto do carrinho
if (isset($_POST['remover'])) {
    $produto_id = intval($_POST['remover']);
    if (isset($_SESSION['carrinho'][$produto_id])) {
        unset($_SESSION['carrinho'][$produto_id]); // Remove o produto do carrinho
    }
}

// Atualiza a quantidade de um produto no carrinho
if (isset($_POST['atualizar'])) {
    $produto_id = intval($_POST['produto_id']);
    $quantidade = intval($_POST['quantidade']);
    if ($quantidade <= 0) {
        unset($_SESSION['carrinho'][$produto_id]); // Remove o produto se a quantidade for 0 ou menor
    } else {
        $_SESSION['carrinho'][$produto_id] = $quantidade; // Atualiza a quantidade
    }
}

// Função para calcular o total do carrinho
function calcularTotalCarrinho() {
    global $produtos;
    $total = 0;
    foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
        $total += $produtos[$produto_id]['price'] * $quantidade;
    }
    return number_format($total, 2, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos e Carrinho</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border: 1px solid #ddd;
        }
        .produto {
            display: flex;
            align-items: center;
            background: #fafafa;
            margin: 10px 0;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .produto img {
            width: 100px;
            height: auto;
            margin-right: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .produto-info {
            flex: 1;
        }
        .produto-nome {
            font-size: 1.2em;
            font-weight: 600;
        }
        .produto-preco {
            font-weight: 600;
            color: #007bff;
        }
        .adicionar-carrinho {
            margin-top: 10px;
            display: inline-block;
            padding: 8px 16px;
            font-size: 0.9em;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
            text-decoration: none;
        }
        .adicionar-carrinho:hover {
            background-color: #0056b3;
        }
        .carrinho {
            margin-top: 30px;
            padding: 15px;
            background: #e9ecef;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }
        .cart {
            display: flex;
            align-items: center;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .cart i {
            font-size: 1.5em;
            margin-right: 10px;
        }
        .cart p {
            font-size: 1.2em;
            font-weight: 600;
            margin: 0;
        }
        .carrinho-item {
            display: flex;
            align-items: center;
            background: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .row-img {
            margin-right: 15px;
        }
        .row-img img {
            width: 80px;
            height: auto;
        }
        .carrinho-item p {
            font-size: 12px;
            margin: 0;
        }
        .carrinho-item h2 {
            font-size: 15px;
            margin: 0;
            color: #007bff;
        }
        .fa-trash {
            color: #dc3545;
            cursor: pointer;
            margin-left: auto;
        }
        .quantidade {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }
        .quantidade input {
            width: 50px;
            text-align: center;
        }
        .quantidade button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
            margin: 0 5px;
        }
        .quantidade button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Produtos</h1>
    <?php foreach ($produtos as $id => $produto): ?>
        <div class="produto">
            <img src="<?php echo htmlspecialchars($produto['image']); ?>" alt="<?php echo htmlspecialchars($produto['title']); ?>">
            <div class="produto-info">
                <div class="produto-nome"><?php echo htmlspecialchars($produto['title']); ?></div>
                <div class="produto-preco">R$ <?php echo number_format($produto['price'], 2, ',', '.'); ?></div>
                <form method="post" action="">
                    <input type="hidden" name="adicionar" value="<?php echo $id; ?>">
                    <button type="submit" class="adicionar-carrinho">Adicionar ao Carrinho</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="carrinho">
        <div class="cart">
            <i class="fa-solid fa-cart-shopping"></i>
            <p id="count"><?php echo count($_SESSION['carrinho']); ?></p>
        </div>
        <div id="cartItem">
            <?php
            if (empty($_SESSION['carrinho'])) {
                echo "Seu carrinho está vazio.";
            } else {
                foreach ($_SESSION['carrinho'] as $id => $quantidade) {
                    $produto = $produtos[$id];
                    echo "<div class='carrinho-item'>
                        <div class='row-img'>
                            <img src='{$produto['image']}' alt='{$produto['title']}'>
                        </div>
                        <p>{$produto['title']}</p>
                        <h2>R$ ".number_format($produto['price'], 2, ',', '.')."</h2>
                        <form method='post' action='' class='quantidade'>
                            <input type='hidden' name='produto_id' value='{$id}'>
                            <button type='submit' name='atualizar' value='decrement'>-</button>
                            <input type='text' name='quantidade' value='".htmlspecialchars($quantidade)."' readonly>
                            <button type='submit' name='atualizar' value='increment'>+</button>
                            <button type='submit' name='remover' value='{$id}' class='fa-trash'>&#xf1f8;</button>
                        </form>
                    </div>";
                }
            }
            ?>
        </div>
        <div class="total">
            <strong>Total:</strong> R$ <?php echo calcularTotalCarrinho(); ?>
        </div>
    </div>
</div>
</body>
</html>