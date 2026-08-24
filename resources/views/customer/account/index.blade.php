@extends('layouts.app')

@section('title', 'Akun Saya')

@section('content')

<style>

.account-page{
    padding:30px 0 60px;
}


/* =========================================================
   HEADER
========================================================= */

.account-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;

    background:rgba(255,255,255,.75);
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.8);
    border-radius:24px;

    padding:28px;

    box-shadow:
        0 15px 40px rgba(0,0,0,.06);
}


.account-profile{
    display:flex;
    align-items:center;
    gap:18px;
}


.profile-avatar{
    width:72px;
    height:72px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:50%;

    background:
        linear-gradient(
            135deg,
            #005BAA,
            #0078D7
        );

    color:white;

    font-size:30px;

    box-shadow:
        0 10px 25px rgba(0,91,170,.25);
}


.profile-info h2{
    margin:0;

    color:#003A70;

    font-weight:800;
}


.profile-info p{
    margin:5px 0 10px;

    color:#718096;
}


.profile-info p i{
    color:#005BAA;
}


/* =========================================================
   ACCOUNT CARD
========================================================= */

.account-card{
    background:rgba(255,255,255,.78);

    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.85);

    border-radius:22px;

    padding:25px;

    box-shadow:
        0 12px 35px rgba(0,0,0,.06);

    transition:.3s ease;
}


.account-card:hover{
    transform:translateY(-3px);

    box-shadow:
        0 18px 40px rgba(0,0,0,.09);
}


.account-card h5{
    color:#003A70;
    font-weight:800;
}


.account-card h5 i{
    color:#D4AF37;
}


.account-card hr{
    border-color:#E5ECF3;
}


.account-card p{
    color:#718096;
}


.account-card p strong{
    color:#22324A;
}


/* =========================================================
   STATUS CARD
========================================================= */

.status-card{
    position:relative;

    height:150px;

    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;

    text-align:center;

    background:
        rgba(255,255,255,.72);

    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);

    border:
        1px solid rgba(255,255,255,.85);

    border-radius:20px;

    box-shadow:
        0 10px 30px rgba(0,0,0,.05);

    transition:
        transform .3s ease,
        box-shadow .3s ease;
}


.status-card:hover{
    transform:translateY(-5px);

    box-shadow:
        0 18px 35px rgba(0,0,0,.09);
}


.status-card i{
    font-size:28px;

    color:#005BAA;

    margin-bottom:8px;
}


.status-card h3{
    margin:0;

    color:#003A70;

    font-size:30px;

    font-weight:800;
}


.status-card p{
    margin:3px 0 0;

    color:#718096;

    font-size:14px;

    font-weight:600;
}


/* =========================================================
   STATUS COLORS
========================================================= */

.status-pending i{
    color:#F59E0B;
}

.status-processing i{
    color:#005BAA;
}

.status-shipped i{
    color:#7C3AED;
}

.status-completed i{
    color:#2E7D32;
}


/* =========================================================
   ACTIVITY
========================================================= */

.list-group{
    border-radius:15px;
    overflow:hidden;
}


.list-group-item{
    border:none;

    border-bottom:
        1px solid #E5ECF3;

    padding:15px;

    color:#22324A;

    font-weight:600;

    transition:.25s ease;
}


.list-group-item:last-child{
    border-bottom:none;
}


.list-group-item:hover{
    color:#005BAA;

    background:#F5F9FD;

    padding-left:20px;
}


.list-group-item i{
    width:25px;

    color:#005BAA;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:768px){

    .account-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .account-profile{
        width:100%;
    }

}


@media(max-width:575px){

    .profile-avatar{
        width:60px;
        height:60px;

        font-size:25px;
    }

    .profile-info h2{
        font-size:22px;
    }

    .status-card{
        height:135px;
    }

}

</style>


<div class="account-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="account-header">

        <div class="account-profile">

            <div class="profile-avatar">

                <i class="bi bi-person-fill"></i>

            </div>


            <div class="profile-info">

                <h2>
                    {{ $user->name }}
                </h2>


                <p>

                    <i class="bi bi-envelope-fill"></i>

                    {{ $user->email }}

                </p>


                <span class="badge bg-success px-3 py-2">

                    Customer

                </span>

            </div>

        </div>


        <a
            href="{{ route('customer.account.edit') }}"
            class="btn btn-warning rounded-pill px-4">

            <i class="bi bi-pencil-square"></i>

            Edit Profil

        </a>

    </div>



    {{-- =====================================================
         CONTENT
    ====================================================== --}}

    <div class="row mt-4">


        {{-- =================================================
             INFORMASI AKUN
        ================================================== --}}

        <div class="col-lg-4 mb-4">

            <div class="account-card">

                <h5>

                    <i class="bi bi-person-circle"></i>

                    Informasi Akun

                </h5>


                <hr>


                <p>

                    <strong>Nama</strong><br>

                    {{ $user->name }}

                </p>


                <p>

                    <strong>Email</strong><br>

                    {{ $user->email }}

                </p>


                <p>

                    <strong>Role</strong><br>

                    @if($user->role == 'admin')

                        Admin

                    @else

                        Customer

                    @endif

                </p>


                <p>

                    <strong>Total Pesanan</strong><br>

                    {{ $totalOrders }} Pesanan

                </p>

            </div>

        </div>



        {{-- =================================================
             STATUS PESANAN
        ================================================== --}}

        <div class="col-lg-8">

            <div class="row">


                {{-- PENDING --}}

                <div class="col-md-3 col-6 mb-3">

                    <div class="status-card status-pending">

                        <i class="bi bi-hourglass-split"></i>

                        <h3>
                            {{ $pending }}
                        </h3>

                        <p>
                            Pending
                        </p>

                    </div>

                </div>


                {{-- DIPROSES --}}

                <div class="col-md-3 col-6 mb-3">

                    <div class="status-card status-processing">

                        <i class="bi bi-box-seam"></i>

                        <h3>
                            {{ $processing }}
                        </h3>

                        <p>
                            Diproses
                        </p>

                    </div>

                </div>


                {{-- DIKIRIM --}}

                <div class="col-md-3 col-6 mb-3">

                    <div class="status-card status-shipped">

                        <i class="bi bi-truck"></i>

                        <h3>
                            {{ $shipped }}
                        </h3>

                        <p>
                            Dikirim
                        </p>

                    </div>

                </div>


                {{-- SELESAI --}}

                <div class="col-md-3 col-6 mb-3">

                    <div class="status-card status-completed">

                        <i class="bi bi-check-circle-fill"></i>

                        <h3>
                            {{ $completed }}
                        </h3>

                        <p>
                            Selesai
                        </p>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 AKTIVITAS AKUN
            ================================================== --}}

            <div class="account-card mt-3">

                <h5>

                    <i class="bi bi-box-seam"></i>

                    Aktivitas Akun

                </h5>


                <hr>


                <div class="list-group">


                    {{-- PESANAN --}}

                    <a
                        href="{{ route('customer.orders.index') }}"
                        class="list-group-item list-group-item-action">

                        <i class="bi bi-box"></i>

                        Pesanan Saya

                    </a>


                    {{-- ALAMAT --}}

                    <a
                        href="{{ route('customer.address.index') }}"
                        class="list-group-item list-group-item-action">

                        <i class="bi bi-geo-alt"></i>

                        Alamat

                    </a>


                    {{-- EDIT --}}

                    <a
                        href="{{ route('customer.account.edit') }}"
                        class="list-group-item list-group-item-action">

                        <i class="bi bi-pencil"></i>

                        Edit Profil

                    </a>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection