@extends('admin.laludBranch-Layout')

@section('additional_css')
    <!-- Include additional CSS if needed -->
    <link rel="stylesheet" href="{{ asset('assets/css/branch.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@endsection

@section('additional_js')
    <!-- Include additional JavaScript if needed -->
    <script src="{{ asset('assets/js/chart1.js') }}"></script>
    <script src="{{ asset('assets/js/chart2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.umd.min.js"></script>
@endsection

@section('branch')
    <div class="container mt-4">
        <div class="branch">
            <h1>Welcome to Lalud Branch</h1>
        </div>
    </div>

    <div class="container mt-4">
        <h2>Daily Transactions</h2>
        <!-- Links to Lalud Branch routes -->
        <a href="{{ route('laludBranchWithData') }}" class="btn btn-primary">Link to Lalud Branch with Data</a>
        <a href="{{ route('laludBranch') }}" class="btn btn-secondary">Link to Lalud Branch without Data</a>

        <!-- Display daily transactions if available -->
        @if(isset($dailyTransactions) && count($dailyTransactions) > 0)
            <p class="text-center">Number of Daily Transactions: {{ count($dailyTransactions) }}</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dailyTransactions as $transaction)
                        <tr>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td>
                                @if(is_string($transaction->transaction_date))
                                    {{ $transaction->transaction_date }}
                                @elseif(is_a($transaction->transaction_date, 'Illuminate\Support\Carbon'))
                                    {{ $transaction->transaction_date->format('Y-m-d') }}
                                @else
                                    <!-- Handle other cases if needed -->
                                    {{ $transaction->transaction_date }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No Daily Transactions</p>
        @endif
    </div>
@endsection
