// getcartCount on document ready
$(document).ready(function () {
    getCartCount();
});

// get cart count
function getCartCount() {
    var siteUrl = window.location.origin;
    var url = siteUrl + '/libs/_app/getCartCout.php';
    $.get(url, function (response) {
        $('#cart-count').html(response);
    });
}


function addToCart(prodId) {
    var siteUrl = window.location.origin;
    var url = siteUrl + '/libs/_app/addToCart.php';
    var data = {
        prodId: prodId
    };
    // before sending post data to server, show sweet confirm dialog
    Swal.fire({
        title: 'Add to cart?',
        text: 'Are you sure you want to add this product to cart?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post(url, data, function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added to cart',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    var btn = document.getElementById('add-to-cart-' + prodId);
                    btn.innerHTML = 'Added to cart';
                    btn.setAttribute('disabled', 'disabled');
                    getCartCount();
                    location.reload();
                } else {
                    alert('Product not added to cart');
                }

            });
        }
    });
}