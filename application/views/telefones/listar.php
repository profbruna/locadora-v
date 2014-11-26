
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Telefones </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">

    <div class="row box-options">
        <a  href="<?php echo base_url("telefones/adicionar/" . $this->uri->segment(3)) ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th> <b> #ID </b> </th>
                <th> Numero </th>
                <th> Tipo </th>
                <th> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($telefones as $telefone) { ?>
                <tr>
                    <td> <b># <?php echo $telefone->id ?></b> </td>
                    <td> <?php echo $telefone->numero ?> </td>
                    <td> <?php echo $tipos[ $telefone->tipo ] ?> </td>
                    <td>
                        <a href="<?php echo base_url("telefones/editar/" . $telefone->id); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                        <a href="<?php echo base_url("telefones/deletar/" . $telefone->id); ?>" data-descricao="<?php echo $telefone->numero ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php echo $this->pagination->create_links() ?>