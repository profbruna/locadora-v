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

});