@extends('backend.layout.app')
@section('title',trans('Order Details List'))

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Order Details Table</h6>
                <div class="table-responsive">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Product Name')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Category')}}</th>
                                <th scope="col">{{__('Brand')}}</th>
                                <th scope="col">{{__('Quantity')}}</th>
                                <th scope="col">{{__('Price')}}</th>
                                {{-- <th scope="col">{{__('Sub Amount')}}</th>
                                <th scope="col">{{__('Discount')}}</th>
                                <th scope="col">{{__('Total Amount')}}</th> --}}
                                
                                {{-- <th class="white-space-nowrap">{{__('Action') }} --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->product?->name_en}}</td>
                                <td><img width="50px" src="{{asset('public/uploads/orderdetails/'.$p->product?->image)}}" alt=""></td>
                                <td>{{$p->product->category?->name_en}}</td>
                                <td>{{$p->product->brand?->name_en}}</td>
                                <td>{{$p->quantity}}</td>
                                <td>{{$p->price}}</td>
                                {{-- <td>{{$p->order?->sub_amount}}</td>
                                <td>{{$p->order?->discount}}</td>
                                <td>{{$p->order?->total_amount}}</td> --}}
                               
                                

                                {{-- <td class="white-space-nowrap">
                                    <a href="{{route('orderdetails.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form id="form{{$p->id}}" action="{{route('order.destroy',
                            encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                        
                                            <button type="submit">
                                                <i class="fa fa-trash"></i></button>
                                        </a>
                                    </form>
                                </td> --}}
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