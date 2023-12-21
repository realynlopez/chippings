<!-- resources/views/admin/newly-registered-users.blade.php -->

@extends('admin.admin-layout')
@section('title', 'New Users | Eskinita By Chippings')
@extends('include.header')
@section('content')
<div class="container mt-4 mb-3 justify-content-center">

        <div class="card">
            <div class="card-body">
                <h1 class="text-center mt-4 mb-3">New Users</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($newUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
