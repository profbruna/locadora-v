<div class="col-md-8 col-md-offset-2"> 
    <div class="page-header">
        <h2> Adicionar endereço  </h2>
    </div>
  
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
 <br/>
    <div class="col-md-12">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
 <br/>
<br/>
<hr>
    <form role="form" action="" method="post">
        <div class="form-group col-md-12">
            <div class="col-md-12">
                <label for="descricao">Cliente</label>
                <!--<select class="form-control" name="cliente_id">-->
                <?php foreach ($clientes as $cliente): ?>
                    <select name="cliente_id" class="form-control">
                        <?php foreach ($clientes as $cliente): ?>

                            <option value="<?php echo $this->uri->segment(3) ?>"><?php echo $cliente->nome ?></option>
                        <?php endforeach; ?>
                    </select> 
                <?php endforeach; ?>          
            </div>
            <div class="col-md-6">
                <label for="descricao">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro" required="required">
            </div>  

            <div class="col-md-6">
                <label for="descricao">Tipo</label>
                <select class="form-control" name="tipo">
                    <?php foreach ($tipos as $tipo): ?>
                        <option value="<?php echo $tipo->id; ?>"><?php echo $tipo->descricao; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>  

            <div class="col-md-4">
                <label for="descricao">CEP</label>
                <input type="text" class="form-control" name="cep" id="cep" required="required">
            </div>  

            <div class="col-md-2">
                <label for="descricao">Número</label>
                <input type="text" class="form-control" name="numero" id="numero" required="required">
            </div>  

            <div class="col-md-6">
                <label for="descricao">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="bairro" required="required">
            </div>  

            <div class="col-md-6">
                <label for="descricao">Complemento</label>
                <input type="text" class="form-control" name="complemento" id="complemento" required="required">
            </div>  

            <div class="col-md-6">
                <label for="descricao">Cidade</label>
                <select class="form-control" name="cidade_id">
                    <?php foreach ($cidades as $cidade): ?>
                        <option value="<?php echo $cidade->id; ?>"><?php echo $cidade->nome; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>  
            <div class="form-group col-md-12">
                <div class="col-md-12" ><br/>
                    <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>
