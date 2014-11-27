
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Locações </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">

    <div class="row box-options">
        <a  href="<?php echo base_url("locacoes/adicionar") ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
    </div>
    

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th> <b> #ID </b> </th>
                <th> Data </th>
                <th> Cliente </th>
                <th> Valor </th>
                <th> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locacoes as $locacao) { ?>
                <tr>
                    <td> <b># <?php echo $locacao["locacao"]->id ?></b> </td>
                    <td> <?php echo dateToBr($locacao["locacao"]->data) ?> </td>
                    <td> <?php echo $clientes[$locacao["locacao"]->cliente_id]->nome ?> </td>
                    <td> <strong>R$: </strong> <?php echo $locacao["locacao"]->valor ?> </td>
                    <td>
                        <a href="<?php echo base_url("locacoes/editar/" . $locacao["locacao"]->id); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                        <a href="<?php echo base_url("locacoes/deletar/" . $locacao["locacao"]->id); ?>" data-descricao="<?php echo $clientes[$locacao["locacao"]->cliente_id]->nome ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                        <a href="<?php echo base_url("locacoes/info/" . $locacao["locacao"]->id); ?>" class="btn btn-xs btn-success" > <i class="glyphicon glyphicon-list" ></i> Informações </a>
                        <a href="<?php echo base_url("produtoslocacoes/listar/" . $locacao["locacao"]->id); ?>" class="btn btn-xs btn-info" > <i class="glyphicon glyphicon-plus" ></i> Adicionar Produtos </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php echo $this->pagination->create_links() ?>