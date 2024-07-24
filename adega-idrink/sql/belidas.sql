CREATE TABLE bebidas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    img VARCHAR(255),
    preco DECIMAL(10,2),
    descricao TEXT
);

INSERT INTO bebidas (id, nome, img, preco, descricao)
VALUES
(1, 'Blue Label', 'img/imagem.png', 1200.00, 'Blue Label é uma prestigiosa marca de uísque da Johnnie Walker, conhecida por sua qualidade premium e sofisticação. É uma mistura complexa e refinada de uísques envelhecidos, oferecendo um sabor suave e rico, com notas de frutas secas, chocolate e fumaça.'),
(2, 'Macallan', 'img/macallan.png', 2998.00, 'Macallan é uma renomada destilaria escocesa famosa por seus uísques single malt de alta qualidade. Conhecido por seu caráter rico e complexo, Macallan oferece uma variedade de expressões que variam em idade e perfil de sabor, muitas vezes destacando notas de frutas secas, especiarias e carvalho.'),
(3, 'Royal Salute', 'img/salute.png', 1300.00, 'Royal Salute é uma linha de uísques escoceses de luxo. Disponível em várias expressões, cada uma nomeada em homenagem aos tiros de salva que marcam as ocasiões reais, é apreciado por seu sabor complexo e sofisticado, frequentemente com notas de frutas maduras, especiarias sutis e um final longo e elegante.'),
(4, 'Johnnie Walker Double Black', 'img/walker.png', 373.00, 'O Johnnie Walker Double Black é uma variação intensa e defumada do clássico uísque escocês. Criado a partir de uma seleção refinada de maltes envelhecidos, é conhecido por seu perfil robusto, com notas profundas de fumaça, turfa e especiarias.'),
(5, 'Gold Label', 'img/goldz.png', 230.00, 'A Gold Label é uma marca registrada que normalmente se refere a produtos ou serviços de alta qualidade e prestígio. Esse termo é frequentemente usado em indústrias como bebidas alcoólicas, especialmente uísque, onde "Gold Label" indica uma variante premium do produto principal da marca.'),
(6, 'Jack Daniels Honey', 'img/jackhoney.png', 160.00, 'Jack Daniels Honey é uma variação do famoso uísque Jack Daniels, enriquecida com um toque de mel. É conhecida por seu sabor suave e doce, que combina o caráter robusto do uísque com notas de mel.');
