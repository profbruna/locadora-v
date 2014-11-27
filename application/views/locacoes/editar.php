<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h3> Editar Locações </h3>
    </div>
</div>

<div class="clearfix"></div>
<br/>
<div class="col-md-8 col-md-offset-2">
    <div class="row box-options">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
    <form role="form" method="post" class="form-select-default" >
        <div class="form-group row">
            <div class="col-md-5">
                <div class="col-md-12">
                    <label for="Clientes">Clientes</label>
                    <select id="Clientes" class="form-control select-default" name="cliente_id" disabled="">
                        <option  value="default" > -- Escolha um cliente -- </option>
                        <?php foreach ($clientes as $cliente) { ?>
                            <option <?php
                            if ($cliente->id == $locacao[0]->cliente_id) {
                                echo "selected='selected'";
                            }
                            ?> value="<?php echo $cliente->id ?>" > <?php echo $cliente->nome ?> </option>
                            <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <label for="Valor">Valor</label>
                <input type="number" value="<?php echo $locacao[0]->valor ?>" disabled="" class="form-control" id="Valor" required=""/>
                <input type="hidden" value="<?php echo $locacao[0]->valor ?>" name="valor" id="Valor" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">

                <div class="col-md-7">
                    <div class="col-md-8'">
                        <label for="Condicoes">Condições de Pagamento</label>
                        <select id="Condicoes" class="form-control select-default" name="condicao_pagamento_id" required="required">
                            <option selected="selected" value="default" > -- Escolha um pagamento -- </option>
                            <?php foreach ($condicoes as $condicao) { ?>
                                <option <?php
                                if ($condicao->id == $locacao[0]->condicao_pagamento_id) {
                                    echo "selected='selected'";
                                }
                                ?> value="<?php echo $condicao->id ?>" > <?php echo $condicao->nome ?> </option>
                                <?php } ?>
                        </select>
                    </div>
                </div> 
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label for="Observacoes">Observações</label>
                    <textarea class="form-control" name="observacoes" id="Observacões" ><?php echo $locacao[0]->observacoes ?></textarea>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right" disabled > <i class="glyphicon glyphicon-ok" ></i>  Salvar </button>
            </div>
        </div>
    </form>
</div>
