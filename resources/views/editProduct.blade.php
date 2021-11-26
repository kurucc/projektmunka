@include('header')
@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Hoppá! Valami hiba történt!</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container my-2">
    <h3 class="text-center admin-control">Termék szerkesztése</h3>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <input class="form-control form-control-sm" type="hidden" name="id">
        <label>Vonalkód</label><br>
        <input class="form-control form-control-sm" type="text" name="barcode" id="" placeholder="Vonalkód" value="{{ $id->barcode }}" disabled><br>
        <label class="required">Nettó ár</label><br>
        <input class="form-control form-control-sm" type="number" name="net_price" id="" placeholder="Nettó ár" value="{{ $id->net_price }}" required><br>
        <label class="required">Bruttó ár</label><br>
        <input class="form-control form-control-sm" type="number" name="gross_price" id="" placeholder="Bruttó ár" value="{{ $id->gross_price }}" required><br>
        <label class="required">ÁFA</label><br>
        <input class="form-control form-control-sm" type="number" name="VAT" id="" placeholder="ÁFA" value="{{ $id->VAT }}" required><br>
        <label class="required">Készlet</label><br>
        <input class="form-control form-control-sm" type="number" name="actual_stock" id="" placeholder="Készlet" value="{{ $id->actual_stock }}" required><br>
        <label class="required">Típus</label><br>
        <select class="selectpicker" name="type" >
            <option value="parketta" @if($id->type == 'parketta') selected="{{ $id->type }}" @endif>Parketta</option>
            <option value="csempe" @if($id->type == 'csempe') selected="{{ $id->type }}" @endif>Csempe</option>
        </select><br><br>
        <label class="required">Szélesség</label><br>
        <input class="form-control form-control-sm" type="number" name="width" id="" placeholder="Szélesség" value="{{ $id->width }}" required><br>
        <label class="required">Vastagság</label><br>
        <input class="form-control form-control-sm" type="number" name="thickness" id="" placeholder="Vastagság" value="{{ $id->thickness }}" required><br>
        <label class="required">Egység</label><br>
        <input class="form-control form-control-sm" type="text" name="unit" value="db" id="" placeholder="Vastagság" value="{{ $id->unit }}" required><br>
        <label class="required">Leírás</label><br>
        <input class="form-control form-control-sm" type="text" name="description" id="" placeholder="Leírás" value="{{ $id->description }}" required><br>
        <label>Leárazás értéke</label><br>
        <input class="form-control form-control-sm" type="number" name="sale" id="" value="{{ $id->sale }}" placeholder="Leárazás értéke"><br>
        <label class="required">Szín</label><br>
        <input class="form-control form-control-sm" type="text" name="color" id="" value="{{ $id->color }}" placeholder="Szín" required><br>
        <label class="required">Név</label><br>
        <input class="form-control form-control-sm" type="text" name="name" id="" placeholder="Név" value="{{ $id->name }}" required><br>
        <label class="required">Hosszúság</label><br>
        <input class="form-control form-control-sm" type="number" name="height" id="" placeholder="Hosszúság" value="{{ $id->height }}" required><br>
        <input class="btn btn-dark my-2" type="submit" value="Mentés">
    </form>
</div>
@include('footer')
