<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Adicionar produtos a locação </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>
<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a href="<?php echo base_url( "locacoes/listar" ); ?>" class="btn btn-primary" > <i class="glyphicon glyphicon-arrow-left" ></i> Finalizar </a>
    </div>
    <form role="form" action="<?php echo base_url("produtoslocacoes/adicionar"); ?>" method="post" class="form-select-default" >
        <input type="hidden" name="locacao_id" value="<?php echo $this->uri->segment(3) ?>">
        <div class="form-group row">
            <div class="col-md-5">
                <div class="col-md-12">
                    <label for="Produtos">Produtos</label>
                    <select id="Produtos" class="form-control select-default list-produto-preco" name="produto_id" required="required">
                        <option selected="selected" value="default" > -- Escolha um produto -- </option>
                        <?php foreach ($produtos as $produto) { ?>
                            <option data-preco="<?php echo $produto->preco ?>" value="<?php echo $produto->id ?>" > <?php echo $produto->nome ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <label for="Quantidade">Quantidade</label>
                <input type="text" class="form-control" name="quantidade" id="Quantidade" required=""/>
            </div>
            <div class="col-md-5">
                <label for="Valor">Valor</label>
                <input type="text" disabled="" class="form-control" id="Valor" required=""/>
                <input type="hidden" name="valor" id="Valor" />
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right" disabled > <i class="glyphicon glyphicon-ok" ></i>  Salvar </button>
            </div>
        </div>
    </form>
</div>
<div class="clearfix"></div>

<div class="col-md-12">
    Valor Total: <strong> R$: <?php echo $locacao[0]->valor; ?> </strong>
</div>
<br/><br/>
<div class="col-md-9 col-md-offset-1"><br/>
    <table class="table table-hover table-striped" >
        <thead>
            <tr>
                <th> <b> #ID </b> </th>
                <th> Nome do Produto </th>
                <th> Quantidade </th>  
                <th> Preço </th>  
                <th> Data devoluçao </th>  
                <th> Hora devoluçao </th> 
                <th> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosLocacoes as $produtoLocacao) : ?>
                <tr>
                    <td> <?php echo $produtoLocacao->id ?> </td>
                    <td> <?php echo $produtos[$produtoLocacao->produto_id]->nome ?> </td>
                    <td> <?php echo $produtoLocacao->quantidade ?> </td>
                    <td> <strong>R$: </strong><?php echo $produtos[$produtoLocacao->produto_id]->preco ?> </td>
                    <td> <?php echo $produtoLocacao->data_devolucao ?> </td>
                    <td> <?php echo $produtoLocacao->hora_devolucao ?> </td>
                    <td>
                        <a href="<?php echo base_url("produtoslocacoes/deletar/" . $produtoLocacao->id."/".$produtoLocacao->locacao_id); ?>" data-descricao="<?php echo $produtos[ $produtoLocacao->produto_id ]->nome ?>" class="btn btn-xs btn-danger btn-modal-deletar" > <i class="glyphicon glyphicon-remove" ></i> Deletar </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>

