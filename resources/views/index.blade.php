@extends('layouts.parent')

@section('content')

<br>
<br>
<br>

<h1 class="h4 mb-4 font-weight-bold">
    みんなの投稿
</h1>

<main id="main">

    <div class="col-md-8 col-md-offset-2">
        {{-- BEGIN 検索条件 --}}
        <div class="panel panel-default">
            <div class="panel-heading">検索条件</div>
            <div class="panel-body">
                <form method="POST" action="{{ route('index') }}">
                    @csrf
                    {{-- 爬虫類 --}}
                    <div class="form-group">
                        <lavel for="subject">爬虫類</lavel>
                        <div class="col-md-6">
                            <input type="text" name="subject" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-info" value="検索する">
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                            <td>{!! nl2br(e($post->message, 100)) !!}</td>
                            @if (isset($post->image_file))
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                <p><img src="{{ asset('/storage/'.$post->image_file)}}"></p>
                                </blockquote>
                            </div>
                            @endif
                            <td class="text-nowrap">
                                <p><a href="{{ route('show', $post->id) }}" class="btn btn-info btn-sm">詳細</a></p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        <div class="d-flex justify-content-center mb-5">
            {{ $posts->links() }}
        </div>
    </div>

</main><!-- End #main -->

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

@endsection
