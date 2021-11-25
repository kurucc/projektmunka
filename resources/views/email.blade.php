@include('header')

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i>Kezdőlap</a>
                    <span>Elfelejtett jelszó</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="text-center">Elfelejtett jelszó</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Hoppá!</strong></p>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    @if (\Session::has('siker'))
        <div class="alert alert-success">
            <p><strong>Juhé, siker!</strong></p>
                <p>{!! \Session::get('siker') !!}</p>
        </div>
        @endif
    <form class="text-center" method="post">
        @csrf
        <label class="mt-5">Kérjük adja meg az e-mail címét, hogy elküldhessük az új jelszót!</label><br>
        <input type="text" class="form-control-sm" name="email" placeholder="E-mail"><br>
        <input type="submit" class="btn btn-dark admin mt-2 mb-2" value="Küldés">
    </form>
</div>
@include('footer')
