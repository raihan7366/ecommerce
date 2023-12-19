@extends('backend.layout.app')

@section('title', trans('Category Create'))

@section('content')


    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Sub-Category Create</h6>
                    <form class="form" method="post" enctype="multipart/form-data"
                        action="{{ route('subcategories.update', encryptor('encrypt', $subcategory->id)) }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="uptoken" value="{{ encryptor('encrypt', $subcategory->id) }}">
                        <div class="row">

                            <div class="mb-2">
                                <label for="subcatname_en" class="form-label">Sub-Category Name</label>
                                <input type="text" id="subcategoriesName_en" class="form-control"
                                    value="{{ old('subcategoriesName_en', $subcategory->subcatname_en) }}"
                                    name="subcategoriesName_en">
                                @if ($errors->has('subcategoriesName_en'))
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
