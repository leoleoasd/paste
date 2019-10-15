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
                    <option value="c++">C++</option>
                    <option value="c">C</option>
                    <option value="python">Python</option>
                    <option value="-1">Others</option>
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