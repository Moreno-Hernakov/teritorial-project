@extends('layouts.main')
@section('container')
        <section class="section">
            <div class="section-body container mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Tabel Provinsi</h4>
                        <div class="card-header-action">
                            <a href="{{ route('provinsi.create') }}" class="btn btn-primary">Tambah provinsi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama Provinsi</th>
                                        <th>Jumlah Penduduk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($provinsis as $provinsi)
                                        <tr class="text-center">
                                            <td >{{ $loop->iteration }}</td>
                                            <td>
                                                <a style="font-weight: bold" href="{{ route('provinsi.show', $provinsi) }}">{{ $provinsi->nama_provinsi }}</a>
                                            </td>
                                            <td>{{ $provinsi->jumlah_penduduk }}</td>
                                            <td class="text-center"><a href="{{ route('provinsi.edit', $provinsi) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('provinsi.destroy', $provinsi) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return confirm('Anda yakin ingin menghapus Provinsi ini ?')"
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
