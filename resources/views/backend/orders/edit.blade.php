@extends('backend.layout.app')

@section('title',trans('Create Orders'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Order Create</h6>
                <form class="form" method="post" enctype="multipart/form-data"
                    action="{{route('orders.update',encryptor('encrypt',$order->id))}}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$order->id)}}">
                    <div class="row">

                        <div class="form-group mb-2">
                            <label for="customer_id" class="form-label">Customer Name</label><br>
                            <select class="form-select" id="customer" aria-label="Customers" name="customerId">
                                <option value="">Select Customer</option>
                                @forelse($customer as $c)
                                <option value="{{$c->id}}" {{ old('customerId', $order->customer_id)
                                    ==$c->id?"selected":""}}> {{ $c->name_en}}
                                </option>
                                @empty
                                <option value="">No Customer found</option>
                                @endforelse
                            </select>
                            @if($errors->has('customerId'))
                            <span class="text-danger"> {{ $errors->first('customerId') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" value="{{ old('quantity',$order->quantity)}}"
                                name="quantity">
                            @if($errors->has('quantity'))
                            <span class="text-danger"> {{ $errors->first('quantity') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="sub_amount" class="form-label">Sub Amount</label>
                            <input type="text" class="form-control" id="subAmount" value="{{ old('subAmount',$order->sub_amount)}}"
                                name="subAmount">
                            @if($errors->has('subAmount'))
                            <span class="text-danger"> {{ $errors->first('subAmount') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="text" class="form-control" id="discount" value="{{ old('discount',$order->discount)}}"
                                name="discount">
                            @if($errors->has('discount'))
                            <span class="text-danger"> {{ $errors->first('discount') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="text" class="form-control" id="totalAmount" value="{{ old('totalAmount',$order->total_amount)}}"
                                name="totalAmount">
                            @if($errors->has('totalAmount'))
                            <span class="text-danger"> {{ $errors->first('totalAmount') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="payment_status" class="form-label">Payment Status</label>
                            <select class="form-select" id="paymentStatus" aria-label="status" name="paymentStatus">
                                <option value="1" @if(old('paymentStatus', $order->payment_status)==1) selected
                                    @endif>Paid</option>
                                <option value="2" @if(old('paymentStatus', $order->payment_status)==2) selected
                                    @endif>Not Paid</option>
                            </select>
                            @if($errors->has('paymentStatus'))
                            <span class="text-danger"> {{ $errors->first('paymentStatus') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="delivery_status" class="form-label">Delivery Status</label>
                            <select class="form-select" id="deliveryStatus" aria-label="status" name="deliveryStatus">
                                <option value="1" @if(old('deliveryStatus', $order->delivery_status)==1) selected
                                    @endif>Paid</option>
                                <option value="2" @if(old('deliveryStatus', $order->delivery_status)==2) selected
                                    @endif>Not Paid</option>
                            </select>
                            @if($errors->has('deliveryStatus'))
                            <span class="text-danger"> {{ $errors->first('deliveryStatus') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="order_date" class="form-label">Order Date</label>
                            <input type="date" class="form-control" id="orderDate" value="{{ old('orderDate',$order->order_date)}}"
                                name="orderDate">
                            @if($errors->has('orderDate'))
                            <span class="text-danger"> {{ $errors->first('orderDate') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="delivery_date" class="form-label">Delivery Date</label>
                            <input type="date" class="form-control" id="deliveryDate" value="{{ old('deliveryDate',$order->delivery_date)}}"
                                name="deliveryDate">
                            @if($errors->has('deliveryDate'))
                            <span class="text-danger"> {{ $errors->first('deliveryDate') }}</span>
                            @endif
                        </div>

                        
                        <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection