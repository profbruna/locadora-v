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
        <div class="form-group row">

            <div class="col-md-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="Nome" required=""/>
            </div>  
            <div class="col-md-4">
                <label for="tipo_id">Tipo</label>
                <select class="selectpicker" name="tipo_id" required="required">
                    <?php foreach ($tipos as $tipo) { ?>
                        <option value="<?php echo $tipo->id ?>" > <?php echo $tipo->descricao ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="genero_id">Gênero</label>
                <select class="selectpicker" name="genero_id" required="required">
                    <?php foreach ($generos as $genero) { ?>
                        <option value="<?php echo $genero->id ?>" > <?php echo $genero->descricao ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="classificacao_id">Classificação </label>
                <select class="selectpicker" name="classificacao_id" required="required">
                    <?php foreach ($classificacoes as $classificacao) { ?>
                        <option value="<?php echo $classificacao->id ?>" > <?php echo $classificacao->descricao ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" name="preco" id="Preco" required=""/>
            </div>  
            <div class="col-md-6">
                <label for="qtd_estoque">Quantidade em Estoque</label>
                <input type="text" class="form-control" name="qtd_estoque" id="Estoque" required=""/>
            </div>  
            <div class="col-md-6">
                <label for="qtd_locado">Quantidade Locado</label>
                <input type="text" class="form-control" name="qtd_locado" value="0" id="Locado"/>
            </div>  
            <div class="col-md-6">
                <label for="qtd_descartado">Quantidade Descartada</label>
                <input type="text" class="form-control" name="qtd_descartado"  value="0" id="Descartado" />
            </div>  

            <div class="col-md-6">
                <label for="data_cadastro">Cadastro</label>
                <input type="date" readonly="readonly" class="form-control" name="data_cadastro" value="<?php echo date("Y-m-d");  ?>" id="Cadastro" required=""/>
            </div>  
            <div class="col-md-6">
                <label for="detalhes">Detalhes</label>
                <textarea placeholder="Descreva aqui as informações refenrentes ao produto" class="form-control" name="detalhes" id="Detalhes" required=""></textarea>
            </div>
            <div class="col-md-6">
                <label for="dias_devolucao">Devolução</label>
                <input type="text"  class="form-control" name="dias_devolucao"/>
            </div>  
            <div class="col-md-4">
                <label for="status">Status</label>
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
