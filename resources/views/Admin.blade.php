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
    <div class="p-5">
        <table class="table">
    </div>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Nama</th>
            <th scope="col">Subject</th>
            <th scope="col">Lampiran</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @forelse($laporan as $key => $k)
        <tr class="">
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{$k->email}}</td>
            <td>{{$k->name_report}}</td>
            <td>{{$k->subject}}</td>
            <td><img src="{{ asset('storage/img/' . $k->photo) }}" alt="" width="150"></td>
            <td class="text-truncate" style="max-width: 200px;">{{$k->description}}</td>
            <td>{{$k->status}}</td>
            <td class=""> 
                <div class="d-flex">
                    <a href="{{ route('view.edit', $k->id) }}" class="btn btn-primary">Edit</a>
                    <form id="delete-form={{ $k->id }}" action="{{ route('delete', $k->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        
        @empty
        @endforelse
    </tbody>
    </table>

</body>

</html>
