@include('header')
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
    <form method="post">
        @csrf
        <input type="text" name="email">
        <input type="submit" value="Küldés">
    </form>
@include('footer')