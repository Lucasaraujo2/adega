<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png" />

    <title>Adega-idrink</title>
    <link rel="stylesheet" href="css/styleproduto.css" />
</head>

<body>

    <!-- modelos de bebida na lista e no carrinho -->
    <div class="models">

        <!-- bebida na lista -->
        <div class="bebida-item">
            <a href="">
                <div class="bebida-item--img"><img src="" /></div>
                <div class="bebida-item--add">+</div>
            </a>
            <div class="bebida-item--price">R$ --</div>
            <div class="bebida-item--name">--</div>
            <div class="bebida-item--desc">--</div>
        </div>

        <!-- bebida no carrinho -->
        <div class="cart--item">
            <img src="" />
            <div class="cart--item-nome">--</div>
            <div class="cart--item--qtarea">
                <button class="cart--item-qtmenos">-</button>
                <div class="cart--item--qt">1</div>
                <button class="cart--item-qtmais">+</button>
            </div>
        </div>

    </div>
    <!-- /models -->

    <!-- .menu-openner aparecera no modo mobile -->
    <header>
        <a href="index.php" class="logo">
            <p>ADEGA IDRINK</p>
        </a>
        <div class="menu-openner"><span>0</span>🛒</div>
    </header>
    <!-- /menu-openner -->

    <!-- conteudo principal -->
    <main>

        <h2>Whisky</h2>

        <div class="bebida-area"></div>
    </main>
    <!-- /conteudo principal -->

    <!-- aside do carrinho -->
    <aside>
        <div class="cart--area">
            <div class="menu-closer">❌</div>
            <h1>Suas bebida</h1>
            <div class="cart"></div>
            <div class="cart--details">
                <div class="cart--totalitem subtotal">
                    <span>Subtotal</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem desconto">
                    <span>Desconto</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem total big">
                    <span>Total</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--finalizar">Finalizar a compra</div>
            </div>
        </div>
    </aside>
    <!-- /aside do carrinho -->

    <!-- janela modal .bebidaWindowArea -->
    <div class="bebidaWindowArea">
        <div class="bebidaWindowBody">
            <div class="bebidaInfo--cancelMobileButton">Voltar</div>
            <div class="bebidaBig">
                <img src="" />
            </div>
            <div class="bebidaInfo">
                <h1>--</h1>
                <div class="bebidaInfo--desc">--</div>
                <div class="bebidaInfo--sizearea" style="display: none;">
                    <div class="bebidaInfo--sector">Tamanho</div>
                    <div class="bebidaInfo--sizes">
                        <div data-key="P" class="bebidaInfo--size">PEQUENA <span>--</span></div>
                        <div data-key="M" class="bebidaInfo--size">MÉDIA <span>--</span></div>
                        <div data-key="G" class="bebidaInfo--size selected">GRANDE <span>--</span></div>
                    </div>
                </div>
                <div class="bebidaInfo--pricearea">
                    <div class="bebidaInfo--sector">Preço</div>
                    <div class="bebidaInfo--price">
                        <div class="bebidaInfo--actualPrice">R$ --</div>
                        <div class="bebidaInfo--qtarea">
                            <button class="bebidaInfo--qtmenos">-</button>
                            <div class="bebidaInfo--qt">1</div>
                            <button class="bebidaInfo--qtmais">+</button>
                        </div>
                    </div>
                </div>
                <div class="bebidaInfo--addButton">Adicionar ao carrinho</div>
                <div class="bebidaInfo--cancelButton">Cancelar</div>
            </div>
        </div>
    </div>
    <!-- /janela modal .bebidaWindowArea -->

    <script src="bebidas.js"></script>
    <script src="js/script.js"></script>
</body>

</html>