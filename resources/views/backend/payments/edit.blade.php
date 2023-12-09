@extends('backend.layout.app')

@section('title',trans('Edit Payments'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Payment Update</h6>
                <form class="form" method="post" enctype="multipart/form-data"
                    action="{{route('payments.update',encryptor('encrypt',$payment->id))}}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$payment->id)}}">
                    <div class="row">

                        <div class="mb-2">
                            <label for="name_en" class="form-label">Customer Name</label>
                            @forelse($customer as $c)
                            <input type="text" class="form-control" id="name" name="customer_name_en" value="{{$c->id}}"
                                {{old('customerName_en',$payment->customer_name_en)==$c->id?"selected":""}}>{{ $c->customer_name_en}}
                            @if($errors->has('customerName_en'))
                            <span class="text-danger"> {{ $errors->first('customerName_en') }}</span>
                            @endif
                            @endforelse
                        </div>

                        <div class="mb-2">
                            <label for="contact" class="form-label">Customer Contact</label>
                            @forelse($customer as $c)
                            <input type="text" class="form-control" id="contact" name="customer_contact_no_en" value="{{$c->id}}"
                                {{old('customerContact_no_en',$payment->customer_contact_no_en)==$c->id?"selected":""}}>{{ $c->customer_contact_no_en}}
                            @if($errors->has('customerContact_no_en'))
                            <span class="text-danger"> {{ $errors->first('customerContact_no_en') }}</span>
                            @endif
                            @endforelse
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label">Customer email</label>
                            @forelse($customer as $c)
                            <input type="email" class="form-control" id="price" name="customer_email" value="{{$c->id}}"
                                {{old('customerEmail',$payment->customer_email)==$c->id?"selected":""}}>{{ $c->customer_email}}
                            @if($errors->has('customerEmail'))
                            <span class="text-danger"> {{ $errors->first('customerEmail') }}</span>
                            @endif
                            @endforelse
                        </div>

                        <div class="mb-2">
                            <label for="transaction_no" class="form-label">Transaction Number</label>
                            <input type="text" id="transactionNumber" class="form-control"
                                value="{{ old('transactionNumber',$payment->transaction_no)}}" name="transactionNumber">
                            @if($errors->has('transactionNumber'))
                            <span class="text-danger"> {{ $errors->first('transactionNumber') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="payment_type" class="form-label">Payment Type</label>
                            <select class="form-select" id="paymentType" aria-label="status" name="paymentType">
                                <option value="1" @if(old('paymentType', $payment->payment_type)==1) selected
                                    @endif>Bkash</option>
                                <option value="2" @if(old('paymentType', $payment->payment_type)==2) selected
                                    @endif>Card</option>
                                <option value="3" @if(old('paymentType', $payment->payment_type)==3) selected
                                    @endif>Cash on Delivery</option>
                            </select>
                            @if($errors->has('paymentType'))
                            <span class="text-danger"> {{ $errors->first('paymentType') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="card_no" class="form-label">Card Number</label>
                            <input type="text" id="cardNumber" class="form-control"
                                value="{{ old('cardNumber',$payment->card_no)}}" name="cardNumber">
                            @if($errors->has('cardNumber'))
                            <span class="text-danger"> {{ $errors->first('cardNumber') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection