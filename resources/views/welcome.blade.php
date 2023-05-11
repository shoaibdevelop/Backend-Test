@extends('main')
@section('content')
    <form class="container main-form main-form-flex" method="POST" action="/submit-loan-details">
        @csrf
        <div class="jumbotron enter-detail-heading">
            <h2>Please Enter Details</h2>
        </div>
        <div class="form-group">
            <label for="loanAmount">Loan Amount <span class="required-star-span">*</span></label>
            <input type="number" class="form-control" id="loanAmount" name="loanAmount"
                   aria-describedby="loanAmount" placeholder="Loan Amount" required>
        </div>
        <div class="form-group">
            <label for="annualInterestRate">Annual Interest Rate (%) <span class="required-star-span">*</span></label>
            <div class="input-group">
                <input type="number" class="form-control" id="annualInterestRate" name="annualInterestRate"
                       placeholder="Annual Interest Rate" required/>
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="loanTerm">Loan Term (Yrs) <span class="required-star-span">*</span></label>
            <div class="input-group">
                <input type="number" class="form-control" id="loanTerm" name="loanTerm" placeholder="Loan Term (%)"
                       required/>
                <div class="input-group-append">
                    <span class="input-group-text">Yrs</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="monthlyFixed">Monthly Fixed Extra Amount</label>
            <div class="input-group">
                <input type="number" class="form-control" id="monthlyFixed" name="monthlyFixed"
                       placeholder="Monthly Fixed Extra Amount"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
