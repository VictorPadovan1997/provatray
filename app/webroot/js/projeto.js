function calculoDaComissaoDoVendedor() {
    $("#precoVenda").on("input", function () {
        var valor = $(this).val();
        var valorCorrigido = parseFloat(valor);
        var valorTotalDaVenda = parseFloat(valorCorrigido);
        var valorDaComissao = '0085';
        var calculo = (parseFloat(valorTotalDaVenda) * parseFloat(valorDaComissao));
        $('#produtoMargem').val(calculo.toFixed(2)).trigger('blur');
    });
}