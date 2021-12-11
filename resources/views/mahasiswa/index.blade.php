@extends('layouts.main')
@section('title', 'Data Mahasiswa')
@section('content')

@if (session()->has('berhasil'))
    <div class="alert alert-success">
        {{ session()->get('berhasil') }}
    </div>
@endif
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Data Mahasiswa</h3>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-succsess">Tambah</a>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $item )
                            <tr>

                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn -warning">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" oneclick="return confirm('Apakah anda yakin untuk menghapus halaman ini?')"="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
