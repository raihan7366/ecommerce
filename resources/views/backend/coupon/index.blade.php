@extends('backend.layout.app')
@section('title', trans('Coupon List'))

@section('content')

    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Coupons Table</h6>
            <div class="table-responsive">
                <div>
                    <a class="pull-right fs-1" href="{{ route('coupon.create') }}"><i class="fa fa-plus"></i></a>
                    <table class="table table-hover">
                </div>
                <thead>
                    <tr>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('Coupon Code') }}</th>
                        <th>{{ __('Discount') }}</th>
                        <th>{{ __('Valid From') }}</th>
                        <th>{{ __('Valid Until') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coupon as $c)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td><strong>{{ $c->code }}</strong></td>
                            <td><strong>{{ $c->discount }}</strong></td>
                            <td>{{ $c->valid_from }}</td>
                            <td>{{ $c->valid_until }}</td>

                            <td class="white-space-nowrap">
                                <a href="{{ route('coupon.edit', encryptor('encrypt', $c->id)) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form id="form{{ $c->id }}"
                                    action="{{ route('coupon.destroy', encryptor('encrypt', $c->id)) }}"
                                    method="post">
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
    @endsection

