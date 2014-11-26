function somarQuantidadeValorProduto(preco, quantidade) {
    if (quantidade !== "") {
        $("#Valor").val(preco * quantidade);
        $("input[name=valor]").val(preco * quantidade);
    }
}

function formSelect() {
    var qtdSelectsDefault = $(".form-select-default").find(".select-default");
    var permissao = true;
    for (var i = 0; i < qtdSelectsDefault.length; i++) {
        if ($(qtdSelectsDefault[i]).val() === "default") {
            permissao = false;
        }
    }
   
    if (permissao) {
        $(".form-select-default").find("button[type=submit]").attr("disabled", false);
    } else {
        $(".form-select-default").find("button[type=submit]").attr("disabled", true);
    }
}