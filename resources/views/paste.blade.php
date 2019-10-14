@extends("layouts.main")
@section("title")
    {{$p->id}}
@endsection
@section("content")
    @if($p->syntax)
        <div class="row">
            <div class="col-md-6">
                <pre class="line-numbers"><code class="language-{{$p->language}}">{{$p->code}}</code>
                </pre>
            </div>
            <div class="col-md-6">
                <pre class="line-numbers"><code class="language-{{$p->language}}">{{$p->syntax}}</code>
                </pre>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col">
                <pre class="line-numbers"><code class="language-{{$p->language}}">{{$p->code}}</code>
                </pre>
            </div>
        </div>
    @endif
@endsection