@extends('layouts.app')

@section('title','Tambah Alamat')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">


            <h3 class="fw-bold mb-4">

                <i class="bi bi-geo-alt-fill text-warning"></i>

                Tambah Alamat

            </h3>



            <form action="{{ route('customer.address.store') }}"
                  method="POST">

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Nama Penerima
                    </label>

                    <input type="text"
                           name="nama_penerima"
                           class="form-control rounded-3"
                           placeholder="Contoh: Arbians">

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Nomor HP
                    </label>

                    <input type="text"
                           name="no_hp"
                           class="form-control rounded-3"
                           placeholder="08xxxxxxxxxx">

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Alamat Lengkap
                    </label>

                    <textarea name="alamat"
                              class="form-control rounded-3"
                              rows="4"
                              placeholder="Nama jalan, nomor rumah, RT/RW"></textarea>

                </div>



                <div class="row">


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Kota
                        </label>

                        <input type="text"
                               name="kota"
                               class="form-control rounded-3">

                    </div>



                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Provinsi
                        </label>

                        <input type="text"
                               name="provinsi"
                               class="form-control rounded-3">

                    </div>



                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Kode Pos
                        </label>

                        <input type="text"
                               name="kode_pos"
                               class="form-control rounded-3">

                    </div>


                </div>



                <div class="d-flex justify-content-end gap-2">


                    <a href="{{ route('customer.address.index') }}"
                       class="btn btn-outline-secondary rounded-pill">

                        Kembali

                    </a>


                    <button class="btn btn-warning rounded-pill px-4">

                        <i class="bi bi-save"></i>

                        Simpan Alamat

                    </button>


                </div>


            </form>


        </div>

    </div>

</div>


@endsection