@extends('layouts.main')
@section('container')
        <section class="section">

            <div class="section-body container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('provinsi.update', $provinsi->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="nama_provinsi">No Pesanan</label>
                                <input name="nama_provinsi" type="text" class="form-control @error('nama_provinsi') is-invalid @enderror" id="nama_provinsi" value="{{ old('nama_provinsi', $provinsi->nama_provinsi) }}" placeholder="No Pesanan">
                                @error('nama_provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('provinsi.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Edit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
@endsection
