<h1>Kedves {{ $name }}! </h1>
<p>Az alábbi rendelést adta le nálunk</p>
<table style="border-collapse: collapse; border: 2px black solid; text-align:center;">
    <th style="border: 1px black dotted;">Termékek</th>
    <th style="border: 1px black dotted;">Darabszám</th>
    <th style="border: 1px black dotted;">Nettó</th>
    <th style="border: 1px black dotted;">Bruttó</th>
    @foreach ($items as $item)
    <tr style="border: 1px black dotted;">
        <td style="border: 1px black dotted;">{{ $item->associatedModel->name }} - {{ $item->associatedModel->color }}</td>
        <td style="border: 1px black dotted;">{{ $item->quantity }}db</td>
        <td style="border: 1px black dotted;">{{($item->price * $item->quantity) / 1.27}}Ft</td>
        <td style="border: 1px black dotted;">{{$item->price * $item->quantity }}Ft</td>
    </tr>
    @endforeach
    <tr style="border-top: 2px black solid;">
        <th colspan="3" style="border: 1px black dotted;">Összesen (nettó)</th>
        <td style="border: 1px black dotted;">{{ $net }}Ft</td>     
    </tr>
    <tr style="border: 1px black dotted;">
        <th colspan="3" style="border: 1px black dotted;">Összesen (bruttó)</th>
        <td style="border: 1px black dotted;">{{ $gross }}Ft</td>   
    </tr>
</table>
<p>Üdvözlettel,</p>
<h4>BurkoLogic csapat</h4>