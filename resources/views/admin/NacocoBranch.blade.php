@extends('admin.NacocoBranch-Layout')

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
            <h1>Welcome to Nacoco Branch</h1>
        </div>
    </div>

    <div class="container mt-4">
        <h2>Daily Transactions</h2>
        <!-- Links to Nacoco Branch routes -->
        <a href="{{ route('NacocoBranchWithData') }}" class="btn btn-primary">Link to Nacoco Branch with Data</a>
        <a href="{{ route('NacocoBranch') }}" class="btn btn-secondary">Link to Nacoco Branch without Data</a>

        <!-- Display daily transactions if available -->
        @if(isset($monthlyTransactions) && count($monthlyTransactions) > 0)
            <h2>Monthly Transactions</h2>
            <div class="table-responsive mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monthlyTransactions as $transaction)
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
            </div>
        @else
            <p class="text-center">No Monthly Transactions</p>
        @endif

        <!-- Display yearly transactions if available -->
        @if(isset($yearlyTransactions) && count($yearlyTransactions) > 0)
            <h2>Yearly Transactions</h2>
            <div class="table-responsive mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($yearlyTransactions as $transaction)
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
            </div>
        @else
            <p class="text-center">No Yearly Transactions</p>
        @endif
    </div>
@endsection
