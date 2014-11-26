<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Adicionar Telefone </h3>
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
            <div class="col-md-3">
                <label for="Nome">Numero</label>
                <input type="text" class="form-control" name="numero" id="Numero" required=""/>
            </div>  
            <div class="col-md-3">
                <label for="Nome">Tipo</label>
                <input type="text" class="form-control" name="tipo" id="Tipo" required=""/>
            </div>  
            <div class="col-md-4">
                <label for="Cliente_id">Cliente</label>
                <select class="selectpicker" name="cliente_id" required="required">
                    <?php foreach ($cliente as $clientes) { ?>
                        <option value="<?php echo $clientes->id ?>" > <?php echo $clientes->nome ?> </option>
                    <?php } ?>
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
