@extends('backend.layout.app')
@section('title',trans('Payments List'))

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Payments Table</h6>
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Contact Number')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Transaction No:')}}</th>
                                <th scope="col">{{__('Payment Type')}}</th>
                                <th scope="col">{{__('Card No:')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->customer?->name_en}}</td>
                                <td>{{$p->customer?->contact_no_en}}</td>
                                <td>{{$p->customer?->email}}</td>
                                <td>{{$p->transaction_no}}</td>
                                <td>
                                    {{$p->payment_type == 1 ? __('Bkash') : ($p->payment_type == 2 ? __('card') :__('COD'))}}
                                </td>
                                <td>{{$p->card_no}}</td>

                                <td class="white-space-nowrap">
                                    <a href="{{route('payments.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form id="form{{$p->id}}" action="{{route('payments.destroy',
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