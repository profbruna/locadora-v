
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Lançamentos Financeiro </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-10 col-md-offset-1">

    <div class="row box-options">
        <a  href="<?php echo base_url("financeiros/adicionar") ?>" class="btn btn-primary pull-right" > <i class="glyphicon glyphicon-plus" ></i> Adicionar </a>
    </div>

    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th> #Id </th>
                <th> Locação ID </th>
                <th> Vencimento </th>
                <th> Valor </th>
                <th> Valor Pago </th>
                <th> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($financeiros as $financeiro) { ?>
                <tr>
                    <td> <b>#<?php echo $financeiro->id ?></b> </td>
                    <td> <?php echo $financeiro->locacao_id ?> </td>
                    <td> <?php echo implode('/', array_reverse(explode('-', $financeiro->vencimento))) ?> </td>
                    <td> R$ <?php echo $financeiro->valor ?> </td>
                    <td> <?php
                        if ($financeiro->valor_pago != '') {
                            echo 'R$ ' . $financeiro->valor_pago;
                        } else {
                            echo 'Aguardando Pagamento';
                        }
                        ?> </td>
                    <td>
                        <?php
                        if ($financeiro->valor_pago != '') {
                            ?>
                            <a href='javascript:;' class="btn btn-xs btn-success disabled" > <i class="glyphicon glyphicon-usd" ></i> Baixa </a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo base_url("financeiros/baixa/" . $financeiro->id); ?>" class="btn btn-xs btn-success" > <i class="glyphicon glyphicon-usd" ></i> Baixa </a>
                            <?php
                        }
                        ?>
                        <a href="<?php echo base_url("financeiros/editar/" . $financeiro->id); ?>" class="btn btn-xs btn-warning" > <i class="glyphicon glyphicon-pencil" ></i> Editar </a>
                        <a href="<?php echo base_url("financeiros/deletar/" . $financeiro->id); ?>" data-descricao="<?php echo $financeiro->id ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php echo $this->pagination->create_links(); ?>
</div>