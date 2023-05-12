@extends('admin.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Profile</h4>
                                                <div class="nk-block-des">
                                                    <p>Edit info</p>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{route('profile.information.update',encrypt($user->id))}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{old('name', isset($user)?$user->name:null)}}" placeholder="Enter User Name">
                                                @error('name')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{old('email', isset($user)?$user->email:null)}}" placeholder="Enter User Email">
                                                @error('email')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="form-label">Mobile No</label>
                                                <input type="text" name="mobile" class="form-control form-control-lg" id="mobile" value="{{old('mobile', isset($user)?$user->mobile:null)}}" placeholder="Enter Your Valid Mobile No">
                                                @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="form-label">Address</label>
                                                <input type="text" name="address" class="form-control form-control-lg" id="address" value="{{old('address', isset($user)?$user->address:null)}}" placeholder="Enter Your Address">
                                                @error('address')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Select Country</label>
                                                <div class="form-control-wrap ">
                                                    <div class="form-control-select">
                                                        <select class="form-control" id="default-06" name="country">
                                                            <option selected="" disabled="" >Select Country</option>
                                                            <option  value="Bangladesh"{{$user->country == "Bangladesh" ? 'selected' : ''}}>Bangladesh</option>
                                                            <option  value="India"{{$user->country == "India" ? 'selected' : ''}}>India</option>
                                                            <option  value="Pakistan"{{$user->country == "Pakistan" ? 'selected' : ''}}>Pakistan</option>
                                                        </select>
                                                        @error('country')<i class="text-danger">{{$message}}</i>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Select City</label>
                                                <div class="form-control-wrap ">
                                                    <div class="form-control-select">
                                                        <select class="form-control" id="default-06" name="city">
                                                            <option selected="" disabled="" >Select City</option>
                                                            <option  value="Dhaka" {{$user->city == "Dhaka" ? 'selected' : ''}}>Dhaka</option>
                                                            <option  value="Chittagong"{{$user->city == "Chittagong" ? 'selected' : ''}}>Chittagong</option>
                                                            <option  value="Khulna"{{$user->city == "Khulna" ? 'selected' : ''}}>Khulna</option>
                                                            <option  value="Sylhet"{{$user->city == "Sylhet" ? 'selected' : ''}}>Sylhet</option>
                                                            <option  value="Rajshahi"{{$user->city == "Rajshahi" ? 'selected' : ''}}>Rajshahi</option>
                                                            <option  value="Mymensingh"{{$user->city == "Mymensingh" ? 'selected' : ''}}>Mymensingh</option>
                                                            <option  value="Barisal"{{$user->city == "Barisal" ? 'selected' : ''}}>Barisal</option>
                                                            <option  value="Rangpur"{{$user->city == "Rangpur" ? 'selected' : ''}}>Rangpur</option>
                                                            <option  value="Comilla"{{$user->city == "Comilla" ? 'selected' : ''}}>Comilla</option>
                                                            <option  value="Narayanganj"{{$user->city == "Narayanganj" ? 'selected' : ''}}>Narayanganj</option>
                                                            <option  value="Gazipur"{{$user->city == "Gazipur" ? 'selected' : ''}}>Gazipur</option>
                                                        </select>
                                                        @error('city')<i class="text-danger">{{$message}}</i>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="form-label">State</label>
                                                <input type="text" name="state" class="form-control form-control-lg" id="state" value="{{old('state', isset($user)?$user->state:null)}}" placeholder="Enter State">
                                                @error('state')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="form-label">Zip</label>
                                                <input type="text" name="zip" class="form-control form-control-lg" id="zip" value="{{old('zip', isset($user)?$user->zip:null)}}" placeholder="Enter Zip">
                                                @error('zip')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Select Role</label>
                                                <div class="form-control-wrap ">
                                                    <div class="form-control-select">
                                                        <select class="form-control" id="default-06" name="role_as">
                                                            <option selected="" disabled="" >Select Role</option>
                                                            <option  value="vendor" {{$user->role_as == "vendor" ? 'selected' : ''}}>Vendor</option>
                                                            <option  value="manager" {{$user->role_as == "manager" ? 'selected' : ''}}>Manager</option>
                                                            <option  value="employee" {{$user->role_as == "employee" ? 'selected' : ''}}>Employee</option>
                                                            <option  value="customer" {{$user->role_as == 'customer' ? 'selected' : ''}}>Customer</option>
                                                        </select>
                                                        @error('role_as')<i class="text-danger">{{$message}}</i>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="form-label">NID Number</label>
                                                <input type="text" name="nid" class="form-control form-control-lg" id="nid" value="{{old('nid', isset($user)?$user->nid:null)}}" placeholder="Enter Nid Number">
                                                @error('nid')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="product_status" class="form-label">User Status</label>
                                                            <div class="form-check">
                                                                <input type="radio" name="status" class="form-check-input" @if(old('status',isset($user)?$user->status:null)  == 'Active') checked @endif value="Active" id="Active">
                                                                <label  for="active">Active</label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input type="radio" name="status" class="form-check-input" @if(old('status',isset($user)?$user->status:null)  == 'Inactive') checked @endif value="Inactive" id="Inactive">
                                                                <label for="inactive">Inactive</label>
                                                            </div>
                                                            @error('status')<i class="text-danger">{{ $message }}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <div class="form-control-wrap">
                                                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                    </a>
                                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter User password">
                                                    @error('password')<i class="text-danger">{{$message}}</i>@enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="password">Confirm Password</label>
                                                <div class="form-control-wrap">
                                                    <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-md btn-primary btn-block">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection

