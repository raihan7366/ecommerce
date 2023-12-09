@extends('backend.layout.app')
@section('title', trans('Review List'))

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Review Table</h6>
                    <div class="table-responsive">
                        {{-- <div>
                        <a class="pull-right fs-1" href="{{route('products.create')}}"><i class="fa fa-plus"></i></a>
                    </div> --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('#SL') }}</th>
                                    <th scope="col">{{ __('Product Name') }}</th>
                                    <th scope="col">{{ __('Product Image') }}</th>
                                    <th scope="col">{{ __('User Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Contact') }}</th>
                                    <th scope="col">{{ __('Comment') }}</th>
                                    <th scope="col">{{ __('Ratings') }}</th>
                                    <th class="white-space-nowrap">{{ __('Action') }}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $p)
                                    <tr>
                                        <th scope="row">{{ ++$loop->index }}</th>
                                        <td>{{ $p->product?->name_en }}</td>
                                        <td><img width="50px"src="{{ asset('public/uploads/reviews/' . $p->product?->image) }}"
                                                alt=""></td>
                                        <td>{{ $p->user_name_en }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->contact_no_en }}</td>
                                        <td>{{ $p->comment }}</td>
                                        <td>{{ $p->ratings }}</td>

                                        <td class="white-space-nowrap">
                                            <a href="{{ route('reviews.edit', encryptor('encrypt', $p->id)) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form id="form{{ $p->id }}"
                                                action="{{ route('reviews.destroy', encryptor('encrypt', $p->id)) }}"
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
            </div>
        </div>
    </div>
@endsection
