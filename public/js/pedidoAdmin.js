$(document).ready( function() {

    function showUpdatedPedidos(pedidos){
        // Procuro onde irei imprimir as informações
        divListPedidos = $("#id-div-lista-pedidos");
        // Limpa tudo que tenha dentro da div
        divListPedidos.html("");
        pedidos.forEach( pedido => {
            // Imprimir as informação da variável produto
            divListPedidos.append(`
                <a href="#" class="list-group-item list-group-item-action">Pedido ${pedido.id}</a>
            `);
        });
    }

    function updatePedidos(){
        $.ajax({
            type: "GET",
            url: `/pedido/admin/getpedidos/`,
            data: null,
            dataType: "json",
            success: function(response){
                console.log(response);
                // Imprimir os pedidos no local correto
                pedidos = response.return;
                showUpdatedPedidos(pedidos);
            },
            error: function(error){
                console.log("Erro");
                console.log(error);
            }
        });
    }

    function updateTipoProdutosDropDown(){
        $.ajax({
            type: "GET",
            url: `/pedido/admin/gettipoprodutos`,
            data: null,
            dataType: "json",
            success: function(response){
                console.log(response);
                printSelectTipoProdutos(response.return);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function printSelectTipoProdutos(arrayTipoProdutos) {
        // Procuro onde irei imprimir as informações
        divTipoProdutos = $("#id-div-lista-tipo-produtos");
        // Limpa tudo que tenha dentro da div
        divTipoProdutos.html("");
        arrayTipoProdutos.forEach( tipoProduto => {
            // Imprimir as informação da variável produto
            divTipoProdutos.append(`
                <option value="${tipoProduto.id}">${tipoProduto.descricao}</option>
            `);
        });
    }

    // Chama a função inicialmente quando carregar a página
    updatePedidos();
    updateTipoProdutosDropDown();
});
