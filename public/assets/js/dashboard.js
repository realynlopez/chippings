// Include Laravel Echo and Pusher scripts
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Initialize Laravel Echo
const echo = new Echo({
    broadcaster: 'pusher',
    key: '{{ config('broadcasting.connections.pusher.key') }}',
    cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
    encrypted: true,
});

echo.channel('table-updates')
    .listen('TableUpdated', (event) => {
        // Update the UI based on the received event data
        console.log('Table status changed:', event.tableId, event.isAvailable);
        // Implement the logic to update the available tables list
    });
