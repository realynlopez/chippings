src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.4/socket.io.js"
   
    const socket = io('http://127.0.0.1:8000/'); // Change this to your Laravel app URL

    socket.on('admin-channel:App\\Events\\ItemAddedToCart', function(data) {
        console.log('Item added to cart:', data);
        // You can update the admin view here to show the new item added to the cart
        // Example: Update a table or display a notification
    });

// Inside your admin JavaScript file
window.Echo.channel('order-updates')
    .listen('OrderCheckedOut', (event) => {
        // Update your admin UI here
        console.log('Order checked out:', event.orderData);
        // Access order data using event.orderData
        updateAdminUI(event.orderData);
    });

function updateAdminUI(orderData) {
    // Update your admin UI with the received order data
    // For example, display a notification or update a table
    console.log('Updating admin UI with order data:', orderData);
}

