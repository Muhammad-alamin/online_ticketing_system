@extends('admin.layouts.master')

@section('content')

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                                <div class="card">
                                    @if(session('success'))
                                        <div class="alert alert-danger">
                                            {{session()->get('success')}}
                                        </div>
                                    @endif
                                    <div class="card-inner">
                                        <div class="card-head">
                                            <h5 class="card-title">Edit Event</h5>
                                        </div>
                                        <form action="{{route('admin.event.update',encrypt($event->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Category Name</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select form-control form-control-lg" name="category_id" id="category" data-search="on">
                                                                    <option selected="" disabled="" >Select Category</option>
                                                                    @foreach($categories as $key=>$category)
                                                                        <option  @if(old('category_id',isset($event)?$event->category_id:null)  == $category->id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="default-06">Sports Name</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select form-control form-control-lg" name="sub_cat_id" id="sub_cat_id" data-search="on">
                                                                    <option selected="" disabled="" >Select Sport Name</option>
                                                                    @foreach($parent_sub_cat as $key=>$parent_sub_cat)
                                                                        <option  @if(old('sub_cat_id',isset($event)?$event->sub_cat_id:null)  == $parent_sub_cat->id) selected @endif value="{{$parent_sub_cat->id}}">{{$parent_sub_cat->sub_cat_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('sub_cat_id')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="default-06">League Name</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select form-control form-control-lg" name="child_sub_cat_id" id="child_sub_cat_id" data-search="on">
                                                                    <option selected="" disabled="" >Select League Name</option>
                                                                    @foreach($child_sub_cat as $key=>$child_sub_cat)
                                                                        <option  @if(old('child_sub_cat_id',isset($event)?$event->child_sub_cat_id:null)  == $child_sub_cat->id) selected @endif value="{{$child_sub_cat->id}}">{{$child_sub_cat->child_sub_cat_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('child_sub_cat_id')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <label for="match_name" class="form-label">Event/Match Name</label>
                                                                <input type="text" class="form-control" name="match_name" id="match_name" value="{{old('match_name', isset($event)?$event->match_name:null)}}" placeholder="Liverpool - Arsenal">
                                                                @error('match_name')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Venue Name</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select form-control form-control-lg" name="venue_id" id="category" data-search="on">
                                                                    <option selected="" disabled="" >Select Venue</option>
                                                                    @foreach($venues as $key=>$venue)
                                                                        <option  @if(old('venue_id',isset($event)?$event->venue_id:null)  == $venue->id) selected @endif value="{{$venue->id}}">{{$venue->venue_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('venue_id')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Match Date & Time</label>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-left">
                                                                    <em class="icon ni ni-calendar"></em>
                                                                </div>
                                                                <input type="text" class="form-control" name="match_date_time" id="match_time" value="{{old('match_date_time', isset($event)?$event->match_date_time:null)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="default-06">Event Thumbnail Image</label>
                                                            <div class="form-control-wrap">
                                                                <div class="custom-file">
                                                                    <input type="file" name="image" id="image" multiple class="custom-file-input" >
                                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    @error('image')<i class="text-danger">{{$message}}</i>@enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if (isset($event))
                                                        <img src="{{asset($event->image)}}" width="100px;">
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <label for="description" class="form-label">Description</label>
                                                                <textarea class="form-control no-resize" name="description" id="description" placeholder="Enter Description"> {{old('description', isset($event)?$event->description:null)}} </textarea>
                                                                @error('description')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- card -->
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">

</script>

<script type="text/javascript">

    $(document).ready(function() {

        $("#add-more").click(function(){
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });

    });

</script>





<!--<script type="text/javascript">
    $(function (){
        var category_id = $('[ name="category_id"]')

        category_id.change(function (){
            var id = $(this).val();

            if (id)
            {
                $.ajax({
                    url: "{{ url('/vendor/sub_category/')}}/"+id,
                    type:"GET",
                    dataType:"json",
                    success: function(data){
                        $("#subcategory").empty();
                        $.each(data,function (key,value){
                            $("#subcategory").append('<option value="'+value.id+'">'+value.subcat_name+'</option>').val(html.data.subcategory);
                        });
                    }
                })
            }

            else {
                alert('danger')
            }
        })
    })
</script>-->
