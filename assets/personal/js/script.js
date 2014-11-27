$(document).ready(function () {

    $(".mask-telefone").mask("(99) 9999-9999");
    $(".mask-date").mask("99/99/9999");

    $(".btn-voltar").click(function () {
        history.back();
    });

    $(".btn-modal-deletar").click(function () {
        $("#ModalExcluirTitle").html("Deseja realmente excluir <b>" + $(this).data("descricao") + "</b>?");
        $("#ConfirmaExclusao").attr("href", $(this).attr("href"));
        $('#ModalExcluir').modal('show');
        return false;
    });
    $(".btn-modal-devolver").click(function () {
        $("#ModalDevolverTitle").html("Deseja realmente devolver <b>" + $(this).data("description") + "</b>?");
        $("#ConfirmaDevolucao").attr("href", $(this).attr("href"));
        $('#ModalDevolver').modal('show');
        return false;
    });
    $(".btn-modal-devolverTodos").click(function () {
        $("#ModalDevolverTodosTitle").html("Deseja realmente devolver todos(a) <b>" + $(this).data("description") + "</b>?");
        $("#ConfirmaDevolucaoTodos").attr("href", $(this).attr("href"));
        $('#ModalDevolverTodos').modal('show');
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