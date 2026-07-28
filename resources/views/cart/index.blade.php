@extends('layouts.app')

@section('title','Keranjang Belanja')


@section('content')


<div class="container mt-5">


<div class="card shadow border-0 rounded-4">


<div class="card-header bg-primary text-white">

<h3 class="mb-0">

🛒 Keranjang Belanja

</h3>

</div>




<div class="card-body">



@if(empty($cart) || count($cart) == 0)



<div class="text-center p-5">


<h4 class="text-muted">

Keranjang masih kosong

</h4>



<p>

Silahkan pilih buku terlebih dahulu.

</p>




<a href="{{ route('books.customer') }}"
class="btn btn-primary btn-lg">


📚 Pilih Buku


</a>



</div>




@else




<div class="table-responsive">


<table class="table table-bordered align-middle">


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


<th>
Aksi
</th>


</tr>


</thead>



<tbody>



@php

$total = 0;

@endphp




@foreach($cart as $id => $item)



@php

$subtotal = $item['harga'] * $item['jumlah'];

$total += $subtotal;

@endphp




<tr>


<td>


<strong>

{{ $item['judul'] }}

</strong>


</td>




<td>

Rp {{ number_format($item['harga'],0,',','.') }}

</td>




<td>

{{ $item['jumlah'] }}

</td>




<td>

Rp {{ number_format($subtotal,0,',','.') }}

</td>




<td>


<form action="{{ route('cart.remove',$id) }}"
method="POST">


@csrf

@method('DELETE')



<button class="btn btn-danger btn-sm">

Hapus

</button>


</form>


</td>



</tr>




@endforeach



</tbody>


</table>


</div>






<div class="d-flex justify-content-between align-items-center mt-4">





<a href="{{ route('books.customer') }}"
class="btn btn-primary">


📚 Tambah Buku Lagi


</a>







<div class="text-end">


<h4>

Total :

<span class="text-success">

Rp {{ number_format($total,0,',','.') }}

</span>


</h4>





<a href="{{ route('payment.index') }}"
class="btn btn-success btn-lg">


💳 Lanjut Payment


</a>



</div>



</div>




@endif




</div>



</div>


</div>


@endsection