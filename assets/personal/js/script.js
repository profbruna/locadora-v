$(document).ready(function() {
    $('#data').datepicker({
        format: "yyyy-mm-dd",
        language: "pt"
    });
    $('#data2').datepicker({
        format: "yyyy-mm-dd",
        language: "pt"
    });
    $(".mask-telefone").mask("(99) 9999-9999");

    $(".btn-voltar").click(function() {
        history.back();
    });

    $(".btn-modal-deletar").click(function() {
        $("#ModalExcluirTitle").html("Deseja realmente excluir <b>" + $(this).data("descricao") + "</b>?");
        $("#ConfirmaExclusao").attr("href", $(this).attr("href"));
        $('#ModalExcluir').modal('show');
        return false;
    });

    $(".selectpicker").selectpicker();
    
    $(".list-produto-preco").change(function () {
        var valorProduto = $(this).find("option:selected").data("preco");
        var quantidade = $("input[name=quantidade]").val();
        somarQuantidadeValorProduto(valorProduto, quantidade);
    });

    $("input[name=quantidade]").focusout(function () {
        var valorProduto = $(".list-produto-preco").find("option:selected").data("preco");
        var quantidade = $(this).val();
        somarQuantidadeValorProduto(valorProduto, quantidade);
    });

    formSelect();
    $(".form-select-default select").change(function () {
        formSelect();
    });

});