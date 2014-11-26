<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Editar Estados </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $estados[0]->id ?>"/>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="Nome" required="" value="<?php echo $estados[0]->nome ?>"/>
            </div>
            <div class="col-md-6">
                <label for="Sigla">Sigla</label>
                <input type="text" class="form-control" name="sigla" id="Sigla" required="" value="<?php echo $estados[0]->sigla ?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>
