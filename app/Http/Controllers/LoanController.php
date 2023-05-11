<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function submitLoanDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loanAmount' => 'required|numeric|gt:0',
            'annualInterestRate' => 'required',
            'loanTerm' => 'required'
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), 'Error');
            return back();
        }

        $loanAmount = $request->input('loanAmount');
        $annualInterestRate = $request->input('annualInterestRate');
        $loanTerm = $request->input('loanTerm');
        $monthlyFixed = $request->input('monthlyFixed');

        $monthlyInterestRate = $annualInterestRate / 12 / 100;
        $numberOfMonths = $loanTerm * 12;

        $monthlyPayment = $loanAmount * ($monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$numberOfMonths)));

        $amortizationSchedule = [];
        $extraRepaymentSchedule = [];

        $currentBalance = $loanAmount;

        for ($month = 1; $month <= $numberOfMonths; $month++) {
            $interestComponent = $currentBalance * $monthlyInterestRate;
            $principalComponent = $monthlyPayment - $interestComponent;

            $extraRepayment = min($monthlyFixed, $currentBalance);

            $currentBalance -= $principalComponent + $extraRepayment;

            $amortizationSchedule[] = [
                'month_number' => $month,
                'starting_balance' => $loanAmount,
                'monthly_payment' => $monthlyPayment,
                'principal_component' => $principalComponent,
                'interest_component' => $interestComponent,
                'extra_repayment' => $extraRepayment,
                'ending_balance' => $currentBalance,
                'remaining_loan_term' => $numberOfMonths - $month,
            ];

            $extraRepaymentSchedule[] = [
                'month_number' => $month,
                'starting_balance' => $loanAmount,
                'monthly_payment' => $monthlyPayment,
                'principal_component' => $principalComponent,
                'interest_component' => $interestComponent,
                'extra_repayment' => $extraRepayment,
                'ending_balance' => $currentBalance,
                'remaining_loan_term' => $numberOfMonths - $month,
            ];
        }

        DB::table('loan_amortization_schedule')->insert($amortizationSchedule);

        DB::table('extra_repayment_schedule')->insert($extraRepaymentSchedule);

        toastr()->success('You have successfully registered on our test application');

        return view('amortization', compact('loanAmount', 'annualInterestRate', 'loanTerm', 'amortizationSchedule', 'extraRepaymentSchedule'));
    }


}
