@extends('layouts.parent')

@section('content')

<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            投稿の新規作成
        </h1>

        <form method="POST" action="{{ route('create-complete') }}">
            @csrf
            <fieldset class="mb-4">

                <div class="form-group">
                    <label for="subject">お名前</label>
                    {{ $inputs['name'] }}
                </div>

                <div class="form-group">
                    <label for="subject">好きな爬虫類</label>
                    {{ $inputs['subject'] }}
                </div>

                <div class="form-group">
                    <label for="message">魅力</label>
                    {{ $inputs['message'] }}
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('create') }}">
                        入力画面に戻る
                    </a>

                    <button type="submit" class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

@endsection
