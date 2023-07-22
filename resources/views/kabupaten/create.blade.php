@extends('layouts.main')
@section('container')
        <section class="section">

            <div class="section-body container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Masukkan Data Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('kabupaten.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="kd_region">Provinsi</label>
                                <select name="provinsi_id" id="provinsi_id" class="form-control @error('provinsi_id') is-invalid @enderror">
                                    <option hidden selected disabled value>Pilih Provinsi</option>
                                    @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}" @selected(old('provinsi_id'))>{{ $provinsi->nama_provinsi }}</option>
                                    @endforeach
                                </select>
                                @error('provinsi_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_kabupaten">Nama Kabupaten</label>
                                <input name="nama_kabupaten" type="text" class="form-control @error('nama_kabupaten') is-invalid @enderror" id="nama_kabupaten" value="{{ old('nama_kabupaten') }}">
                                @error('nama_kabupaten')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah_penduduk">Jumlah Penduduk</label>
                                <input name="jumlah_penduduk" type="text" class="form-control @error('jumlah_penduduk') is-invalid @enderror" id="jumlah_penduduk" value="{{ old('jumlah_penduduk') }}">
                                @error('jumlah_penduduk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('kabupaten.index') }}" class="btn btn-danger mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
@endsection
