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
                                    <div class="card-inner">
                                        <form action="{{route('admin.child-sub-category.store')}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">

                                                    <div class="form-group">
                                                        <label class="form-label">Category Name</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="default-06" name="category_id" id="category_id">
                                                                    <option selected="" disabled="" >Select category</option>
                                                                    @foreach($categories as $key=>$category)
                                                                        <option  value="{{$category->id}}">{{$category->category_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Sport Name</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" name="parent_sub_cat" id="parent_sub_cat">
                                                                    <option selected="" disabled="" >Select Sport</option>
                                                                </select>
                                                                @error('parent_sub_cat')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="title" class="form-label">Leauge Name</label>
                                                            <input type="text" class="form-control" name="child_sub_cate_name" id="child_sub_cate_name" value="" placeholder="Enter Leauge name">
                                                            @error('child_sub_cate_name')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- card -->
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection

