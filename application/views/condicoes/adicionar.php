<?php header('Content-type: text/html; charset=utf-8'); ?>
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
        <h2> Adicionar Condição de Pagamento </h2>
    </div>
    <div class="col-md-12">
        <a class="btn btn-danger btn-voltar" > <i class="glyphicon glyphicon-arrow-left" ></i> Voltar </a>
    </div>
</div>

<div class="clearfix"></div>
<br/>
<div class="col-md-8 col-md-offset-2">
    <output>
        <?php
        $Type = $this->session->flashdata('output_type');
        if ($Type !== false) {
            if ($Type == "success") {
                echo " <div class='alert alert-success alert-dismissible' role='alert'>";
            } else if ($Type == "alert") {
                echo " <div class='alert alert-warning alert-dismissible' role='alert'>";
            } else {
                echo " <div class='alert alert-danger alert-dismissible' role='alert'>";
            }
            echo "  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>";
            echo "  <strong>{$this->session->flashdata('output_text')}</strong>";
            echo " </div>";
        }
        ?>

    </output>
</div>
<div class="col-md-8 col-md-offset-2">

    <form role="form" method="post" action="<?php echo base_url("condicoes/adicionar") ?>">
        <div class="form-group col-md-12">
            <div class="col-md-12">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="Nome" required=""/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-6">
                <label for="Parcelas">Parcelas</label>
                <input type="text" class="form-control" name="parcelas" id="Parcelas" required=""/>
            </div>
            <div class="col-md-6">
                <label for="Dias">Dias</label>
                <input type="text" class="form-control" name="dias" id="Dias" required=""/>
            </div>   

        </div>     
        <div class="form-group col-md-12">
            <div class="col-md-12" >
                <button type="submit" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-ok" ></i> Salvar</button>
            </div>
        </div>
    </form>
</div>