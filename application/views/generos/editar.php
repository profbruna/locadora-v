<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Editar GÊneros </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $genero[0]->id ?>"
        <div class="form-group row">
            <div class="col-md-6">
                <label for="Descricao">Descrição</label>
                <input type="text" value="<?php echo $genero[0]->descricao ?>" class="form-control" name="descricao" id="Descricao" required=""/>
            </div>  
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
