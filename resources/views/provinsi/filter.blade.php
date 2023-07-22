@extends('layouts.main')
@section('container')
        <section class="section">
            <div class="section-body container mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Tabel Provinsi {{$provinsi->nama_provinsi}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('provinsi.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama_kabupaten</th>
                                        <th>Jumlah Penduduk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kabupatens as $kabupaten)
                                        <tr class="text-center">
                                            <td >{{ $loop->iteration }}.</td>
                                            <td>{{ $kabupaten->nama_kabupaten }}</td>
                                            <td>{{ $kabupaten->jumlah_penduduk }}</td>
                                            <td class="text-center"><a href="{{ route('kabupaten.edit', $kabupaten) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('kabupaten.destroy', $kabupaten) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return confirm('Anda yakin ingin menghapus kabupaten ini ?')"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
