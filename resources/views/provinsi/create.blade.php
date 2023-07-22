@extends('layouts.main')
@section('container')
        <section class="section">

            <div class="section-body container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data provinsi</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('provinsi.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nama_provinsi">Nama Provinsi</label>
                                <input name="nama_provinsi" type="text" class="form-control @error('nama_provinsi') is-invalid @enderror" id="nama_provinsi" value="{{ old('nama_provinsi') }}">
                                @error('nama_provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('provinsi.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
@endsection
