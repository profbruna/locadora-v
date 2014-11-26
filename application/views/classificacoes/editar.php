<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Editar Classificação </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $classificacao[0]->id ?>">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="classificao">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="classificao" required="" value="<?php echo $classificacao[0]->descricao ?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
