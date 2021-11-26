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
    <h3 class="text-center admin-control">Termék létrehozása</h3>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <input class="form-control form-control-sm" type="hidden" name="id">
        <label class="required">Vonalkód</label><br>
        <input class="form-control form-control-sm" type="text" name="barcode" id="" placeholder="Vonalkód" required><br>
        <label class="required">Nettó ár</label><br>
        <input class="form-control form-control-sm" type="number" name="net_price" id="" placeholder="Nettó ár" required><br>
        <label class="required">Bruttó ár</label><br>
        <input class="form-control form-control-sm" type="number" name="gross_price" id="" placeholder="Bruttó ár" required><br>
        <label class="required">ÁFA</label><br>
        <input class="form-control form-control-sm" type="number" name="VAT" id="" placeholder="ÁFA" required><br>
        <label class="required">Készlet</label><br>
        <input class="form-control form-control-sm" type="number" name="actual_stock" id="" placeholder="Készlet" required><br>
        <label class="required">Típus</label><br>
        <select class="selectpicker" name="type">
            <option value="parketta" selected>Parketta</option>
            <option value="csempe">Csempe</option>
        </select><br><br>
        <label class="required">Szélesség</label><br>
        <input class="form-control form-control-sm" type="number" name="width" id="" placeholder="Szélesség" required><br>
        <label class="required">Vastagság</label><br>
        <input class="form-control form-control-sm" type="number" name="thickness" id="" placeholder="Vastagság" required><br>
        <label class="required">Egység</label><br>
        <input class="form-control form-control-sm" type="text" name="unit" value="db" id="" placeholder="Vastagság" required><br>
        <label class="required">Leírás</label><br>
        <input class="form-control form-control-sm" type="text" name="description" id="" placeholder="Leírás" required><br>
        <label>Leárazás értéke</label><br>
        <input class="form-control form-control-sm" type="number" name="sale" id="" placeholder="Leárazás értéke"><br>
        <label>Termék képe</label><br>
        <input class="form-control form-control-sm" type="file" name="picture_path" id="" placeholder="Termék képe"><br>
        <label class="required">Szín</label><br>
        <input class="form-control form-control-sm" type="text" name="color" id="" placeholder="Szín" required><br>
        <label class="required">Név</label><br>
        <input class="form-control form-control-sm" type="text" name="name" id="" placeholder="Név" required><br>
        <label class="required">Hosszúság</label><br>
        <input class="form-control form-control-sm" type="number" name="height" id="" placeholder="Hosszúság" required><br>
        <input class="btn btn-dark my-2" type="submit" value="Létrehozás">
    </form>
</div>
@include('footer')
