@extends('layouts.parent')

@section('content')

<br>
<br>

<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            投稿の削除
        </h1>

        <form method="POST" action="{{ route('delete-complete', $post->id) }}">
            @csrf
            <fieldset class="mb-4">

                <div class="form-group">
                    <label for="subject">お名前</label>
                    <div class="col-md-6">
                        <div class="form-control-static">
                            {{ $post->name }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">好きな爬虫類</label>
                    <div class="col-md-6">
                        <div class="form-control-static">
                            {{ $post->subject }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">魅力</label>
                    <div class="col-md-6">
                        <div class="form-control-static">
                            {{ $post->message }}
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('index') }}">
                        キャンセル
                    </a>

                    <input type="submit" class="btn btn-info" value="削除する">
                </div>
            </fieldset>
        </form>
    </div>
</div>

@endsection
