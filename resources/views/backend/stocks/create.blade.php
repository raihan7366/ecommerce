@extends('backend.layout.app')

@section('title',trans('Create stocks'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Stock Create</h6>
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('stocks.store')}}">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="product_id" class="form-label">Products Name</label><br>
                        <select class="form-select" id="name" aria-label="products" name="productsName_en">
                            <option value="">Select Product</option>
                            @forelse($product as $p)
                            <option value="{{$p->id}}" {{ old('productsName_en')==$p->id?"selected":""}}> {{
                                $p->name_en}}
                            </option>
                            @empty
                            <option value="">No product found</option>
                            @endforelse
                        </select>
                        @if($errors->has('productsName_en'))
                        <span class="text-danger"> {{ $errors->first('productsName_en') }}</span>
                        @endif
                    </div>


                    <div class="mb-2">
                        <label for="total_quantity" class="form-label">Total Quantity</label>
                        <input type="text" class="form-control" id="totalQuantity" value="{{ old('totalQuantity')}}"
                            name="totalQuantity">
                        @if($errors->has('totalQuantity'))
                        <span class="text-danger"> {{ $errors->first('totalQuantity') }}</span>
                        @endif
                    </div>


                    <div class="mb-2">
                        <label for="order_id" class="form-label">Ordered Quantity</label>
                        <input type="text" class="form-control" id="orderQuantity" value="{{ old('orderQuantity')}}"
                            name="orderQuantity">
                        @if($errors->has('orderQuantity'))
                        <span class="text-danger"> {{ $errors->first('orderQuantity') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="buying_price" class="form-label">Buying Price</label>
                        <input type="text" class="form-control" id="buyingPrice" value="{{ old('buyingPrice')}}" name="buyingPrice">
                            
                        @if($errors->has('buyingPrice'))
                        <span class="text-danger"> {{ $errors->first('buyingPrice') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="selling_price" class="form-label">Selling Price</label>
                        <input type="text" class="form-control" id="buyingPrice" value="{{ old('sellingPrice')}}"
                            name="sellingPrice">
                        @if($errors->has('sellingPrice'))
                        <span class="text-danger"> {{ $errors->first('sellingPrice') }}</span>
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection