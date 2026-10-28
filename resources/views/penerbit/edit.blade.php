@extends('layouts.app')

@section('title', 'Edit Penerbit')

@section('content')
<div class="container form-container">
    <h1>Edit Penerbit</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('penerbit.update', $penerbit->id) }}">
        @csrf
        @method('PUT')

        <label>Nama Penerbit</label>
        <input type="text" name="nama_penerbit" value="{{ old('nama_penerbit', $penerbit->nama_penerbit) }}" required>

        <label>Kontak</label>
        <input type="text" name="kontak" value="{{ old('kontak', $penerbit->kontak) }}" required>

        <label>Sales</label>
        <input type="text" name="sales" value="{{ old('sales', $penerbit->sales) }}" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="3" required>{{ old('alamat', $penerbit->alamat) }}</textarea>

        <label>Wilayah</label>
        <input type="text" name="wilayah" value="{{ old('wilayah', $penerbit->wilayah) }}" required>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
            <a class="btn btn-secondary" href="{{ route('penerbit.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection