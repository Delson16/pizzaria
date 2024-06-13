<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="iocn.png">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mario Pizzas</title>
</head>

<body>

    <header><img src="logo.png
" alt="" id="logo">
        <h1>Mario Pizzas</h1>
    </header>

    <main>

        <div id="parallax">
            <h2>As melhores pizzas da região!</h2>
        </div>

        <div id="chamativo">

            <h2 id="compre">Compre Já! </h2>

            <section id="pizzas">
                <div class="card" style="width:45vw; border: none;">
                    <img src="italian-cuisine-6903774_1280.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Portuguesa</h5>
                        <a href="#" class="btn btn-primary" style="border: none; background-color: red;">Compre</a>
                    </div>
                </div>

                <div class="card" style="width:45vw; border: none;">
                    <img src="ai-generated-8714553_1280.jpg" class="card-img-top" alt="..." style="height: 116px;">
                    <div class="card-body">
                        <h5 class="card-title">Calabresa</h5>

                        <a href="#" class="btn btn-primary" style="background-color: red ; border: none;">Compre</a>
                    </div>
                </div>
            </section>

        </div>

        <div id="form">

            <form action="" method="post" id="cadastro">

                <h2 id="titulocas">Cadastro</h2>

                <label for="nome">Nome:</label> <input type="text" name="nome" id="nome" required>
                <br><br>

                <label for="telefone">Telefone:</label><input type="text" name="telefone" id="telefone" required>
                <br><br>



                <label for="endereco">
                    Endereço:</label> <input type="text" name="endereco" id="endereco" required>
                <br><br>

                <input type="submit" value="Cadastrar" id="submit" name="enviar">

            </form>

        </div>

        <div id="compradiv">
            <form action="" method="POST" class="compra">
            <h2 id="titulocas">Pedido</h2>
                <label for="nome">Nome</label> 
                <input type="text" name="nome" id="nome" placeholder="Seu nome para validarmos"><br>
                <label for="troco">Troco para</label>
                <input type="text" name="troco" id="troco" placeholder="Sua nota $ - opcional"><br>

                <select id="pizza" name="pizza" placeholder="Selecione a sua pizza!">
                    <option value="Calabresa">Calabresa</option>
                    <option value="Portuguesa">Portuguesa</option>
                </select>

                <img src="ai-generated-8714553_1280.jpg" alt="pizza" id="foto">

                <input type="submit" value="Fazer pedido!" name="enviarCompra" class="envia">
            </form>
        </div>

    </main>


<!--fim fo main ----------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------>

<!-- <div id="avalie">

<form action="" method="post">

<input type="text" placeholder="nome">

<input type="checkbox" name="" id="">

<input type="checkbox" name="" id="">

<input type="checkbox" name="" id="">

<input type="text">
</form>

</div>
    
   -->



    <!-- ----------------------------------------------------------------------------------------------
    ---------------------------------------------------------------------------------------------- -->

    <?php

    // Código de cadastro
    if (isset($_POST['enviar'])) {

        include_once "conexao.php";

        $nome = $_POST['nome'];

        $sql = "SELECT nome FROM cliente WHERE nome = '$nome';";
        $linha = $conn->query($sql);
        $numLinha = mysqli_num_rows($linha);

        if ($numLinha == 0) {
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];

            $sql = "INSERT INTO cliente (nome, telefone, endereco) VALUES ('$nome', '$telefone', '$endereco')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
alert('Cadastro feito')

</script>";
            } else {
                echo "<script>
alert('Deu problema no sistema')

</script>";
            }
        } else {
            echo "<script>
alert('Este nome ja esta cadastrado no banco de dados!')

</script>";
        }
        $conn->close();
    }

    // Código de pedido
    if (isset($_POST['enviarCompra'])) {

        include_once "conexao.php";

        $nome = $_POST['nome'];

        $sql = "SELECT id, nome FROM cliente WHERE nome = '$nome'";
        $linha = $conn->query($sql);
        $numLinha = mysqli_num_rows($linha);

        if ($numLinha > 0) {
            $linha = mysqli_fetch_assoc($linha);
            $idCliente = $linha['id'];
            $troco = $_POST['troco'];

            $pizza = $_POST['pizza'];
            $sql = "SELECT id FROM pizza WHERE nome = '$pizza'";
            $linha = $conn->query($sql);
            $linha = mysqli_fetch_assoc($linha);
            $idPizza = $linha['id'];

            $sql = "INSERT INTO pedido (id_cliente, id_pizza, troco_de) VALUES ('$idCliente', '$idPizza', '$troco')";
            if (mysqli_query($conn, $sql)) {

                echo "<script>
alert('Compra efetuada')

</script>";
            };
        } else {
            echo "<script>
alert('Você não ta cadastrado')

</script>";
        }
        $conn->close();
    }
    ?>

 <!-- ----------------------------------------------------------------------------------------------
    ---------------------------------------------------------------------------------------------- -->







    <script>
        const foto = document.getElementById('foto');
        var pizza = document.getElementById('pizza');

        pizza.addEventListener('change', () => {
            if (pizza.value == 'Calabresa') {
                foto.src = 'ai-generated-8714553_1280.jpg';
            } else if (pizza.value == 'Portuguesa') {
                foto.src = 'italian-cuisine-6903774_1280.jpg';
            }
        });
    </script>




<footer> Feito por: <a href="">Delson Pilar</a> e <a href="https://www.linkedin.com/in/artur-galv%C3%A3o-09b5082b3/">Artur Galvão</a></footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>