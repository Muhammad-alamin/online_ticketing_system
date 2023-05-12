@extends('admin.layouts.master')

@section('content')

    <<!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-inner">
                                        <form action="{{route('admin.update.block', $block->id)}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Section Name</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select form-control form-control-lg" name="section_id" id="section_id" data-search="on">
                                                                <option selected="" disabled="" >Select Section</option>
                                                                @foreach($sections as $key=>$section)
                                                                    <option  @if(old('section_id',isset($block)?$block->section_id:null)  == $section->id) selected @endif value="{{$section->id}}">{{$section->section_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('section_id')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="name" class="form-label">Block Number</label>
                                                            <input type="text" class="form-control" name="block_number" id="title" value="{{old('block_number', isset($block)?$block->block_number:null)}}" placeholder="Enter block name">
                                                            @error('block_number')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Block Image Upload</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" name="block_image" id="block_image" multiple class="custom-file-input" value="{{old('block_image', isset($block)?$block->block_image:null)}}">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                        @error('block_image')<i class="text-danger">{{$message}}</i>@enderror
                                                    </div>
                                                </div>
                                            </div>

                                            @if (isset($block))
                                                <img src="{{asset($block->block_image)}}" width="150px;">
                                            @endif

                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
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
