async function getProducts() {
    try {
        const response = await fetch('api/products', {
            credentials: 'include', // Para enviar cookies/sessão
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
        
        if (!response.ok) throw new Error('Erro na rede');
        const products = await response.json(); // Converte para JSON

        console.log(products); // Exibe no console

        // Exemplo: Adicionar os produtos em uma lista no HTML
        const listaProdutos = document.getElementById('lista-produtos');
        listaProdutos.innerHTML = ''; // Limpa antes de adicionar

        products.forEach(product => {
            const item = document.createElement('li');
            item.textContent = `${product.name} - R$ ${product.price}`;
            listaProdutos.appendChild(item);
        });

    } catch (erro) {
        console.error('Erro ao carregar produtos:', erro);
    }
}

