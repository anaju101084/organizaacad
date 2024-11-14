<?php include("header.php"); ?>

<div class="container text-center mt-3 mb-5">

    <?php
    $dataAtual = date('Y-m-d');

    // Conexão com o banco de dados
    //Inclui o arquivo de conexao com o banco de dados
    include "conexaoBD.php";

    // Consultar atividades
    $listarAtividades = "SELECT a.fotoAtividade, a.prazoAtividade, a.materiaAtividade, a.instrucoesAtividade, u.nomeUsuario, u.fotoUsuario 
            FROM atividades a 
            JOIN usuarios u ON a.matriculaUsuario = u.matriculaUsuario";

    if(isset($_GET["filtroAtividades"])){
        $filtroAtividade = $_GET["filtroAtividades"];
        if ($filtroAtividade != "todos"){
            if($filtroAtividade == "recentes"){
                $listarAtividades = $listarAtividades . " WHERE a.prazoAtividade >= '$dataAtual'";
            }
            else{
                $listarAtividades = $listarAtividades . " WHERE a.prazoAtividade < '$dataAtual'";
            }
            //$listarAtividades = $listarAtividades . " WHERE "
        }
    }

    $res = mysqli_query($conn, $listarAtividades);

    $numAtividades = mysqli_num_rows($res);

    // Exibir quantidade de atividades
    echo '<div class="alert alert-info text-center" style="width:50%; margin:auto;">';
    echo 'Há <strong>' . $numAtividades . '</strong> Atividades cadastradas em nosso sistema!';
    echo '</div>';
    ?>

    <br>

    <!-- Formulário para aplicar filtros aos produtos -->
    <form name="formFiltro" action="index.php" method="GET" style="width:50%; margin:auto;">
        <select class="form-select" name="filtroAtividades" required>
            <option value="todos">Visualizar todas as atividades</option>
            <option value="recentes">Visualizar apenas atividades recentes</option>
            <option value="atrasadas">Visualizar apenas atividades atrasadas</option>
        </select><br>
        <button type="submit" class="btn btn-primary" style="float:right">
            Filtrar Atividades
        </button>
    </form>

    <!-- Início da primeira linha da GRID -->
    <div class="row mt-5">
        <?php
        // Verificar se há atividades
        if ($numAtividades > 0) {
            // Exibir cada atividade
            while ($row = $res->fetch_assoc()) {
                echo '<div class="col-sm-3">';
                echo '    <div class="card" style="width:100%; height:100%;">';
                echo '        <img class="card-img-top" src="' . $row['fotoAtividade'] . '" alt="Foto da Atividade">';
                echo '        <div class="card-body">';
                switch($row['materiaAtividade']){
                    case "BancoDeDados" : $row['materiaAtividade'] = "Banco de Dados";
                    break;
                    case "programacaoWeb1" : $row['materiaAtividade'] = "Programação Web I";
                    break;
                    case "geografia1" : $row['materiaAtividade'] = "Geografia I";
                    break;
                }
                echo '            <h4 class="card-title">' . $row['materiaAtividade'] . '</h4>';
                echo '            <p>' . $row['instrucoesAtividade'] . '</p>';
                echo '            <p>Prazo: ' . $row['prazoAtividade'] . '</p>';
                echo '            <p>Aluno: ' . $row['nomeUsuario'] . '</p>';
                echo '            <img src="' . $row['fotoUsuario'] . '" alt="Foto do Aluno" style="width:50px; height:50px; border-radius:50%;">';
                echo '            <a href="#" class="btn btn-primary">Ver Detalhes</a>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12">Nenhuma atividade cadastrada.</div>';
        }

        // Fechar conexão
        $conn->close();
        ?>
    </div>

</div>

<?php include("footer.php"); ?>
