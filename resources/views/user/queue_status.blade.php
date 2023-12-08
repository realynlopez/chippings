<!-- resources/views/user/queue_status.blade.php -->

@extends('admin.admin-layout')

@section('content')
    <div class="container justify-content-center">
        <div class="card">
            <div class="card-header text-center mt-5 mb-3">Queue Status</div>
                <div class="card-body">
                    @if ($queue->isEmpty())
                        <p>No users in the queue at the moment.</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <!-- Add other relevant columns based on your queue structure -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queue as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <!-- Add other relevant columns based on your queue structure -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>        
        <!-- Add estimated wait time if needed -->
    </div>
@endsection
