<?php
// Array de produtos com nomes e imagens
$produtos = [
    ['nome' => 'Blue Label', 'imagem' => 'blue_label.jpg'],
    ['nome' => 'Gold Label', 'imagem' => 'gold_label.jpg'],
    ['nome' => 'Double Black', 'imagem' => 'double_black.jpg'],
    ['nome' => 'Jack Daniel\'s Honey', 'imagem' => 'jack_daniels_honey.jpg'],
    ['nome' => 'Royal Salute', 'imagem' => 'royal_salute.jpg'],
    ['nome' => 'Macallan', 'imagem' => 'macallan.jpg']
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Produtos</title>
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
        h1 {
            text-align: center;
            color: #333;
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: 700;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            display: flex;
            align-items: center;
            background: #fafafa;
            margin: 10px 0;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        li:hover {
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .produto-imagem {
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
    </style>
</head>
<body>

<div class="container">
    <h1>Lista de Produtos</h1>
    <ul>
        <?php foreach ($produtos as $produto): ?>
            <li>
                <img src="imagens/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>" class="produto-imagem">
                <div class="produto-info">
                    <div class="produto-nome"><?php echo htmlspecialchars($produto['nome']); ?></div>
                    <!-- Exemplo de preço fictício; você pode substituir ou adicionar conforme necessário -->
                    <div class="produto-preco">R$ 120,00</div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>