@extends('backend.layout.app')

@section('title',trans('Create Customers'))

@section('content')


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Customers List</h6>
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('customers.store')}}">
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
                        <label for="name_en" class="form-label">Name(English)</label>
                        <input type="text" class="form-control" id="name_en" value="{{ old('customersName_en')}}"
                            name="customersName_en">
                        @if($errors->has('customersName_en'))
                        <span class="text-danger"> {{ $errors->first('customersName_en') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="name_bn" class="form-label">Name(Bangla)</label>
                        <input type="text" class="form-control" id="name_bn" value="{{ old('customersName_bn')}}"
                            name="customersName_bn">
                        @if($errors->has('customersName_bn'))
                        <span class="text-danger"> {{ $errors->first('customersName_bn') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ old('EmailAddress')}}" name="EmailAddress">
                        @if($errors->has('EmailAddress'))
                        <span class="text-danger"> {{ $errors->first('EmailAddress') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="contact_no_en" class="form-label">Contact No(English)</label>
                        <input type="text" class="form-control" id="contact_no_en" value="{{ old('contactNumber_en')}}"
                            name="contactNumber_en">
                        @if($errors->has('contactNumber_en'))
                        <span class="text-danger"> {{ $errors->first('contactNumber_en') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="contact_no_bn" class="form-label">Contact No(Bangla)</label>
                        <input type="text" class="form-control" id="contact_no_bn" value="{{ old('contactNumber_bn')}}"
                            name="contactNumber_bn">
                        @if($errors->has('contactNumber_bn'))
                        <span class="text-danger"> {{ $errors->first('contactNumber_bn') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" aria-label="status" name="status">
                            <option value="1" @if(old('status')==1) selected @endif>Active</option>
                            <option value="0" @if(old('status')==0) selected @endif>Inactive</option>
                        </select>
                        @if($errors->has('status'))
                        <span class="text-danger"> {{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    {{-- <div class="form-group mb-2">
                        <label for="full_access" class="form-label">Full Access</label>
                        <select class="form-select" id="full_access" aria-label="full_access" name="fullAccess">
                            <option value="0" @if(old('fullAccess')==0) selected @endif>No</option>
                            <option value="1" @if(old('fullAccess')==1) selected @endif>Yes</option>
                        </select>
                        @if($errors->has('fullAccess'))
                        <span class="text-danger"> {{ $errors->first('fullAccess') }}</span>
                        @endif
                    </div> --}}
                    <div class="mb-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text-area" class="form-control" id="address" value="{{ old('address')}}"
                            name="address">
                        @if($errors->has('address'))
                        <span class="text-danger"> {{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="shipping_address" class="form-label">Shipping Address</label>
                        <input type="text" class="form-control" id="shipping_address" value="{{ old('shippingAddress')}}"
                            name="shippingAddress">
                        @if($errors->has('shippingAddress'))
                        <span class="text-danger"> {{ $errors->first('shippingAddress') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if($errors->has('password'))
                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection