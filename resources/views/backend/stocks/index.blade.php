@extends('backend.layout.app')
@section('title',trans('Stock List'))

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Stock Table</h6>
                <div class="table-responsive">
                    <div>
                        <a class="pull-right fs-1" href="{{route('stocks.create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Product Name')}}</th>
                               
                                <th scope="col">{{__('Total Quantity')}}</th>
                                <th scope="col">{{__('Ordered Quantity')}}</th>
                                <th scope="col">{{__('Buying Price')}}</th>
                                <th scope="col">{{__('Selling Price')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->product?->name_en}}</td>
                                <td>{{$p->total_quantity}}</td>
                                <td>{{$p->order?->quantity}}</td>
                                <td>{{$p->buying_price}}</td>
                                <td>{{$p->selling_price}}</td>

                                 <td class="white-space-nowrap">
                                    <a href="{{route('products.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form id="form{{$p->id}}" action="{{route('products.destroy',
                            encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                        
                                            <button type="submit">
                                                <i class="fa fa-trash"></i></button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection