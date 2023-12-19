@extends('backend.layout.app')

@section('title',trans('Category Create'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Create Category</h6>
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('categories.store')}}">
                    @csrf
                    
                    {{-- <div class="form-group mb-2">
                        <label for="role" class="form-label">Role</label><br>
                        <select class="form-select" id="role" aria-label="Role" name="roleId">
                            <option value="">Select Role</option>
                            @forelse($role as $r)
                            <option value="{{$r->id}}" {{ old('roleId')==$r->id?"selected":""}}> {{ $r->type}}
                            </option>
                            @empty
                            <option value="">No Role found</option>
                            @endforelse
                        </select>
                        @if($errors->has('roleId'))
                        <span class="text-danger"> {{ $errors->first('roleId') }}</span>
                        @endif
                    </div> --}}
                    <div class="mb-2">
                        <label for="name_en" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name_en" value="{{ old('categoriesName_en')}}"
                            name="categoriesName_en">
                        @if($errors->has('categoriesName_en'))
                        <span class="text-danger"> {{ $errors->first('categoriesName_en') }}</span>
                        @endif
                    </div>
                    
                    {{-- <div class="mb-2">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div> --}}
                    <div class="mb-2">
                        <label for="formFile" class="form-label">Image</label>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">input Image</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="fallback">
                                            <input name="image" id="formFile" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>
                                        </div>


                                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                                            <li class="mt-2" id="dropzone-preview-list">
                                                <!-- This is used as the file preview template -->
                                                <div class="border rounded">
                                                    <div class="d-flex p-2">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-sm bg-light rounded">
                                                                <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                                    src="{{asset('public/uploads/categories/'.request()->session()->get('image'))}}"
                                                                    alt="Dropzone-Image" />

                                                                {{-- <img data-dz-thumbnail
                                                                    class="img-fluid rounded d-block"
                                                                    src="{{asset('public/uploads/categories/new-document.png')}}"
                                                                    alt="Dropzone-Image" /> --}}
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="pt-1">
                                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger"
                                                                    data-dz-errormessage></strong>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-3">
                                                            <button data-dz-remove
                                                                class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- end dropzon-preview -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection