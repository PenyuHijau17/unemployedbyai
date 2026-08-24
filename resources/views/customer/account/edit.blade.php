@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')

<style>

    .edit-profile-page {
        padding: 40px 0 70px;
    }

    .edit-profile-card {
        max-width: 700px;
        margin: 0 auto;
        background: rgba(255, 255, 255, .82);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, .85);
        border-radius: 25px;
        padding: 35px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, .07);
    }

    .edit-profile-title {
        color: #003A70;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .edit-profile-subtitle {
        color: #718096;
        margin-bottom: 30px;
    }

    /*
    |--------------------------------------------------------------------------
    | PROFILE UPLOAD
    |--------------------------------------------------------------------------
    */

    .profile-upload-wrapper {
        display: flex;
        align-items: center;
        gap: 25px;
        padding: 25px;
        background: #F7FAFC;
        border: 1px solid #E5ECF3;
        border-radius: 20px;
        margin-bottom: 25px;
    }

    .profile-preview {
        width: 120px;
        height: 120px;
        flex-shrink: 0;
        border-radius: 50%;
        overflow: hidden;
        background: linear-gradient(
            135deg,
            #005BAA,
            #0078D7
        );
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        box-shadow: 0 10px 30px rgba(0, 91, 170, .20);
    }

    .profile-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .profile-placeholder {
        font-size: 50px;
    }

    .upload-info h6 {
        color: #003A70;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .upload-info p {
        color: #718096;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .upload-button {
        cursor: pointer;
        margin: 0;
    }

    /*
    |--------------------------------------------------------------------------
    | FORM
    |--------------------------------------------------------------------------
    */

    .form-label {
        color: #22324A;
        font-weight: 700;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #D9E2EC;
    }

    .form-control:focus {
        border-color: #005BAA;
        box-shadow: 0 0 0 .2rem rgba(0, 91, 170, .10);
    }

    /*
    |--------------------------------------------------------------------------
    | BUTTON
    |--------------------------------------------------------------------------
    */

    .btn-save {
        background: #005BAA;
        color: white;
        border: none;
    }

    .btn-save:hover {
        background: #003A70;
        color: white;
    }

    /*
    |--------------------------------------------------------------------------
    | RESPONSIVE
    |--------------------------------------------------------------------------
    */

    @media (max-width: 576px) {

        .edit-profile-card {
            padding: 25px 20px;
        }

        .profile-upload-wrapper {
            flex-direction: column;
            text-align: center;
        }

        .profile-preview {
            width: 110px;
            height: 110px;
        }

    }

</style>


<div class="container edit-profile-page">

    <div class="edit-profile-card">

        {{-- HEADER --}}

        <div class="text-center">

            <h3 class="edit-profile-title">
                <i class="bi bi-person-gear"></i>
                Edit Profil
            </h3>

            <p class="edit-profile-subtitle">
                Perbarui informasi dan foto profil kamu.
            </p>

        </div>


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="alert alert-success rounded-3">

                <i class="bi bi-check-circle-fill"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- ERROR MESSAGE --}}

        @if($errors->any())

            <div class="alert alert-danger rounded-3">

                <strong>
                    Data belum dapat disimpan.
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORM --}}

        <form
            action="{{ route('customer.account.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- FOTO PROFIL --}}

            <div class="mb-4">

                <label class="form-label">
                    Foto Profil
                </label>

                <div class="profile-upload-wrapper">

                    <div class="profile-preview">

                        @if($user->profile_photo)

                            <img
                                id="profilePreview"
                                src="{{ asset('storage/' . $user->profile_photo) }}"
                                alt="Foto Profil"
                            >

                        @else

                            <div
                                id="profilePlaceholder"
                                class="profile-placeholder"
                            >
                                <i class="bi bi-person-fill"></i>
                            </div>

                            <img
                                id="profilePreview"
                                src=""
                                alt="Preview"
                                style="display:none;"
                            >

                        @endif

                    </div>


                    <div class="upload-info">

                        <h6>
                            {{ $user->name }}
                        </h6>

                        <p>
                            Pilih foto terbaik untuk profil kamu.
                        </p>

                        <label
                            for="profile_photo"
                            class="btn btn-outline-primary rounded-pill px-4 upload-button"
                        >
                            <i class="bi bi-camera-fill"></i>
                            Pilih Foto
                        </label>

                        <input
                            type="file"
                            name="profile_photo"
                            id="profile_photo"
                            class="d-none"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <div class="text-muted small mt-2">
                            JPG, JPEG, PNG, WEBP · Maks. 2 MB
                        </div>

                    </div>

                </div>

            </div>


            {{-- NAMA --}}

            <div class="mb-3">

                <label
                    for="name"
                    class="form-label"
                >
                    Nama
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    required
                >

            </div>


            {{-- EMAIL --}}

            <div class="mb-4">

                <label
                    for="email"
                    class="form-label"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                    required
                >

            </div>


            {{-- BUTTON --}}

            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-save rounded-pill px-4"
                >

                    <i class="bi bi-check-lg"></i>

                    Simpan Perubahan

                </button>


                <a
                    href="{{ route('customer.account') }}"
                    class="btn btn-light rounded-pill px-4"
                >

                    <i class="bi bi-arrow-left"></i>

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const input =
        document.getElementById('profile_photo');

    const preview =
        document.getElementById('profilePreview');

    const placeholder =
        document.getElementById('profilePlaceholder');


    if (!input) {
        return;
    }


    input.addEventListener('change', function (event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDASI CLIENT SIDE
        |--------------------------------------------------------------------------
        */

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {

            alert(
                'Format foto harus JPG, JPEG, PNG, atau WEBP.'
            );

            input.value = '';

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | MAX 2 MB
        |--------------------------------------------------------------------------
        */

        if (file.size > 2 * 1024 * 1024) {

            alert(
                'Ukuran foto maksimal 2 MB.'
            );

            input.value = '';

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | PREVIEW
        |--------------------------------------------------------------------------
        */

        const reader = new FileReader();

        reader.onload = function (e) {

            if (preview) {

                preview.src = e.target.result;

                preview.style.display = 'block';

            }

            if (placeholder) {

                placeholder.style.display = 'none';

            }

        };

        reader.readAsDataURL(file);

    });

});

</script>

@endsection