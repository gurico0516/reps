@extends('layouts.parent')

@section('content')

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                @if (session('editstatus'))
                    <div class="alert alert-success mt-4 mb-4">
                        {{ session('editstatus') }}
                    </div>
                @endif
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a class="btn btn-secondary" href="{{ route('index') }}">
                                投稿一覧に戻る
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
