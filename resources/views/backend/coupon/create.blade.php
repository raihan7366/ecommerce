@extends('backend.layout.app')

@section('title',trans('Coupon Create'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Create Coupon</h6>
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('coupon.store')}}">
                    @csrf
                    
                    <div class="mb-2">
                        <label for="discount" class="form-label">Coupon Code</label>
                        <input type="text" class="form-control" id="code" value="{{ old('code')}}"
                            name="code">
                        @if($errors->has('code'))
                        <span class="text-danger"> {{ $errors->first('code') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" class="form-control" id="discount" value="{{ old('discount')}}"
                            name="discount">
                        @if($errors->has('discount'))
                        <span class="text-danger"> {{ $errors->first('discount') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <div class="form-group">
                            <label class="form-label">Valid From</label>
                            <input type="date" class="form-control" name="valid_from"
                                value="{{old('valid_from')}}">
                        </div>
                        @if($errors->has('valid_from'))
                        <span class="text-danger"> {{$errors->first('valid_from')}}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <div class="form-group">
                            <label class="form-label">Valid Until</label>
                            <input type="date" class="form-control" name="valid_until"
                                value="{{old('valid_until')}}">
                        </div>
                        @if($errors->has('valid_until'))
                        <span class="text-danger"> {{$errors->first('valid_until')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection