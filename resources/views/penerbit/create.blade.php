@extends('layouts.app')

@section('title', 'Tambah Penerbit')

@section('content')
<div class="container form-container">
    <h1>Tambah Penerbit</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('penerbit.store') }}">
        @csrf
        <label>Nama Penerbit</label>
        <input type="text" name="nama_penerbit" value="{{ old('nama_penerbit') }}" required>

        <label>Kontak</label>
        <input type="text" name="kontak" value="{{ old('kontak') }}" required>

        <label>Sales</label>
        <input type="text" name="sales" value="{{ old('sales') }}" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="3" required>{{ old('alamat') }}</textarea>

        <label>Wilayah</label>
        <input type="text" name="wilayah" value="{{ old('wilayah') }}" required>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn btn-secondary" href="{{ route('penerbit.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection