document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.container-produto').forEach(product => {
        const plusBtn = product.querySelector('.product-overlay .plus');
        const minusBtn = product.querySelector('.product-overlay .minus');
        const quantity = product.querySelector('.product-overlay .quantity');
        let count = 0;

        plusBtn.addEventListener('click', () => {
            count++;
            quantity.textContent = count;
        });

        minusBtn.addEventListener('click', () => {
            if (count > 0) {
                count--;
                quantity.textContent = count;
            }
        });
    });
});
