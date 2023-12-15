// public/js/cart.js

// This script will handle adding items to the cart.
// You will need to connect this with your backend to handle the actual adding to cart.

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
        // Show the added to cart message only once
        const cartMessage = document.createElement('p');
        cartMessage.textContent = `${item} added to cart`;
        document.getElementById('cart').appendChild(cartMessage);
    }

    // Update the cart table
    updateCartTable();

    // Reset flag after a short delay to allow subsequent clicks
    setTimeout(() => {
        isAddingToCart = false;
    }, 1000); // You can adjust the delay as needed
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

        // Add additional actions here, such as updating quantity or other operations
        // Example: You can add an 'Update' button
        const updateButton = document.createElement('button');
        updateButton.textContent = 'Update';
        updateButton.classList.add('btn', 'btn-warning');
        updateButton.addEventListener('click', function () {
            updateCartItem(item);
        });

        actionCell.appendChild(deleteButton);
        actionCell.appendChild(updateButton);

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

function updateCartItem(item) {
    // Add your logic for updating the quantity or any other action here
    // For example, you can prompt the user for a new quantity and update cartItems[item]
    // Don't forget to call updateCartTable() after the update
    // ...
    updateCartTable();
}
