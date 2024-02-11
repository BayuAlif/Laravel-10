<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    @include('partials.Navbar')

    <div class="d-flex justify-content-between mb-5">
        <div class="col p-5 mb-5">
            <h1 class="fs-2 mb-3">
                PENGADUAN MASYARAKAT TERPERCAYA
            </h1>
            <h1 class="fs-5 fw-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, quam quae
                officiis laudantium non molestiae
                facilis! Neque aperiam illo nam reiciendis expedita ad, laudantium ipsa, quas aut, amet laborum tenetur.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit quo dicta a voluptates placeat
                explicabo consequuntur adipisci laboriosam iste. Aliquid porro facere dignissimos hic id nostrum
                laboriosam sapiente ut.
            </h1>
            <a href="#form" class="btn btn-outline-primary">
                Lapor pengaduan disni
            </a>
        </div>
        <div class="d-flex justify-content-center col-6 p-5">
            <div class="">
                <img style="max-width: 300px;"
                    src="https://64.media.tumblr.com/6444e69112bde2df78b9b8b34ac9c14e/3d0bc73653493815-80/s400x600/a1cd647eec501743f99e35e120982d63d1c077ed.gifv"
                    alt="">
            </div>
        </div>
    </div>

    <div class="p-5">
        <div class="d-flex justify-content-center mb-5">
            <h1 class="">FORM PENGISIAN PENGADUAN</h1>
        </div>
        <form class="row g-3" id="form" action="{{ route('send.form') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" required>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputSubject2" class="form-label">Subject</label>
                <select class="form-select" aria-label="Default select example" name="subject" id="inputSubject2"
                    required>
                    <option disabled selected>Pilih Subject</option>
                    <option value="Kebersihan">Kebersihan</option>
                    <option value="Keamanan">Keamanan</option>
                    <option value="Fasilitas Umum">Fasilitas Umum</option>
                </select>
                <p class="text-danger">
                    @error('subject')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="col-md-6">
                <label for="inputName4" class="form-label">Name</label>
                <input type="text" name="name_report" class="form-control" id="inputName4" required>
                <p class="text-danger">
                    @error('name_report')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="col-md-6">
                <label for="formFile" class="form-label">Foto Kejadian</label>
                <input class="form-control" type="file" id="formFile" name="photo" required>
                <p class="text-danger">
                    @error('photo')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="col-12">
                <label for="floatingTextarea" class="form-label">Isi Laporan</label>

                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="description" required></textarea>
                <p class="text-danger">
                    @error('description')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script>
        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                html: '{!! Session::get('success') !!}<br>ID Laporan: {{ session('laporanId') }}'
            });
        @endif
    
        @if (Session::has('failed'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: '{!! Session::get('failed') !!}'
            });
        @endif
    </script>
    

</body>

</html>
