<?php include("header.php") ?>

    <div class="container-fluid text-center">

        <h2>Cadastro de Atividade:</h2>

        <div class="d-flex justify-content-center mb-3">

            <div class="row">

                <div class="col-sm-12">

                    <form action="actionAtividadeEstudante.php" class="was-validated" method="POST" enctype="multipart/form-data">

                        <div class="form-floating mb-3 mt-3">
                            <input type="file" class="form-control" id="fotoAtividade" name="fotoAtividade" required>
                            <label for="fotoAtividade" class="form-label">Foto:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <select class="form-select" id="materiaAtividade" name="materiaAtividade" required>
                                <option value="bancoDeDados">Banco de Dados</option>
                                <option value="programacaoWeb1">Programação Web I</option>
                                <option value="geografia1">Geografia I</option>
                                <option value="gestaoDeWebSites">Gestão de Web Sites</option>
                            </select>
                            <label for="materiaAtividade" class="form-label">Matéria:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control" type="date" id="prazoAtividade" name="prazoAtividade" required>
                            <label for="prazoAtividade" class="form-label">Prazo de Entrega:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <textarea class="form-control" id="instrucoesAtividade" name="instrucoesAtividade" required></textarea>
                            <label for="instrucoesAtividade" class="form-label">Instruções da Atividade:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">Cadastrar Atividade</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
       
    </div>

<?php include("footer.php") ?>