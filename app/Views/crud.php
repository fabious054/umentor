<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umentor CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('/css/styles.css') ?>">

    <meta name="site_url" content="<?php echo base_url("/") ?>">
    
</head>
<body>
    <h1>Umentor CRUD</h1>
    <section>
        <form action="<?php echo base_url("/")?>" method="get">
            <div class="header">
                <div class="sectionHeader">
                    <h6 class="titleBox">Meus funcionários</h6>
                    <button data-bs-toggle="modal" data-bs-target="#modalFormularioFuncionario" class="addFuncionario">Adicionar</button>
                </div>
                <div class="filtros">
                    <input value="<?php echo $filtros && $filtros["pesquisa_texto"] && isset($filtros["pesquisa_texto"]) ? $filtros["pesquisa_texto"] : "" ?>" name="pesquisa_texto" type="text" class="form-control" id="busca" placeholder="Buscar funcionário por nome e email">
                    <select name="fltroSituacao" class="form-control">
                        <option value="">Selecione</option>
                        <option <?php echo $filtros && isset($filtros["fltroSituacao"]) && $filtros["fltroSituacao"] == "contratado" ? "selected" : ""  ?> value="contratado">Contratado</option>
                        <option <?php echo $filtros && isset($filtros["fltroSituacao"]) && $filtros["fltroSituacao"] == "demitido" ? "selected" : ""  ?> value="demitido">Demitido</option>
                        <option <?php echo $filtros && isset($filtros["fltroSituacao"]) && $filtros["fltroSituacao"] == "em_teste" ? "selected" : ""  ?> value="em_teste">Em teste</option>
                    </select>
                    <a href="<?php echo base_url("/") ?>" class="btn btn-outline-danger">Limpar</a>
                    <button type="submit"id="btnBuscar" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
        <?php if ($data && !empty($data) ) { ?>
            <table>
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Situação</th>
                    <th>Data Admissão</th>
                    <th>Criado em</th>
                    <th>Última atualização</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach ($data as $funcionario) { ?>
                        <tr data-id="<?php echo $funcionario->id ?>">
                            <td><?php echo $funcionario->id ?></td>
                            <td><?php echo $funcionario->nome ?></td>
                            <td><?php echo $funcionario->email ?></td>
                            <td>
                                <?php 
                                if ($funcionario->situacao == 'contratado') {
                                    echo '<span class="badge text-bg-primary">Contratado</span>';
                                } elseif ($funcionario->situacao == 'demitido') {
                                    echo '<span class="badge text-bg-danger">Demitido</span>';
                                } elseif ($funcionario->situacao == 'em_teste') {
                                    echo '<span class="badge text-bg-info">Em teste</span>';
                                } 
                                  ?>
                            </td>
                            <td>
                                <?php echo ($funcionario->admitido_em) ? date("d/m/Y", strtotime($funcionario->admitido_em)) : date("d/m/Y"); ?>
                            </td>
                            <td>
                                <?php echo ($funcionario->criado_em) ? date("d/m/Y", strtotime($funcionario->criado_em)) : date("d/m/Y"); ?>
                            </td>
                            <td>
                            <?php echo ($funcionario->ultima_atualizacao) ? date("d/m/Y", strtotime($funcionario->ultima_atualizacao)) : date("d/m/Y"); ?>
                            </td>
                            <th>
                                <button data-id="<?php echo $funcionario->id ?>" data-bs-toggle="modal" data-bs-target="#modalFormularioFuncionario" class="btn btn-primary btnEditar"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button data-id="<?php echo $funcionario->id ?>" class="btn btn-danger btnExcluir"><i class="fa-solid fa-trash"></i></button>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else{ ?>
            <div class="semUsuariosBox">
                <p>Nenhum funcionário cadastrado</p>
            </div>
        <?php } ?>
    </section>


    <div id="modalFormularioFuncionario" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
            <form id="formFuncionario" action="<?php echo base_url("/")?>" method="get">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar / Editar funcionário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id" >
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input placeholder="Nome do funcionário" type="text" class="form-control" id="nome" name="nome" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input placeholder="E-mail do funcionário" type="email" class="form-control" id="email" name="email" >
                        </div>
                        <div class="mb-3">
                            <label for="situacao" class="form-label">Situação</label>
                            <select class="form-select" id="situacao" name="situacao" >
                                <option value="">Selecione</option>
                                <option value="contratado">Contratado</option>
                                <option value="demitido">Demitido</option>
                                <option value="em_teste">Em teste</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="admitido_em" class="form-label">Data Admissão</label>
                            <input type="date" class="form-control" id="admitido_em" name="admitido_em" >
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('/js/scripts.js') ?>"></script>
</body>
</html>