@extends("admin.default")
@section("title","首页-文章编辑")
@section('content')
<div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">@yield('title')</h3>
        </div>
        <div class="row font-weight-bold">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  @if ($errors ->any())
                      <div id="app">
                          <ul>
                              @foreach ($errors ->all() as $error)
                              <el-alert title="{{ $error }}" type="error">
                              </el-alert>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                      {{ showFlash() }}
        <form class="forms-sample"  method="post" action="{{ route('admin.news.update',$data->id) }}"  enctype="multipart/form-data">
        @csrf
            @method("PUT")
        <div class="form-group">
        <label for="title">新闻标题</label>
        <input type="text" class="form-control" name="title" id="title"
        placeholder="请输入新闻标题" value="{{ $data->title }}">
        </div>

        <div class="form-group">
        <label for="description">新闻摘要</label>
        <textarea class="form-control" name="description" id="description"
        rows="3">{{ $data->description }}</textarea>
        </div>

        <div class="form-group">
        <label for="clicked">浏览次数</label>
        <input type="text" class="form-control" name="clicked" id="clicked"
        placeholder="请输入浏览次数" value="{{ $data->clicked }}">
        </div>

        <div class="form-group">
        <label for="ImagePath">图片上传</label>
        <input type="file" class="file-upload-default" name="ImagePath" id="ImagePath">
        <div class="input-group col-xs-12">
          <input type="text" disabled=""
          placeholder="上传图片" class="form-control file-upload-info" value="{{ $data->ImagePath }}">
          <span class="input-group-append">
          <button type="button"
          class="file-upload-browse btn btn-gradient-primary">上传</button>
          </span>
        </div>
        </div>
        <div class="form-group">
            <label for="Content">新闻内容</label>
                        <div id="Content" name="Content">
                            <p>{!! $data->Content !!}</p>
                        </div>
            <textarea name="Content" id="text1"></textarea>
        </div>
            <button type="submit"   class="btn btn-gradient-primary mr-2">保存</button>
        </form>
      </div>
      </div>
      </div>
      </div>
      </div>

{{--<script type="text/javascript" src="{{ config('static.Admin') }}/wangeditor/dist/wangEditor.min.js"></script>--}}
<script type="text/javascript" src="https://unpkg.com/wangeditor/dist/wangEditor.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    // 文本编辑器
    const E = window.wangEditor;
    const editor = new E("#Content");
    // 配置 server 接口地址
    editor.config.uploadImgShowBase64 = true;
    // editor.config.uploadImgServer = '/admin/imgupload';
    let $text1 = $("#text1");
    editor.config.onchange = function (html) {
        //监控变化
        $text1.val(html);
    }
    editor.create();
    editor.config.hideLinkImg = false;
    editor.config.debug=true;
</script>
@endsection
