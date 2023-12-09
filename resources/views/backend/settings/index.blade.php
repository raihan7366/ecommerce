@extends('backend.layout.app')
@section('title',trans('Settings List'))

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Settings</h6>
                <div class="table-responsive">
                    <div>
                        <a class="pull-right fs-1" href="{{route('settings.create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Company Address')}}</th>
                                <th scope="col">{{__('Contact Number')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Facebook Link')}}</th>
                                <th scope="col">{{__('Twitter Link')}}</th>
                                <th scope="col">{{__('Whatsapp Link')}}</th>
                                <th scope="col">{{__('Logo')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->company_add}}</td>
                                <td>{{$p->contact_no_en}}</td>
                                <td>{{$p->email}}</td>
                                <td>{{$p->facebook_link}}</td>
                                <td>{{$p->twitter_link}}</td>
                                <td>{{$p->whatsapp_link}}</td>
                                <td><img width="50px" src="{{asset('public/uploads/settings/'.$p->image)}}" alt=""></td>

                                <td class="white-space-nowrap">
                                    <a href="{{route('settings.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form id="form{{$p->id}}" action="{{route('settings.destroy',
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