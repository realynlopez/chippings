// public/js/cart.js

const cartItems = {};
let isAddingToCart = false;

function addToCart(item) {
    if (isAddingToCart) {
        return; // Prevent multiple rapid clicks
    }

    isAddingToCart = true;

    if (cartItems[item]) {
        cartItems[item]++;
    } else {
        cartItems[item] = 1;
    }

    // Update the cart table
    updateCartTable();

    // Reset flag after a short delay to allow subsequent clicks
    setTimeout(() => {
        isAddingToCart = false;
    }, 1000); // You can adjust the delay as needed
    
    $.ajax({
        type: 'POST',
        url: document.head.querySelector('meta[name="cart-route"]').content, // Get the route dynamically
        data: { itemName: item },
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function checkout() {
    const checkoutRoute = $('#cart').data('checkout-route');

    // Make an AJAX request to the checkout route
    $.ajax({
        type: 'POST',
        url: checkoutRoute,
        data: {
            shipping_address: '123 Main St', // Example, replace with actual shipping address
        },
        success: function(response) {
            console.log(response);
            // Optionally, update the UI to reflect the successful checkout
        },
        error: function(error) {
            console.error(error);
            // Handle errors if needed
        }
    });
}


function updateCartTable() {
    const cartItemsBody = document.getElementById('cart-items-body');
    cartItemsBody.innerHTML = '';

    // Add column headers
    const headerRow = document.createElement('tr');
    const itemNameHeader = document.createElement('th');
    const itemQuantityHeader = document.createElement('th');
    const actionHeader = document.createElement('th');

    itemNameHeader.textContent = 'Item';
    itemQuantityHeader.textContent = 'Quantity';
    actionHeader.textContent = 'Action';

    headerRow.appendChild(itemNameHeader);
    headerRow.appendChild(itemQuantityHeader);
    headerRow.appendChild(actionHeader);

    cartItemsBody.appendChild(headerRow);

    for (const item in cartItems) {
        const row = document.createElement('tr');
        const itemNameCell = document.createElement('td');
        const itemQuantityCell = document.createElement('td');
        const actionCell = document.createElement('td');
        const deleteButton = document.createElement('button');

        itemNameCell.textContent = item;
        itemQuantityCell.textContent = cartItems[item];

        deleteButton.textContent = 'Delete';
        deleteButton.classList.add('btn', 'btn-danger', 'mr-2');
        deleteButton.addEventListener('click', function () {
            deleteCartItem(item);
        });

        actionCell.appendChild(deleteButton);

        row.appendChild(itemNameCell);
        row.appendChild(itemQuantityCell);
        row.appendChild(actionCell);

        cartItemsBody.appendChild(row);
    }
}

function deleteCartItem(item) {
    if (cartItems[item] > 1) {
        cartItems[item]--;
    } else {
        delete cartItems[item];
    }

    updateCartTable();
}

// Add this function to handle the user interface update when an item is added to the cart
function displayItemAddedMessage(item) {
    const cartMessage = document.createElement('p');
    cartMessage.textContent = `${item} added to cart`;
    document.getElementById('cart').appendChild(cartMessage);
}

// ...

// Inside your JavaScript file
window.Echo.channel('cart-updates')
    .listen('ItemAddedToCart', (event) => {
        // Update your user UI here
        console.log(`Item ${event.itemName} added to cart`);
        // Call the function to display the added to cart message
        displayItemAddedMessage(event.itemName);
    });
