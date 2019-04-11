<?php
include_once('../includes/headerCarrinho.php');
include_once('../scripts/controllers/ProdutoDAO.php');

if (isset($_POST['excluir']) && isset($_POST['id'])) {
    //crio um objeto da classe controller produtoDAO
    $dao = new ProdutoDAO;
    $result = $dao->excluir($_POST);
}

if (isset($_POST['resetCart'])) {
    $_SESSION['cart'] = array();
    header('Location:carrinho.php');
}
if (isset($_POST['comprar'])) {
    header('Location:comprou.php');
}
?>

<html>

<head>
    <Title> Carrinho </title>
    <link href="css\estilo.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="..\imagens\favicon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <style>
        .botao-comprar {
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <center><img src="..\imagens\icon.png" class="imagem-logo"></center>

        <h1 class="nome">Mini Mercado Quase Tudo</h1>

        <table>
            <tr>
                <th class="menu"> <A href="index.html">Inicio</A> </th>
                <th class="menu"> <A href="produtos.php">Produtos</A> </th>
                <th class="menu"> <A href="carrinho.php">🛒 Carrinho</A></th>
                <th class="menu"> <A href="login.php">Login</A> </th>

            </tr>
        </table>
    </header>

    <h2>Lista de produtos:</h2>
    <?php
    //se a variavel de sessão cart não estiver vazia
    if (!empty($_SESSION['cart'])) {
        //variavel a qual irá armazenar o carrinho para manipulação
        $produtos = $_SESSION['cart'];

        //subtotal dos produtos
        $total = 0;
        ?>
        <table style="width: 100%;">
            <tr>
                <td></td>
                <td>Nome</td>
                <td>Quantidade</td>
                <td>Preco unitario</td>
                <td>Subtotal</td>
            </tr>
            <?php
            //foreach é uma estrutura de repetição especifica para manipulação de arrays, onde manipulamos os valores inseridos deles por identificadores de chave => valor 
            foreach ($produtos as $subKey => $subArray) :
                if (isset($subArray['idProduto'])) {
                    ?>
                    <tr>
                        <td><img style="width: 100px;height: 100px;" src="<?php echo "{$subArray['imagemProduto']}"; ?>" class="imagens"></td>
                        <td><?php echo $subArray['nomeProduto']; ?></td>
                        <td><?php echo intval($subArray['qtdProduto']); ?></td>
                        <td><?php echo floatval($subArray['precoUnidade']); ?></td>
                        <td><?php echo (intval($subArray['qtdProduto']) * floatval($subArray['precoUnidade'])); ?></td>
                        <td>
                            <form action="carrinho.php" method="post">
                                <input type="submit" name="excluir" value="Excluir">
                                <input type="hidden" name="id" value="<?php echo "{$subArray['id']}"; ?>">
                            </form>
                        </td>
                    </tr>

                    <?php
                    $total += (intval($subArray['qtdProduto']) * floatval($subArray['precoUnidade']));
                }
            endforeach;
            ?>
            <tr>


                <td><b>SUBTOTAL DOS PRODUTOS:</b></td>
                <td><?php echo $total; ?></td>
                <td>
                    <form action="carrinho.php" method="post">
                        <input type="submit" name="resetCart" value="Limpar Carrinho">
                    </form>
                </td>
            </tr>
        </table>
        <form action="carrinho.php" method="post">
            <br> <input class="botao-comprar" type="submit" name="comprar" value="comprar">
        </form>
    <?php
} else {
    ?>
        <p style="text-align: center;">Não há produtos no carrinho!!</p>
    <?php
}
?>


</body>

</html>