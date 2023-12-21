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
                            <label for="delivery_status" class="form-label">Delivery Status</label>
                            <select class="form-select" id="deliveryStatus" aria-label="status" name="deliveryStatus">
                                <option value="0" @if(old('deliveryStatus', $order->delivery_status)==0) selected
                                    @endif>Pending </option>
                                <option value="1" @if(old('deliveryStatus', $order->delivery_status)==1) selected
                                    @endif>Delivered </option>
                                <option value="2" @if(old('deliveryStatus', $order->delivery_status)==2) selected
                                    @endif>Rejected</option>
                            </select>
                            @if($errors->has('deliveryStatus'))
                            <span class="text-danger"> {{ $errors->first('deliveryStatus') }}</span>
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