// $(document).ready(function () {
//     getCartCount();
// });

// function getCartCount() {
//     let cartCount = document.getElementById("cart-count");
//     fetch("/libs/_app/getCartCout.php")
//       .then((response) => response.json())
//       .then((data) => {
//         cartCount.textContent = data;
//       })
//       .catch((error) => console.error("Error fetching cart count:", error));
// }


function addToCart(prodId) {
    var url = '/libs/_app/addToCart.php';
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
                    location.reload();
                } else {
                    alert('Product not added to cart');
                }

            });
        }
    });
}