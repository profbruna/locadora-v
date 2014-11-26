
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Usuários </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">

    <div class="row box-options">
        <a  href="<?php echo base_url("usuarios/adicionar") ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th> #Id </th>
                <th> Nome </th>
                <th> Email </th>
                <th> Login </th>
                <th> Status </th>
                <th> Senha </th>
                <th> Falha </th>
                <th> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td> <?php echo $usuario->id ?> </td>
                    <td> <?php echo $usuario->nome ?> </td>
                    <td> <?php echo $usuario->email ?> </td>
                    <td> <?php echo $usuario->login ?> </td>
                    <td> <?php echo $usuario->status ?> </td>
                    <td> <?php echo $usuario->senha ?> </td>
                    <td> <?php echo $usuario->falha ?> </td>
                    <td>
                        <a href="<?php echo base_url("usuarios/editar/" . $usuario->id); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                        <a href="<?php echo base_url("usuarios/deletar/" . $usuario->id); ?>" data-descricao="<?php echo $usuario->nome ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>