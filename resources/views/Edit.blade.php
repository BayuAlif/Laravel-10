<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @include('partials.Navbar')
    <div class="p-5 container text-start">

        <div class="text-bg-dark">
            <div class="p-5">
                <h1 class="fs-5">Email User : {{ $laporan->email }}</h1>
                <h1 class="fs-5">Nama User : {{ $laporan->name_report }}</h1>
                <h1 class="fs-5">Subject Laporan : {{ $laporan->subject }}</h1>
                <h1 class="fs-5">Lampiran Kejadian : <br><img class="mt-2"
                        src="{{ asset('storage/img/' . $laporan->photo) }}" alt="" width="150"></h1>
                <h1 class="fs-5">Deskripsi Laporan : {{ $laporan->description }}</h1>

                <form action="{{ route('update', ['id' => $laporan->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" id="">
                        <option value="pending" disabled selected>Pending</option>
                        <option value="Sucsess">Sucsess</option>
                        <option value="Pending">Pending</option>
                    </select><br>
                    <button type="submit" class="btn btn-warning mt-5">Update Data</button>
                </form>
            </div>
        </div>
</body>

</html>
