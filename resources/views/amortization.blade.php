@extends('main')
@section('content')
    <div class="container">
        <h2>Loan Details</h2>
        <div class="upper-div-flex">
            <p><strong>Loan Amount:</strong> ${{ number_format($loanAmount, 2) }}</p>
            <p><strong>Annual Interest Rate:</strong> {{ $annualInterestRate }}%</p>
            <p><strong>Loan Term:</strong> {{ $loanTerm }} years</p>
            <p><strong>Effective Interest Rate:</strong> {{ number_format($annualInterestRate, 2) }}%</p>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Amortization Schedule
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Extra Repayment
                    Schedule
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="scrollable-table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Starting Balance</th>
                            <th>Monthly Payment</th>
                            <th>Principal Component</th>
                            <th>Interest Component</th>
                            <th>Extra Repayment</th>
                            <th>Ending Balance</th>
                            <th>Remaining Loan Term</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($amortizationSchedule as $schedule)
                            <tr>
                                <td>{{ $schedule['month_number'] }}</td>
                                <td>${{ number_format($schedule['starting_balance'], 2) }}</td>
                                <td>${{ number_format($schedule['monthly_payment'], 2) }}</td>
                                <td>${{ number_format($schedule['principal_component'], 2) }}</td>
                                <td>${{ number_format($schedule['interest_component'], 2) }}</td>
                                <td>${{ number_format($schedule['extra_repayment'], 2) }}</td>
                                <td>${{ number_format($schedule['ending_balance'], 2) }}</td>
                                <td>{{ $schedule['remaining_loan_term'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="scrollable-table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Starting Balance</th>
                            <th>Monthly Payment</th>
                            <th>Principal Component</th>
                            <th>Interest Component</th>
                            <th>Extra Repayment</th>
                            <th>Ending Balance</th>
                            <th>Remaining Loan Term</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($extraRepaymentSchedule as $schedule)
                            <tr>
                                <td>{{ $schedule['month_number'] }}</td>
                                <td>${{ number_format($schedule['starting_balance'], 2) }}</td>
                                <td>${{ number_format($schedule['monthly_payment'], 2) }}</td>
                                <td>${{ number_format($schedule['principal_component'], 2) }}</td>
                                <td>${{ number_format($schedule['interest_component'], 2) }}</td>
                                <td>${{ number_format($schedule['extra_repayment'], 2) }}</td>
                                <td>${{ number_format($schedule['ending_balance'], 2) }}</td>
                                <td>{{ $schedule['remaining_loan_term'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <h2></h2>
    </div>

@endsection
