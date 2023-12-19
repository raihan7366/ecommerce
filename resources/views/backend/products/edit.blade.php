@extends('backend.layout.app')

@section('title',trans('Create Products'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Products Create</h6>
                <form class="form" method="post" enctype="multipart/form-data"
                    action="{{route('products.update',encryptor('encrypt',$product->id))}}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$product->id)}}">
                    <div class="row">

                        <div class="mb-2">
                            <label for="name_en" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name_en"
                                value="{{ old('productsName_en', $product->name_en)}}" name="productsName_en">
                            @if($errors->has('productsName_en'))
                            <span class="text-danger"> {{ $errors->first('productsName_en') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <input type="text-area" class="form-control" id="description"
                                value="{{ old('description', $product->description)}}" name="description">
                            @if($errors->has('description'))
                            <span class="text-danger"> {{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="short_description" class="form-label">Short Description</label>
                            <input type="text-area" class="form-control" id="shortDescription"
                                value="{{ old('shortDescription', $product->short_description)}}"
                                name="shortDescription">
                            @if($errors->has('shortDescription'))
                            <span class="text-danger"> {{ $errors->first('shortDescription') }}</span>
                            @endif
                        </div>

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
                                                                    <img data-dz-thumbnail
                                                                        class="img-fluid rounded d-block"
                                                                        src="{{asset('public/uploads/products/new-document.png')}}"
                                                                        alt="Dropzone-Image" />
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

                        <div class="form-group mb-2">
                            <label for="category" class="form-label">Categories</label><br>
                            <select class="form-select" id="category" aria-label="Categories" name="categoryId">
                                <option value="">Select Category</option>
                                @forelse($category as $c)
                                <option value="{{$c->id}}" {{ old('categoryId', $product->category_id)
                                    ==$c->id?"selected":""}}> {{ $c->name_en}}
                                </option>
                                @empty
                                <option value="">No Category found</option>
                                @endforelse
                            </select>
                            @if($errors->has('categoryId'))
                            <span class="text-danger"> {{ $errors->first('categoryId') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="subcategory" class="form-label">Sub-Categories</label><br>
                            <select class="form-select" id="subcategory" aria-label="Sub-Categories" name="subcategoryId">
                                <option value="">Select Sub-Category</option>
                                @forelse($subcategory as $sc)
                                <option value="{{$sc->id}}" {{ old('categoryId', $product->subcategory_id)
                                    ==$sc->id?"selected":""}}> {{ $sc->subcatname_en}}
                                </option>
                                @empty
                                <option value="">No Sub-Category found</option>
                                @endforelse
                            </select>
                            @if($errors->has('subcategoryId'))
                            <span class="text-danger"> {{ $errors->first('subcategoryId') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="brand_id" class="form-label">Brands</label><br>
                            <select class="form-select" id="brand" aria-label="Brands" name="brandId">
                                <option value="">Select Brand</option>
                                @forelse($brand as $b)
                                <option value="{{$b->id}}" {{ old('brandId', $product->brand_id)
                                    ==$b->id?"selected":""}}> {{ $b->name_en}}
                                </option>
                                @empty
                                <option value="">No Brand found</option>
                                @endforelse
                            </select>
                            @if($errors->has('brandId'))
                            <span class="text-danger"> {{ $errors->first('brandId') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="name_en" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" value="{{ old('price',$product->price)}}"
                                name="price">
                            @if($errors->has('price'))
                            <span class="text-danger"> {{ $errors->first('price') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="discount_type" class="form-label">Discount Type</label>
                            <select class="form-select" id="status" aria-label="status" name="discountType">
                                <option value="1" @if(old('discountType', $product->discount_type)==1) selected
                                    @endif>Percentage</option>
                                <option value="2" @if(old('discountType', $product->discount_type)==2) selected
                                    @endif>Fixed</option>
                            </select>
                            @if($errors->has('discountType'))
                            <span class="text-danger"> {{ $errors->first('discountType') }}</span>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="discount_amount" class="form-label">Discount Amount</label>
                            <input type="text" class="form-control" id="contact_no_en"
                                value="{{ old('discountAmount',$product->discount_amount)}}" name="discountAmount">

                            @if($errors->has('discountAmount'))
                            <span class="text-danger"> {{ $errors->first('discountAmount') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="is_popular" class="form-label">Popular</label>
                            <select class="form-select" id="isPopular" aria-label="isPopular" name="isPopular">
                                <option value="1" @if(old('isPopular',$product->is_popular)==1) selected @endif>Yes
                                </option>
                                <option value="0" @if(old('isPopular',$product->is_popular)==0) selected @endif>No
                                </option>
                            </select>
                            @if($errors->has('isPopular'))
                            <span class="text-danger"> {{ $errors->first('isPopular') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="is_featured" class="form-label">Featured</label>
                            <select class="form-select" id="isFeatured" aria-label="isFeatured" name="isFeatured">
                                <option value="1" @if(old('isFeatured',$product->is_featured)==1) selected @endif>Yes
                                </option>
                                <option value="0" @if(old('isFeatured',$product->is_featured)==0) selected @endif>No
                                </option>
                            </select>
                            @if($errors->has('isFeatured'))
                            <span class="text-danger"> {{ $errors->first('isFeatured') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection