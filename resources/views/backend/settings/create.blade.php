@extends('backend.layout.app')

@section('title',trans('Create Settings'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Settings Create</h6>
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('settings.store')}}">
                    @csrf

                    <div class="mb-2">
                        <label for="company_add" class="form-label">Company Address</label>
                        <input type="text" class="form-control" id="company_add" value="{{ old('companyAddress')}}"
                            name="companyAddress">
                        @if($errors->has('companyAddress'))
                        <span class="text-danger"> {{ $errors->first('companyAddress') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" value="{{ old('contactNumber')}}"
                            name="contactNumber">
                        @if($errors->has('contactNumber'))
                        <span class="text-danger"> {{ $errors->first('contactNumber') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email"
                            value="{{ old('email')}}" name="email">
                        @if($errors->has('email'))
                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="facebookLink" class="form-label">Facebook Link</label>
                        <input type="text" class="form-control" id="facebookLink" value="{{ old('facebookLink')}}"
                            name="facebookLink">
                        @if($errors->has('facebookLink'))
                        <span class="text-danger"> {{ $errors->first('facebookLink') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="twitterLink" class="form-label">Twitter Link</label>
                        <input type="text" class="form-control" id="twitterLink" value="{{ old('twitterLink')}}"
                            name="twitterLink">
                        @if($errors->has('twitterLink'))
                        <span class="text-danger"> {{ $errors->first('twitterLink') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="whatsappLink" class="form-label">Whatsapp Link</label>
                        <input type="text" class="form-control" id="whatsappLink" value="{{ old('whatsappLink')}}" name="whatsappLink">
                            
                        @if($errors->has('whatsappLink'))
                        <span class="text-danger"> {{ $errors->first('whatsappLink') }}</span>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="formFile" class="form-label">Logo</label>
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
                                                                    src="{{asset('public/uploads/settings/new-document.png')}}"
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
 
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection