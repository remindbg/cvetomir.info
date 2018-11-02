@extends('layouts.adminlayout')

@section('title','Edit')

@section('content')
    <div class="col-lg-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('articles.update',$article->id)}}" enctype="multipart/form-data">
            @csrf()
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="title">Заглавие</label>
                <input type="text" id="title" class="form-control" name="title" value="{{$article->title}}">
            </div>
            <div class="form-group">
                <label for="slug">URL Slug</label>
                <input type="text" id="slug" class="form-control" name="slug" value="{{$article->slug}}">
            </div>

            <div class="form-group">
                <label for="category">Категория</label>
                <select class="form-control" name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="slug">Тагове</label>
                <input type="text" id="tags" class="form-control" value="{{$article->tags}}" name="tags">
            </div>

            <div class="form-group">
                <label for="body">Текст</label>
                <textarea name="body" class="form-control" id="body" rows="5">{{$article->body}}</textarea>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" @if($article->active == true) checked="checked" @endif name="active" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Одобрена?
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-block">Изпращане</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src='{{URL::Asset('vendor/tinymce/tinymce.min.js')}}'></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount codesample', 'code image'
            ],
            toolbar: 'image code | codesample | insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'],
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/admin/articles/uploadimage',
            file_picker_types: 'image',
            document_base_url : "/",
            relative_urls : false,
            remove_script_host : false,
            images_upload_base_path: '/',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    </script>
@endsection

