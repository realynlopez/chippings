@extends('admin.laludBranch-Layout')
@extends('include.header')
@section('additional_css')
    <!-- Include additional CSS if needed -->
    <link rel="stylesheet" href="{{ asset('assets/css/branch.css') }}">
    <link href="{{ asset('assets/css/admin_header.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@endsection

@section('branch')

    <div class="container mt-4">
        <div class="branch">
            <h1>Transactions to Lalud Branch</h1>
            <!-- Daily Button -->
            <a href="{{ route('laludBranch', ['timeframe' => 'daily']) }}" class="btn btn-primary">Daily</a>
            <!-- Monthly Button -->
            <a href="{{ route('laludBranch', ['timeframe' => 'monthly']) }}" class="btn btn-primary">Monthly</a>
            <!-- Yearly Button -->
            <a href="{{ route('laludBranch', ['timeframe' => 'yearly']) }}" class="btn btn-primary">Yearly</a>  

        </div>
    </div>

    <div class="container mt-4">
        <!-- Display success message if any -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <!-- Display the form to add a transaction -->
        <div class="card mt-4 justified-content-center">
            <div class="card-body">
                <h3 class="card-title">Add Transaction</h3>
                <form action="{{ route('admin.addTransaction') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="transaction_date" class="form-label">Transaction Date</label>
                        <input type="date" class="form-control" id="transaction_date" name="transaction_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
     </div>


        <!-- Display daily transactions if available -->
        @if(isset($transactions) && count($transactions) > 0)
            <p class="text-center white-text">Number of Transactions: {{ count($transactions) }}</p>
            <table class="table">
                <thead>
                    <tr>
                        <th class="white-text">Amount</th>
                        <th class="white-text">Description</th>
                        <th class="white-text">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td class="white-text">{{ $transaction->amount }}</td>
                            <td class="white-text">{{ $transaction->description }}</td>
                            <td class="white-text">{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="white-text">No Transactions</p>
        @endif

    </div>
@endsection
