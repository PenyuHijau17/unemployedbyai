@extends('layouts.app')


@section('title','Pembayaran')


@section('content')


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-success text-white">


<h3 class="mb-0">

💳 Pembayaran

</h3>


</div>



<div class="card-body">


@if(count($cart) == 0)


<div class="text-center">


<h4 class="text-muted">

Keranjang masih kosong

</h4>



<a href="{{ route('books.index') }}"
class="btn btn-primary">

Pilih Buku

</a>


</div>



@else



<h4>

Detail Pesanan

</h4>



<table class="table table-bordered">


<thead class="table-dark">

<tr>

<th>
Buku
</th>

<th>
Harga
</th>

<th>
Jumlah
</th>

<th>
Subtotal
</th>

</tr>

</thead>



<tbody>


@foreach($cart as $item)


<tr>


<td>

{{ $item['judul'] }}

</td>


<td>

Rp {{ number_format($item['harga'],0,',','.') }}

</td>


<td>

{{ $item['jumlah'] }}

</td>


<td>

Rp {{ number_format(
$item['harga'] * $item['jumlah'],
0,
',',
'.'
) }}

</td>


</tr>


@endforeach


</tbody>


</table>



<h4 class="text-end">

Total:

<span class="text-success">

Rp {{ number_format($total,0,',','.') }}

</span>


</h4>



<hr>



<form action="{{ route('payment.process') }}"
method="POST">


@csrf



<div class="mb-3">


<label class="form-label">

Metode Pembayaran

</label>



<select name="metode"
class="form-select"
required>


<option value="">

-- Pilih Metode --

</option>


<option value="Transfer Bank">

Transfer Bank

</option>


<option value="COD">

COD

</option>


<option value="E-Wallet">

E-Wallet

</option>


</select>


</div>




<button class="btn btn-success btn-lg">

Bayar Sekarang

</button>



<a href="{{ route('cart.index') }}"
class="btn btn-secondary btn-lg">

Kembali

</a>



</form>



@endif



</div>


</div>


</div>


@endsection