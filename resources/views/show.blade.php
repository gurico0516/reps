@extends('layouts.parent')

@section('content')

<br>
<br>

<main id="main">

    <div class="container mt-4">
        <div class="border p-4">
            {{-- 件名 --}}
            <h1 class="h4 mb-4">
                {{ $post->subject }}
            </h1>

            {{-- 投稿情報 --}}
            <div class="summary">
                <p><span>{{ $post->name }}</span> / <time>{{ $post->updated_at->format('Y-m-d') }}</time></p>
            </div>

            {{-- 本文 --}}
            <p class="mb-5">
                {!! nl2br(e($post->message)) !!}
            </p>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-9 mt-3">
            <p>
                <a href="{{ route('index') }}" class="btn btn-outline-dark btn-sm">一覧に戻る</a>
                @auth
                    @if ($post->user_id == Auth::user()->id)
                        <a href="{{ route('edit', $post->id) }}" class="btn btn-info btn-sm">編集</a>
                        <a href="{{ route('delete-confirm', $post->id) }}" class="btn btn-danger btn-sm">削除</a>
                    @endif
                @endauth
            </p>
        </div>
    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>


@endsection
