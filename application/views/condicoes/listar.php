<?php header('Content-type: text/html; charset=utf-8'); ?>
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Condições </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">

    <div class="row box-options">
        <a  href="<?php echo base_url("condicoes/adicionar") ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th> #Id </th>
                <th> Nome </th>
                <th> Parcelas </th>
                <th> Dias Vencimento </th>
                <th> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($condicoes as $condicao) { ?>
                <tr>
                    <td> <b>#<?php echo $condicao->id ?></b> </td>
                    <td> <?php echo $condicao->nome ?> </td>
                    <td> <?php echo $condicao->parcelas ?> </td>
                    <td> <?php echo $condicao->dias ?> </td>
                    <td>
                        <a href="<?php echo base_url("condicoes/editar/" . $condicao->id); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                        <a href="<?php echo base_url("condicoes/deletar/" . $condicao->id); ?>" data-descricao="<?php echo $condicao->nome ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php echo $this->pagination->create_links(); ?>
</div>