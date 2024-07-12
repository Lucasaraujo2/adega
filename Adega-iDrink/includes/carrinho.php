<?php
if (isset($_GET['id'])){

    $id = strip_tags($_GET['id']);
    var_dump($id);
}
?>

<?php
class product{

private int $id;
private string $name;
private int $price;
private int $quantity;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }


    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function Name()
    {
        return $this->name;
    }

    public function gePrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
?>

<?php
class Cart{

    public function add(Product $product)
    {
    $inCart = false;
        if (count($this->getCart() ['products']) > 0){  
            foreach ($this->getCart() ['products'] as $productIncart){
                if($productIncart->getId()=== $product->getId()){
                    $quantity = $productIncart->getQuantity() + $product->getQuantity();
                    $productIncart->setQuantity($quantity);
                    $inCart = true;
                    break;
                }
            }

        } 
    }

    public function remove(t)
    {
        return$_SESSION['cart'] ?? [];
    }

    public function remove(t)
    {
        return$_SESSION['cart'] ?? [];
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDrink - MinhaConta</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    
<ul>
<li>Gold-label <a href="?id=1">Add</a> R$ 850,59</li>
<li>Blue-label <a href="?id=2">Add</a>R$ 1.550,00</li>
<li>Green-label <a href="?id=3">Add</a>R$ 370,00</li>
<li>Black-label <a href="?id=4">Add</a> R$ 825,00</li>
</ul>



</body>

</html>