<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    @include('partials.Navbar')
    <div class="d-flex justify-content-center p-5">
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://pbs.twimg.com/media/F90fMJdWEAA8NTV?format=jpg&name=4096x4096" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://pbs.twimg.com/media/F90fMJdWEAA8NTV?format=jpg&name=4096x4096" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://pbs.twimg.com/media/F90fMJdWEAA8NTV?format=jpg&name=4096x4096" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
    </div>


    <div class="p-5">
        <div>
            
        </div>
        <form action="{{ route('laporan.filter') }}" method="GET">
            <div class="form-group w-25 ">
                <label for="category">Kategori:</label>
                <select class="form-control" id="category" name="category">
                    <option value="">Semua</option>
                    <option value="Kebersihan">Kebersihan</option>
                    <option value="Keamanan">Keamanan</option>
                    <option value="Fasilitas Umum">Fasilitas Umum</option>

                </select>
                <button type="submit" class="btn btn-primary mt-3 mb-5">Filter</button>

            </div>
            <div class="row d-flex align-items-end">
                <div class="col">
                    <div class="">
                        <label for="start_date">Tanggal Awal:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="">
                        <label for="end_date">Tanggal Akhir:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Filter</button>
                </div>
            </div>
        </form>
        <form action="{{ route('laporan.filter') }}" method="GET">
            <div class="form-group">
                <label for="laporan_id">Masukkan ID Laporan:</label>
                <div class="input-group" id="idlaporan1">
                    <input class="form-control me-2" type="text" placeholder="Masukkan ID Laporan" aria-label="Search" name="laporan_id">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </div>
        </form>

        <table class="table" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Lampiran</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse($laporan as $key => $k)
                    <tr class="">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $k->email }}</td>
                        <td>{{ $k->name_report }}</td>
                        <td>{{ $k->subject }}</td>
                        <td><img src="{{ asset('storage/img/' . $k->photo) }}" alt="" width="150"></td>
                        <td class="text-truncate" style="max-width: 200px;">{{ $k->description }}</td>
                        <td>{{ $k->status }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    </table>
    <div>

    </div>
</body>

</html>
