<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Informações - <small> <?php echo $clientes[$locacao[0]->cliente_id]->nome ?> </small>  </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>
<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <fieldset>
        <div class=" row">
            <div class="col-md-12 align-right">
                Nome: <strong><?php echo $clientes[$locacao[0]->cliente_id]->nome ?></strong><br/>
                Valor Total: <strong>R$: <?php echo $locacao[0]->valor ?></strong><br/>
                Data: <strong>R$: <?php echo dateToBr($locacao[0]->data) ?></strong><br/>
                Forma de Pagamento: <strong><?php echo $condicoes[$locacao[0]->condicao_pagamento_id]->nome ?></strong><br/>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="col-md-12">
                Observações: <strong><?php echo $locacao[0]->observacoes ?></strong>
            </div>
        </div>     
    </fieldset><br/><br/>
    <table class="table table-hover table-striped" >
        <tr>
            <th> # ID </th>
            <th> Nome do Produto </th>
            <th> Quantidade </th>
            <th> Data de devolução </th>
            <th> Hora de devolução </th>
        </tr>
        <?php foreach ($produtosLocacoes as $produtoLocacao) { ?>
            <tr>
                <td> <?php echo $produtoLocacao->id ?> </td>
                <td> <?php echo $produtos[$produtoLocacao->produto_id]->nome ?> </td>
                <td> <?php echo $produtoLocacao->quantidade ?> </td>
                <td> <?php echo dateToBr($produtoLocacao->data_devolucao) ?> </td>
                <td> <?php echo $produtoLocacao->hora_devolucao ?> </td>
            </tr>
        <?php } ?>
    </table>
</div>


