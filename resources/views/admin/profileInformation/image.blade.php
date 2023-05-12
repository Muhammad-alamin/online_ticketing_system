@extends('admin.layouts.master')
@section('content')
<div class="container py-5">
    <!-- For demo purpose -->
    <header class="text-white text-center bg-grey">
        <h1 class="display-4"></h1>
        <p class="lead mb-0"></p>
        <p class="mb-5 font-weight-light">
            <a href="https://bootstrapious.com" class="text-white">
                <u></u>
            </a>
        </p>
        <br>
        <br>
        <img src="https://bootstrapious.com/i/snippets/sn-img-upload/image.svg" alt="" width="150" class="mb-4">
    </header>
    <div class="row py-4">
        <div class="col-lg-6 mx-auto">

            <!-- Upload image input-->
            <form action="{{route('profile.image.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" onchange="readURL(this);" name="image" class="form-control border-0">
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="far fa-file-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                    </div>
                </div>

                <!-- Uploaded image area-->
                <p class="font-italic text-white text-center"></p>
                <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                <div class="col-lg-4 mx-auto">
                    <div class="form-group">
                        <button class="btn btn-md btn-primary btn-block">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
