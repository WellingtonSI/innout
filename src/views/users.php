<main class="content">
    <?php
        renderTitle(
            'Cadastro de Usuário',
            'Mantenha os dados dos usuário atualizados',
            'icofont-users'
        );
        
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <a class="btn btn-lg btn-primary mb-3" href="save_user.php">Novo Usuário</a>

    <table class="table table-bordered table-hover">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Adminissão</th>
            <th>Data de Desligamento</th>
            <th>Ações</th> 
        </thead>
        <tbody>
            <?php foreach($users as $user):?>
                <tr>
                    <td><?= $user->name?></td>
                    <td><?= $user->email?></td>
                    <td><?= $user->start_date?></td>
                    <td><?= $user->end_date?></td>
                    <td> 
                        <a href="save_user.php?update=<?= $user->id ?>" 
                            class="btn btn-warning rounred-circle m-1 ">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?= $user->id ?>" 
                            class="btn btn-danger rounred-circle m-1">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>