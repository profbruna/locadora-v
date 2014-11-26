<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Editar Endereço </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <input type="hidden" name="cliente_id" value="<?php echo $endereco[0]->cliente_id; ?>"/>    
        <div class="form-group row">
            <div class="col-md-12">
                <label for="Logradouro">Logradouro</label>
                <input type="text" value="<?php echo $endereco[0]->logradouro; ?>" class="form-control" name="logradouro" id="Nome" required=""/>
            </div>

            <div class="col-md-6">
                <label for="Tipo">Tipo</label>
                <select class="form-control" name="tipo">
                    <?php foreach ($tipos as $tipo): ?>
                        <option value="<?php echo $tipo->id; ?>"><?php echo $tipo->descricao; ?></option>
                    <?php endforeach; ?> 
                </select>
            </div>

            <div class="col-md-6">
                <label for="cep">Cep</label>
                <input type="text" value="<?php echo $endereco[0]->cep; ?>" class="form-control" name="cep" id="Rg" required=""/>
            </div>

            <div class="col-md-3">
                <label for="numero">Número</label>
                <input type="text"  value="<?php echo $endereco[0]->numero; ?>" class="form-control" name="numero" id="Email" required=""/>
            </div>
            <div class="col-md-9">
                <label for="complemento">Complemento</label>
                <input type="text"  value="<?php echo $endereco[0]->complemento; ?>" class="form-control" name="complemento" id="Email" required=""/>
            </div>
            <div class="col-md-8">
                <label for="bairro">Bairro</label>
                <input type="text"  value="<?php echo $endereco[0]->bairro; ?>" class="form-control" name="bairro" id="Email" required=""/>
            </div>
            <div class="col-md-4">
                <label for="descricao">Cidade</label>
                <select class="form-control" name="cidade_id">
                    <?php foreach ($cidades as $cidade): ?>
                        <option value="<?php echo $cidade->id; ?>"><?php echo $cidade->nome; ?></option>
                    <?php endforeach; ?>
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
