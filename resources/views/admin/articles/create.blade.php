@extends('layouts.adminlayout')

@section('title','Всички Публикации')

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
        <form method="post" action="/admin/articles" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Заглавие</label>
                <input type="text" id="title" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="slug">URL Slug</label>
                <input type="text" id="slug" class="form-control" name="slug">
            </div>
            <label>Upload Image</label>
            <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Изображение… <input type="file" name="image" id="imgInp">
                </span>
            </span>
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
                <label for="body">Текст</label>
                <textarea name="body" class="form-control" id="body" rows="5"></textarea>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" selected="selected" name="active" type="checkbox" value="" id="defaultCheck1">
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
    'insertdatetime media table contextmenu paste code help wordcount codesample'
  ],
  toolbar: 'codesample | insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});
  </script>
@endsection
