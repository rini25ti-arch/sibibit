@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Edit Varietas Bibit</h3>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('varietas.update', $varietas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_varietas" class="form-label">Nama Varietas <span class="text-danger">*</span></label>
                <input type="text" name="nama_varietas" id="nama_varietas" class="form-control @error('nama_varietas') is-invalid @enderror" value="{{ old('nama_varietas', $varietas->nama_varietas) }}" required>
                @error('nama_varietas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $varietas->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="keunggulan" class="form-label">Keunggulan</label>
                <textarea name="keunggulan" id="keunggulan" rows="3" class="form-control">{{ old('keunggulan', $varietas->keunggulan) }}</textarea>
            </div>

            <a href="{{ route('varietas.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</div>
@endsection