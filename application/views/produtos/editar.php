<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Adicionar Produtos </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $produto[0]->id ?>"
        <div class="form-group row">
            <div class="col-md-6">
                <label for="Nome">Nome</label>
                <input type="text" value="<?php echo $produto[0]->nome ?>" class="form-control" name="nome" id="Nome" required=""/>
            </div>  
            <div class="col-md-4">
                <label for="tipo_id">Tipo</label>
                <select class="selectpicker" name="tipo_id" required="required">
                    <?php foreach( $tipos as $tipo ){ ?>
                        <option <?php if( $tipo->id == $produto[0]->tipo_id ){ echo "selected='selected'"; } ?> value="<?php echo $tipo->id ?>" > <?php echo $tipo->descricao ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="genero_id">Gênero</label>
                <select class="selectpicker" name="genero_id" required="required">
                    <?php foreach( $generos as $genero ){ ?>
                        <option <?php if( $genero->id == $produto[0]->genero_id ){ echo "selected='selected'"; } ?> value="<?php echo $genero->id ?>" > <?php echo $genero->descricao ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="classificacao_id">Classificação</label>
                <select class="selectpicker" name="classificacao_id" required="required">
                    <?php foreach( $classificacoes as $classificacao ){ ?>
                        <option <?php if( $classificacao->id == $produto[0]->classificacao_id ){ echo "selected='selected'"; } ?> value="<?php echo $classificacao->id ?>" > <?php echo $classificacao->descricao ?> </option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="preco">Preço</label>
                <input type="text" value="<?php echo $produto[0]->preco ?>" class="form-control" name="preco" id="Preco" required=""/>
            </div>  
            <div class="col-md-6">
                <label for="qtd_estoque">Quantidade em Estoque</label>
                <input type="text" value="<?php echo $produto[0]->qtd_estoque ?>" class="form-control" name="qtd_estoque" id="Estoque" required=""/>
            </div>  
            <div class="col-md-6">
                <label for="qtd_locado">Quantidade Locado</label>
                <input type="text" value="<?php echo $produto[0]->qtd_locado ?>" class="form-control" name="qtd_locado" id="Locado" required=""/>
            </div>  
            <div class="col-md-6">
                <label for="qtd_descartado">Quantidade Descartada</label>
                <input type="text" value="<?php echo $produto[0]->qtd_descartado ?>" class="form-control" name="qtd_descartado" id="Descartado" required=""/>
            </div>
            <div class="col-md-6">
                <label for="data_cadastro">Cadastro</label>
                <input type="date" value="<?php echo $produto[0]->data_cadastro ?>" class="form-control" name="data_cadastro" id="Cadastro" required=""/>
            </div>  
            <div class="col-md-6">
                <label for="detalhes">Detalhes</label>
                <input type="text" value="<?php echo $produto[0]->detalhes ?>" class="form-control" name="detalhes" id="Detalhes" required=""/>
            </div>
            <div class="col-md-6">
                <label for="data_devolucao">Devolução</label>
                <textarea value="<?php echo $produto[0]->dias_devolucao ?>" placeholder="Quantidade de dias para a devolução" class="form-control" name="devolucao" id="Devolucao" required=""></textarea>
            </div>  
            <div class="col-md-4">
                <label for="Status">Status</label>
                <select class="selectpicker" name="status" required="required">
                        <option value="1" >Disponível</option>
                        <option value="0">Indisponível</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
