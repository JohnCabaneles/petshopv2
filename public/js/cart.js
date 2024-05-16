document.addEventListener("DOMContentLoaded", function () {
    const quantityBtns = document.querySelectorAll(".quantity-btn");
    const quantityInputs = document.querySelectorAll(".quantity-input");

    quantityBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const id = this.getAttribute("data-id");
            const action = this.getAttribute("data-action");
            const input = document.querySelector(
                `.quantity-input[data-id="${id}"]`
            );
            let quantity = parseInt(input.value);

            if (action === "increment") {
                quantity++;
            } else if (action === "decrement" && quantity > 1) {
                quantity--;
            }

            input.value = quantity;
            updateTotalPrice(id);
        });
    });

    function updateTotalPrice(id) {
        const input = document.querySelector(
            `.quantity-input[data-id="${id}"]`
        );
        const price = parseFloat(
            input.closest("td").previousElementSibling.textContent
        );
        const quantity = parseInt(input.value);
        const totalPrice = price * quantity;
        document.getElementById(`total-price-${id}`).textContent = totalPrice;
    }
});
