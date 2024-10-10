<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umentor CRUD</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('/css/styles.css') ?>">
    
</head>
<body>
    <h1>Umentor CRUD</h1>
    <section>
        <div class="sectionHeader">
            <h6 class="titleBox">Meus funcionários</h6>
            <button class="addFuncionario">Adicionar</button>
        </div>
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
                        <tr>
                            <td><?php echo $funcionario->id ?></td>
                            <td><?php echo $funcionario->nome ?></td>
                            <td><?php echo $funcionario->email ?></td>
                            <td><?php echo $funcionario->situacao ?></td>
                            <td><?php echo ($funcionario->admitido_em) ? $funcionario->admitido_em : date("d/m/Y")  ?></td>
                            <td><?php echo ($funcionario->criado_em) ? $funcionario->criado_em : date("d/m/Y")  ?></td>
                            <td><?php echo ($funcionario->ultima_atualizacao) ? $funcionario->ultima_atualizacao : date("d/m/Y")  ?></td>
                            <th>
                                <button data-id="<?php echo $funcionario->id ?>" class="btnEditar"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button data-id="<?php echo $funcionario->id ?>" class="btnExcluir"><i class="fa-solid fa-trash"></i></button>
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('/js/scripts.js') ?>"></script>
</body>
</html>