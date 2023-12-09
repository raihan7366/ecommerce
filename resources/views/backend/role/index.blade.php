@extends('backend.layout.app')
@section('title',trans('Role'))
@section('page',trans('List'))
@section('content')

<!-- Bordered table start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Role Table</h6>
                <div class="table-responsive">
                    <!-- table bordered -->

                    <div>
                        <a class="pull-right fs-1" href="{{route('role.create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Identity')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->name}}</td>
                                <td>{{$p->identity}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route('role.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('permission.list',encryptor('encrypt',$p->id))}}">
                                        <i class="fa fa-unlock"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}"
                                        action="{{route('role.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Pruduct Found</th>
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
