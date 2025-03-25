
function addToCart(produtoId, quantidade = 1) { 
    fetch('http://127.0.0.1:8000/api/cart/add', {
        method: 'POST',
        body: JSON.stringify({ produtos_id: produtoId, quantity: quantidade }),
        headers: { 
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        credentials: 'include' // Isso garante que cookies/sessões sejam enviados se necessário
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item adicionado ao carrinho!');
            loadCart();
        } else {
            alert('Erro ao adicionar ao carrinho!');
        }
    })
    .catch(error => console.error('Erro:', error));
}

function removeFromCart(id){

}