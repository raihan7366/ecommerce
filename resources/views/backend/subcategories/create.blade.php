@extends('backend.layout.app')

@section('title',trans('Sub-Category Create'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Create Sub-Category</h6>
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('subcategories.store')}}">
                    @csrf
                    <div class="mb-2">
                        <label for="subcatname_en" class="form-label">Sub-category Name</label>
                        <input type="text" class="form-control" id="subcatname_en" value="{{ old('subcategoriesName_en')}}"
                            name="subcategoriesName_en">
                        @if($errors->has('subcategoriesName_en'))
                        <span class="text-danger"> {{ $errors->first('subcategoriesName_en') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection