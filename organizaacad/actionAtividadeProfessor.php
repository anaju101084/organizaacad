<?php include "header.php"; ?>

<?php
    //Bloco para declaração de variáveis PHP
    $fotoAtividade = $materiaAtividade = $prazoAtividade = $instrucoesAtividade = "";
    $erroPreenchimento = false;
    $matriculaUsuario = '20223003388';

    //Verifica o método de requisição do formulário
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Validação do campo nomeUsuario utilizando a função empty
        //Verifica se o campo do formulário está vazio e caso sim, exibe mensagem de alerta
        if(empty($_POST["materiaAtividade"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>Matéria</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        }
        //Se o campo não estiver vazio, ele filtra o dado e armazena na variável PHP
        else {
            $materiaAtividade = filtrar_entrada($_POST["materiaAtividade"]);
        }

        //Validação do campo cidadeUsuario utilizando a função empty
        if(empty($_POST["prazoAtividade"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>Prazo de Entrega</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        }
        else {
            $prazoAtividade = filtrar_entrada($_POST["prazoAtividade"]);
        }

        //Validação do campo emailUsuario utilizando a função empty
        if(empty($_POST["instrucoesAtividade"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>Instrução da Atividade</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        }
        else {
            $instrucoesAtividade = filtrar_entrada($_POST["instrucoesAtividade"]);
        }

        //Início do bloco de validação da FOTO
        $diretorio    = "img/"; //Define para qual diretório do sistema as imagens serão movidas
        $fotoAtividade  = $diretorio . basename($_FILES['fotoAtividade']['name']); // img/paulinho.jpg
        $erroUpload   = false; //Variável criada para verificar se houve erro no upload da foto
        $tipoDaImagem = strtolower(pathinfo($fotoAtividade, PATHINFO_EXTENSION)); //Pegar o tipo do arquivo

        //Verificar se o tamanho do arquivo é diferente de ZERO
        if($_FILES['fotoAtividade']['size'] != 0){
            
            //Verificar se o tamanho do arquivo da foto é maior do que 5MB
            if($_FILES['fotoAtividade']['size'] > 5000000){
                echo "<div class='alert alert-warning text-center'>A foto não pode ter <strong>TAMANHO</strong> maior do que 5MB!</div>";
                $erroUpload = true;
            }

            //Verificar o tipo do arquivo (pela extensão)
            if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                echo "<div class='alert alert-warning text-center'>A foto precisa estar nos formatos <strong>JPG, JPEG, PNG ou WEBP</strong>!</div>";
                $erroUpload = true;
            }

            //Verificar se o arquivo conseguiu ser movido para o diretório IMG
            if(!move_uploaded_file($_FILES['fotoAtividade']['tmp_name'], $fotoAtividade)){
                echo "<div class='alert alert-danger text-center'>Erro ao tentar <strong>MOVER A FOTO</strong> para o diretório de imagens!</div>";
                $erroUpload = true;
            }

        }
        else{
            echo "<div class='alert alert-warning text-center'>A <strong>foto</strong> é obrigatória!</div>";
            $erroUpload = true;
        }

        //Se não houverem erros de preenchimento, exibe os dados cadastrados!
        if(!$erroPreenchimento && !$erroUpload){

            //Armazena a QUERY na variável $inserirUsuario
            $inseriratividadeprofessor = "INSERT INTO atividadeprofessor (matriculaUsuario, fotoAtividade, materiaAtividade, prazoAtividade, instrucoesAtividade) VALUES ('$matriculaUsuario','$fotoAtividade', '$materiaAtividade', '$prazoAtividade', '$instrucoesAtividade')";

            //Inclui o arquivo de conexao com o banco de dados
            include "conexaoBD.php";

            //Utiliza a função msyqli_query() para executar a QUERY
            //Se a função conseguir executar a query, exibe mensagem e monta a tabela com os dados cadastrados
            if(mysqli_query($conn, $inseriratividadeprofessor)){
                echo "
                    <div class='alert alert-success text-center'><strong>Atividade</strong> cadastrada com sucesso!</div>
                    <div class='container mt-3'>
                        <div class='container mt-3 text-center'>
                            <img src='$fotoAtividade' width='150' title='Foto de $materiaAtividade'>
                        </div>
                        <div class='table-responsive'>
                            <table class='table'>
                                <tr>
                                    <th>Matéria</th>
                                    <td>$materiaAtividade</td>
                                </tr>
                                <tr>
                                    <th>PRAZO</th>
                                    <td>$prazoAtividade</td>
                                </tr>
                                <tr>
                                    <th>INTRUÇÕES</th>
                                    <td>$instrucoesAtividade</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                ";
            }
            else{
                echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Usuário</strong></div>" . mysqli_error($conn);
            }
            
        }

    }

    //Função para filtrar dados do formulário e evitar SQL Injection
    function filtrar_entrada($dado){
        $dado = trim($dado); //Remove espaços desnecessários
        $dado = stripslashes($dado); //Remove as barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais em entidades HTML

        return($dado);
    }

?>

<?php include "footer.php"; ?>