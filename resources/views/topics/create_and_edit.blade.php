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
                <textarea name="body" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" required>{{ old('body', $topic->body ) }}</textarea>
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
      var simplemde = new SimpleMDE({
        textarea: $('#editor'),
        // upload: {
        //   url: '{{ route('topics.upload_image') }}',
        //   params: {
        //     _token: '{{ csrf_token() }}'
        //   },
        //   fileKey: 'upload_file',
        //   connectionCount: 3,
        //   leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        // },
        pasteImage: true,
      });


      // 在已有的 simplemde 对象的基础上再增加图片拖拽
      inlineAttachment.editors.codemirror4.attach(simplemde.codemirror, {
          // // 传递 CSRF token
          extraParams: {
              '_token': "{{ csrf_token() }}",
          },
          uploadFieldName: 'upload_file',
          // // 设置图片上传的地址
          uploadUrl: '{{ route('topics.upload_image') }}',

          // // 上传之后的处理
          onFileUploadResponse: function(xhr) {

              var result = JSON.parse(xhr.responseText),
              filename = result[this.settings.jsonFieldName];
              if (result && result.success == true) {
                  this.editor.setValue(result.file_path);
              }
              return false;
          }
      });

    });
  </script>
@stop
