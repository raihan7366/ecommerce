@extends('backend.layout.app')
@section('title',trans('Brands List'))

@section('content')

<div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Brands Table</h6>
        <div class="table-responsive">
            <div>
                <a class="pull-right fs-1" href="{{route('brands.create')}}"><i class="fa fa-plus"></i></a>
                <table class="table table-hover">
            </div>
            <thead>
                <tr>
                    <th scope="col">{{__('#SL')}}</th>
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Image')}}</th>
                    <th class="white-space-nowrap">{{__('Action') }}
                </tr>
            </thead>
            <tbody>
                @forelse($data as $p)
                <tr>
                    <th scope="row">{{ ++$loop->index }}</th>
                    <td>{{$p->name_en}}</td>
                    
                    <td><img width="50px" src="{{asset('public/uploads/brands/'.$p->image)}}" alt=""></td>
                   
                    <td class="white-space-nowrap">
                        <a href="{{route('brands.edit',encryptor('encrypt',$p->id))}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        
                        <form id="form{{$p->id}}" 
                            action="{{route('brands.destroy',
                            encryptor('encrypt',$p->id))}}"
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
            {{$data->links()}}
        </div>
    </div>
    @endsection