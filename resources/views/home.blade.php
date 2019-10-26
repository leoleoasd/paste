@extends("layouts.main")

@section("title","主页")

@section("content")
    <form action="/" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">输入代码</label>
            <textarea class="form-control" name="code" id="code" rows="30"></textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <select class="custom-select" name="language">
                    <option value="c++11" @if(\Cookie::get("language")=="c++11") selected @endif>C++11</option>
                    <option value="c++14" @if(\Cookie::get("language")=="c++14") selected @endif>C++14</option>
                    <option value="c++17" @if(\Cookie::get("language")=="c++15") selected @endif>C++17</option>
                    <option value="c90" @if(\Cookie::get("language")=="c90") selected @endif>ANSI C</option>
                    <option value="c99" @if(\Cookie::get("language")=="c99") selected @endif>C99</option>
                    <option value="c11" @if(\Cookie::get("language")=="c11") selected @endif>C11</option>
                    <option value="c17" @if(\Cookie::get("language")=="c17") selected @endif>C17</option>
                    <option value="python" @if(\Cookie::get("language")=="python") selected @endif>Python</option>
                    <option value="-1" @if(\Cookie::get("language")=="-1") selected @endif>Others</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-checkbox" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" id="format" name="format" checked>
                    <label class="custom-control-label" for="format">格式化代码</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-checkbox" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" id="obfs" name="obfs">
                    <label class="custom-control-label" for="obfs">代码防复制</label>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col">
                <button type="button" id="s" class="btn btn-outline-success w-100">提交</button>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $("#s").click(function(){
            $("#code").val(Base64.encode($("#code").val()));
            $("form").submit();
            $("#code").val(Base64.decode($("#code").val()));
        });
    </script>
@endpush