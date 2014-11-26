<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Adicionar Cidades </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>

<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post">
        <input type="hidden" name="id" value="<?php echo $cidade[0]->id ?>"
        <div class="form-group row">
            <div class="col-md-6">
                <label for="Nome">Nome</label>
                <input type="text" value="<?php echo $cidade[0]->nome ?>" class="form-control" name="nome" id="Nome" required=""/>
            </div>  
            <div class="col-md-4">
                <label for="Estado">Estado</label>
                <select class="selectpicker" name="estado_id" required="required">
                    <?php foreach( $estados as $estado ){ ?>
                        <option <?php if( $estado->id == $cidade[0]->estado_id ){ echo "selected='selected'"; } ?> value="<?php echo $estado->id ?>" > <?php echo $estado->nome ?> </option>
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
