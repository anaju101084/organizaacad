<?php include("header.php"); ?>

<?php
    //Verifica se há algum parâmetro chamado "idProduto" sendo recebido por GET
    if(isset($_GET["idAtividade"])){
        $idProduto = $_GET["idAtividade"];

        //echo "<h1>idProduto Recebido: $idProduto</h1>";

        include("conexaoBD.php");

        $exibirAtividade = "SELECT * FROM atividades WHERE idAtividade = $idAtividade";
        $res = mysqli_query($conn, $exibirProduto);
        $totalProdutos = mysqli_num_rows($res);

        if($totalAtividade > 0 ){
            echo "<div class='row text-center mb-5'>";

            if($registro = mysqli_fetch_assoc($res)){
                //Armazena em variáveis PHP os registros encontrados na tabela
                $idAtividade           = $registro["idAtividade"];
                $matriculaAtividade        = $registro["matriculaAtividade"];
                $fotoAtividade         = $registro["fotoAtividade"];
                $materiaAtividade         = $registro["materiaAtividade "];
                $prazoAtividade    = $registro["prazoAtividade"];
                $intrucoesAtividade    = $registro["intrucoesAtividade "];

                echo "
                    <div class='d-flex justify-content-center mb-3'>
                        <div class='card' style='width:30%; border-style:none'>
                            <div id='Atividade' class='carousel slide' data-bs-ride='carousel'>

                                <div class='carousel-indicators'>
                                    <button type='button' data-bs-target='#Atividade'data-bs-slide-to='0' class='active'></button>
                                    <button type='button' data-bs-target='#Atividade'data-bs-slide-to='1'></button>
                                    <button type='button' data-bs-target='#Atividade'data-bs-slide-to='2'></button>
                                </div>

                                <div class='carousel-inner'>
                                    <div class='carousel-item active'>
                                        <img src='$fotoAtividade' alt='$materiaAtividade' class='d-block' style='width: 100%'>
                                    </div>
                                    <div class='carousel-item'>
                                        <img src='$fotoAtividade' alt='$materiaAtividade' class='d-block' style='width: 100%'>
                                    </div>
                                    <div class='carousel-item'>
                                        <img src='$fotoAtividade' alt='$materiaAtividade' class='d-block' style='width: 100%'>
                                    </div>
                                </div>

                                <button class='carousel-control-prev' type='button' data-bs-target='#Atividade' data-bs-slide='prev'>
                                    <span class='carousel-control-prev-icon'></span>
                                </button>
                                <button class='carousel-control-next' type='button' data-bs-target='#Atividade' data-bs-slide='next'>
                                    <span class='carousel-control-next-icon'></span>
                                </button>
                            </div>
                                
                            <div class='card-body'>
                                <h4 class='card-title'><b>$materiaAtividade</b></h4>
                                <p class='card-text'>$prazoAtividade</p>
                                <p class='card-text'>Intruções: <b>R$ $instrucoesAtividade</b></p>
                                <a href='#' title='materia $materiaAtividade'>
                                    <button class='btn btn-primary'>
                                        materia
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                ";
            }
        }
    }
    else{
        die("<div class='alert alert-danger text-center'>Não foi possível carregar informações deste atividade!</div>");
    }
?>

<?php include("footer.php"); ?>