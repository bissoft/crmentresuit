@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="pricing_card mt-5">
        <h2 class="text-center mb-5">Subscription Plans</h2>
        <div class="demo">
            <div class="text-center d-flex justify-content-center my-3">
                <label class="mr-2" for="plan-type">Monthly</label>
                <div class="custom-control custom-switch ">
                    <input type="checkbox" class="custom-control-input" id="plan-type" @if($type=='yearly' ) checked
                        @endif>
                    <label class="custom-control-label" for="plan-type">Yearly</label>
                </div>
            </div>
            <div class="container pb-5">
                <div class="row">

                    @if($plans->count())

                    @foreach($plans as $plan)

                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="pricingTable blue">
                            <div class="pricingTable-header">
                                <h3 class="title">{{ $plan->name }}</h3>
                                <div class="price-value">
                                    <span class="amount">${{ $plan->price }}</span>
                                </div>
                            </div>
                            <ul class="pricing-content">

                                @foreach($plan->attributes as $attribute)

                                <li class="{{ $attribute->included ? '' : 'disable' }}">{{ $attribute->name }}</li>

                                @endforeach

                            </ul>
                            <div class="pricingTable-signup">

                                @if(auth()->user()->subscribed($plan->name))
                                <a class="btn-yellow rounded p-1 px-3 px-md-1" href="javascript:void(0)">Subscribed</a>
                                @else
                                <a class="btn-yellow rounded p-1 px-3 px-md-1" href="{{ route('subscribe', $plan->id) }}">Subscribe</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    @endforeach

                    @else
                    <div class="text-center">No plans found</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<hr>
@endsection
