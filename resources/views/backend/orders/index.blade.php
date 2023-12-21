@extends('backend.layout.app')
@section('title',trans('Orders List'))

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Orders Table</h6>
                <div class="table-responsive">
                    {{-- <div>
                        <a class="pull-right fs-1" href="{{route('products.create')}}"><i class="fa fa-plus"></i></a>
                    </div> --}}
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Customer Name')}}</th>
                                <th scope="col">{{__('Sub Amount')}}</th>
                                <th scope="col">{{__('Discount')}}</th>
                                <th scope="col">{{__('Total Amount')}}</th>
                                <th scope="col">{{__('Payment Status')}}</th>
                                <th scope="col">{{__('Delivery Status')}}</th>
                                <th scope="col">{{__('Order Date')}}</th>
                                <th scope="col">{{__('Delivery Date')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->customer?->name_en}}</td>
                                <td>{{$p->sub_amount}}</td>
                                <td>{{$p->discount}}</td>
                                <td>{{$p->total_amount}}</td>
                                <td>
                                    @if($p->payment_status==0)
                                        Not Paid
                                    @else
                                        Paid
                                    @endif
                                </td>
                                <td>
                                    @if($p->delivery_status==0)
                                        Pending
                                    @elseif($p->delivery_status==1)
                                        Delivered
                                    @else
                                        Rejected
                                    @endif
                                </td>
                                <td>{{$p->order_date}}</td>
                                <td>{{$p->delivery_date}}</td>
                                

                                <td class="white-space-nowrap">
                                    <a href="{{route('orders.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form id="form{{$p->id}}" action="{{route('orders.destroy',
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