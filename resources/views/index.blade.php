@extends('layouts.parent')

@section('content')

 <h1 class="h4 mb-4 font-weight-bold">
    みんなの投稿
</h1>
<div class="mt-3 mb-3">
    <a href="{{ route('create') }}" class="btn btn-primary">
        投稿してみる
    </a>
    <a href="{{ route('home') }}" class="btn btn-primary">
        トップ
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>日時</th>
                <th>お名前</th>
                <th>好きな爬虫類</th>
                <th>魅力</th>
            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->subject }}</td>
                    <td>{!! nl2br(e($post->message, 100)) !!}
                        @if ($post->comments->count() >= 1)
                            <p><span class="badge badge-primary">コメント：{{ $post->comments->count() }}件</span></p>
                        @endif
                    </td>
                    <td class="text-nowrap">
                        <p><a href="{{ route('show', $post->id) }}" class="btn btn-primary btn-sm">詳細</a></p>
                        <p><a href="{{ route('edit', $post->id) }}" class="btn btn-info btn-sm">編集</a></p>
                        <p><a href="{{ route('delete-confirm', $post->id) }}" class="btn btn-danger btn-sm">削除</a></p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mb-5">
        {{ $posts->links() }}
    </div>
</div>

@endsection
