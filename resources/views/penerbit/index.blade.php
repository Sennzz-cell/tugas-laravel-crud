@extends('layouts.app')

@section('title', 'Manajemen Penerbit & Supplier')

@section('content')
<div class="container">
    <h1>Manajemen Penerbit &amp; Supplier</h1>
    <h2>Data Penerbit</h2>

    @if (session('pesan') === 'tambah')
        <div class="alert">Data penerbit berhasil ditambahkan.</div>
    @elseif (session('pesan') === 'edit')
        <div class="alert">Data penerbit berhasil diperbarui.</div>
    @elseif (session('pesan') === 'hapus')
        <div class="alert">Data penerbit berhasil dihapus.</div>
    @endif

    <a class="btn btn-primary" href="{{ route('penerbit.create') }}">+ Tambah Penerbit</a>

    <div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penerbit</th>
                <th>Kontak</th>
                <th>Sales</th>
                <th>Alamat</th>
                <th>Wilayah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($penerbits as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row->nama_penerbit }}</td>
                <td>{{ $row->kontak }}</td>
                <td>{{ $row->sales }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->wilayah }}</td>
                <td class="actions">
                    <a class="btn btn-edit" href="{{ route('penerbit.edit', $row->id) }}">Edit</a>
                    <form action="{{ route('penerbit.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="empty">Belum ada data penerbit. Klik “Tambah Penerbit” untuk mulai.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection