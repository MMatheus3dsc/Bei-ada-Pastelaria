async function carregarProdutos() {
    try {
        const resposta = await fetch('/api/produtos'); // Chama a API
        const produtos = await resposta.json(); // Converte para JSON

        console.log(produtos); // Exibe no console

        // Exemplo: Adicionar os produtos em uma lista no HTML
        const listaProdutos = document.getElementById('lista-produtos');
        listaProdutos.innerHTML = ''; // Limpa antes de adicionar

        produtos.forEach(produto => {
            const item = document.createElement('li');
            item.textContent = `${produto.nome} - R$ ${produto.preco}`;
            listaProdutos.appendChild(item);
        });

    } catch (erro) {
        console.error('Erro ao carregar produtos:', erro);
    }
}

async function createProduct() {
    const form = document.getElementById('produto-form');
    const formData = new FormData(form);

    try {
        const response = await fetch('/api/admin/product', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            }
        });

        if (!response.ok) {
            throw new Error(`Erro HTTP! Status: ${response.status}`);
        }

        const data = await response.json();
        alert("Produto cadastrado com sucesso!");

        // Limpar o formulário
        form.reset();
    } catch (error) {
        console.error("Erro ao cadastrar produto:", error);
        alert("Erro ao cadastrar produto. Verifique os dados.");
    }
}
