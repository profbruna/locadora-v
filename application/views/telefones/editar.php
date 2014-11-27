<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Editar Telefone </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $telefone[0]->id ?>"
               <div class="form-group row">
            <div class="col-md-6">
                <label for="Nome">Numero</label>
                <input type="text" value="<?php echo $telefone[0]->numero ?>" class="form-control" name="numero" id="Numero" required=""/>
            </div>  
            <div class="col-md-6">
                <label for="Tipo">Tipo</label><br/>
                <select class="selectpicker" name="tipo" required="required">
                    <option value="1">Residencial</option>
                    <option value="2">Comercial</option>
                    <option value="3">Celular</option>
                    <option value="4">Inativo</option>
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
