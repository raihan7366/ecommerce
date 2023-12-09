@extends('backend.layout.app')
@section('title',trans('Products List'))

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Products Table</h6>
                <div class="table-responsive">
                    <div>
                        <a class="pull-right fs-1" href="{{route('products.create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Description')}}</th>
                                <th scope="col">{{__('Short Description')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Category')}}</th>
                                <th scope="col">{{__('Brand')}}</th>
                                <th scope="col">{{__('Price')}}</th>
                                <th scope="col">{{__('Discount Type')}}</th>
                                <th scope="col">{{__('Discount Amount')}}</th>
                                <th scope="col">{{__('Popular')}}</th>
                                <th scope="col">{{__('Featured')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->name_en}}</td>
                                <td>{{$p->description}}</td>
                                <td>{{$p->short_description}}</td>
                                <td><img width="50px" src="{{asset('public/uploads/products/'.$p->image)}}" alt=""></td>
                                <td>{{$p->category?->name_en}}</td>
                                <td>{{$p->brand?->name_en}}</td>
                                <td>{{$p->price}}</td>
                                <td style="color:@if($p->discount_type==1) green @else red @endif;">
                                    @if($p->discount_type == 1){{__('Percentage') }} @else {{__('Fixed') }} @endif
                                </td>
                                <td>{{$p->discount_amount}}</td>
                                <td style="color:@if($p->is_popular==1) green @else red @endif;">
                                    @if($p->is_popular == 1)
                                    {{__('Yes') }} @else {{__('No') }} @endif</td>

                                <td style="color:@if($p->is_featured==1) green @else red @endif;">
                                    @if($p->is_featured == 1)
                                    {{__('Yes') }} @else {{__('No') }} @endif</td>

                                <td class="white-space-nowrap">
                                    <a href="{{route('products.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form id="form{{$p->id}}" action="{{route('products.destroy',
                            encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                        {{-- <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()"> --}}
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