$(document).ready( function() {

    function printPedidos(pedidos){
        // Procuro onde irei imprimir as informações
        divListPedidos = $("#id-div-lista-pedidos");
        // Limpa tudo que tenha dentro da div
        divListPedidos.html("");
        pedidos.forEach( pedido => {
            // Imprimir as informação da variável produto
            divListPedidos.append(`
                <a href="#" value="${pedido.id}" class="itemPedido list-group-item list-group-item-action">Pedido ${pedido.id}</a>
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
                printPedidos(pedidos);
                $('.itemPedido').on('click', function(){
                    var x = this.getAttribute('value');
                    updatePedidoProdutos(this.getAttribute('value'));
                });
                updatePedidoProdutos(response.return[0].id);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function updatePedidoProdutos(idPedido) {
        $.ajax({
            type: "GET",
            url: `/pedido/admin/getpedidoprodutos/${idPedido}`,
            data: null,
            dataType: "json",
            success: function(response){
                console.log(response)
                printListPedidoProduto(response.return);
                $('#id-h2-pedido').html(`Pedido ${idPedido}`);
            },
            error: function(error){
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
                printSelectTipoProdutos(response.return);
                updateProdutosDropDown(response.return[0].id);
            },
            error: function(error){
                console.log(error);
            }
        });

        $('#id-div-lista-tipo-produtos').on('change', function (){
            tipoSelecioinado = $('#id-div-lista-tipo-produtos').val();
            updateProdutosDropDown(tipoSelecioinado);
        });
    }

    function updateProdutosDropDown(tipoSelecionado){
        $.ajax({
            type: "GET",
            url: `/pedido/admin/getprodutos/${tipoSelecionado}`,
            data: null,
            dataType: "json",
            success: function(response){
                printSelectProdutos(response.return);
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

    function printSelectProdutos(arrayProdutos) {
        // Procuro onde irei imprimir as informações
        divProdutos = $("#id-div-lista-produtos");
        // Limpa tudo que tenha dentro da div
        divProdutos.html("");
        arrayProdutos.forEach( produto => {
            // Imprimir as informação da variável produto
            divProdutos.append(`
                <option value="${produto.id}">${produto.nome}</option>
            `);
        });
    }

    function printListPedidoProduto(arrayProdutos) {
        // Procuro onde irei imprimir as informações
        divProdutos = $("#list-produtos");
        // Limpa tudo que tenha dentro da div
        divProdutos.html("");
        arrayProdutos.forEach( produto => {
            // Imprimir as informação da variável produto
            console.log(produto);
            divProdutos.append(`
                <span class="list-group-item">
                    ${produto.descricao} - ${produto.nome} - ${produto.quantidade}x
                    <span class="class-icons-produto-list">
                        <i class="fa-solid fa-pencil-square"></i>
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </span>
            `);
        });
    }

    // Chama a função inicialmente quando carregar a página
    updatePedidos();
    updateTipoProdutosDropDown();
});
