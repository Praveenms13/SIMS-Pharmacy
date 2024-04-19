<br><br><br>
<h3 class="cart-text">hii</h3>
<script>
    var cartCount = getCartCount();
    alert(cartCount)
    if (cartCount = 0) {
        document.querySelector('.cart-text').innerHTML = 'Your cart is empty';
    } else {
        document.querySelector('.cart-text').innerHTML = 'You have ' + cartCount + ' items in your cart';
    }
</script>