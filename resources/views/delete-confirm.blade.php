@extends('layouts.parent')

@section('content')

<br>
<br>

<main id="main">

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
</main>

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
