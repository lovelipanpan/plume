@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            @if($topic->id)
            编辑话题
            @else
            新建话题
            @endif
          </h2>

          <hr>

          @if($topic->id)
            <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_method" value="PUT">
          @else
            <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
          @endif

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('shared._error')

              <div class="form-group">
                <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required />
              </div>

              <div class="form-group">
                <select class="form-control" name="category_id" required>
                  <option value="" hidden disabled selected>请选择分类</option>
                  @foreach ($categories as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <textarea name="body" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。">{{ old('body', $topic->body ) }}</textarea>
              </div>

              <div class="well well-sm">
                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/simplemde.min.css') }}">
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/simplemde.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/inline-attachment.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/codemirror-4.inline-attachment.js') }}"></script>

  <script>

    $(document).ready(function() {
    $("#editor").bind({
        copy : function(){
          alert(1)
        },
        paste : function(){
          alert(2)
        },
        cut : function(){
          alet(3)
        }
    });
      var simplemde = new SimpleMDE({
        textarea: $('#editor'),
        autofocus: true,
        autosave: {
            enabled: true,
            uniqueId: "#editor",
            delay: 1000,
        },
        promptURLs: true,
      });

      // 在已有的 simplemde 对象的基础上再增加图片拖拽
      inlineAttachment.editors.codemirror4.attach(simplemde.codemirror ,{
        extraParams: {
            '_token': "{{ csrf_token() }}",
        },
        uploadFieldName: 'upload_file',
        uploadUrl: '{{ route('topics.upload_image') }}',
        onFileUploadResponse: function(xhr) {
          var result = JSON.parse(xhr.responseText),
          filename = result['file_path'];

          if (result && filename) {
              var newValue;
              if (typeof this.settings.urlText === 'function') {
                  newValue = this.settings.urlText.call(this, filename, result);
              } else {
                  newValue = this.settings.urlText.replace(this.filenameTag, filename);
              }
              var text = this.editor.getValue().replace(this.lastValue, newValue);
              this.editor.setValue(text);
              this.settings.onFileUploaded.call(this, filename);
          }
          return false;
        }
      });

    });
  </script>
@stop
