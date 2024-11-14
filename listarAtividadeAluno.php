<?php include "header.php" ?>

<?php
    echo "<h1 class='text-center'>Lista Atividade</h1>";
    $listarAtividadeAluno = "SELECT * FROM Atividade"; //Cria a query para buscar Atividades

    include "conexaoBD.php"; //Inclui o arquivo de conexão com o BD
    $res = mysqli_query($conn, $listarAtividade) or die("Erro ao tentar listar Atividade!") . mysqli_error($conn);

    $totalAtividade = mysqli_num_rows($res); //Busca o total de registros retornados pela query

    echo "<div class='alert alert-info text-center'>Há $totalAtividade Atividades cadastrados!</div>";

    //Monta a tabela para exibir os registros
    echo "
    <table class='table'>
        <thead class='table-dark'>
            <tr>
                <th>FOTO</th>
                <th>MATERIA</th>
                <th>PRAZO DE ENTREGA</th>
                <th>INSTRUÇÕES DE ATIVIDADE</th>
            <tr>
        </thead>
        <tbody>
    ";

    while($registro = mysqli_fetch_assoc($res)){
        //Armazena em variáveis PHP os registros encontrados na tabela
        $fotoAtividade         = $registro["fotoAtividade"];
        $nomeAtividade         = $registro["nomeAtividade"];
        $materiaAtividade      = $registro["materiaAtividade"];
        $prazoAtividade        = $registro["prazoAtividade"];
        $instrucaoAtividade    = $registro["instrucaoAtividade"];

        //Exibe os registros encontrados
        echo "
            <tr>
                <td>$idAtividade</td>
                <td><img src='$fotoAtividade' width='100' title='Foto de $nomeAtividade'</td>
                <td>$nomeAtividade</td>
                <td>$materiaAtividade</td>
                <td>$prazoAtividade</td>
                <td>$instrucaoAtividade</td>
            </tr>
        ";
    }
    echo "</tbody>";
echo "</table>";


?>

<?php include "footer.php" ?>