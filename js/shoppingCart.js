

const btn = document.querySelector("#btnDisplayCart");
const cart = document.querySelector("#shoppingCart");

    btn.addEventListener("click", function(){
    cart.classList.toggle("hidden");
});