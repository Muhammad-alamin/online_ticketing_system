@extends('admin.layouts.master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- content @s
        -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="components-preview wide-md mx-auto">
                            <div class="nk-block nk-block-lg">
                                <div class="card">
                                    <div class="card-inner">
                                        <div class="card-head">
                                            <h5 class="card-title">Create Event</h5>
                                        </div>
                                        <form action="{{ route('admin.event.store') }}" method="post" class="gy-3"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-4">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Category Name</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="default-06" name="category_id"
                                                                    id="category_id">
                                                                    <option selected="" disabled="">Select category
                                                                    </option>
                                                                    @foreach ($categories as $key => $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->category_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id')
                                                                    <i class="text-danger">{{ $message }}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Sport Name</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" name="parent_sub_cat"
                                                                    id="parent_sub_cat">
                                                                    <option selected="" disabled="">Select Sport Name
                                                                    </option>
                                                                </select>
                                                                @error('parent_sub_cat')
                                                                    <i class="text-danger">{{ $message }}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Leauge Name</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" name="child_sub_cat"
                                                                    id="child_sub_cat">
                                                                    <option selected="" disabled="">Select Leauge Name
                                                                    </option>
                                                                </select>
                                                                @error('child_sub_cat')
                                                                    <i class="text-danger">{{ $message }}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="match_name" class="form-label">Event/Match Name</label>
                                                            <input type="text" class="form-control" name="match_name"
                                                                id="match_name" value=""
                                                                placeholder="Liverpool - Arsenal">
                                                            @error('match_name')
                                                                <i class="text-danger">{{ $message }}</i>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Venue Name</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="default-06" name="venue_id"
                                                                    id="venue_id">
                                                                    <option selected="" disabled="">Select Venue
                                                                    </option>
                                                                    @foreach ($venues as $key => $venue)
                                                                        <option value="{{ $venue->id }}">
                                                                            {{ $venue->venue_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('venue_id')
                                                                    <i class="text-danger">{{ $message }}</i>
                                                                @enderror
                                                            </div>
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
                                                            <input type="text" class="form-control" name="match_date_time"
                                                                id="match_time">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Event Thumbnail Image</label>
                                                        <div class="form-control-wrap">
                                                            <div class="custom-file">
                                                                <input type="file" name="image" id="image" multiple
                                                                    class="custom-file-input">
                                                                <label class="custom-file-label" for="customFile">Choose
                                                                    file</label>
                                                                @error('image')
                                                                    <i class="text-danger">{{ $message }}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control no-resize" name="description" id="description" placeholder="Enter Description"> </textarea>
                                                            @error('description')
                                                                <i class="text-danger">{{ $message }}</i>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3">
                                                    <div class="col-lg-6">
                                                        <div class="form-group mt-2">
                                                            <button type="submit"
                                                                class="btn btn-lg btn-primary">submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .components-preview -->
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>



    <!--<script type="text/javascript">
        $(function() {
            var category_id = $('[ name="category_id"]')

            category_id.change(function() {
                var id = $(this).val();

                if (id) {
                    $.ajax({
                        url: "{{ url('/vendor/sub_category/') }}/" + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#subcategory").empty();
                            $.each(data, function(key, value) {
                                $("#subcategory").append('<option value="' + value.id +
                                    '">' + value.subcat_name + '</option>').val(html
                                    .data.subcategory);
                            });
                        }
                    })
                } else {
                    alert('danger')
                }
            })
        })
    </script>-->

    <script type="text/javascript">
        $(document).ready(function() {

            $("#add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>
