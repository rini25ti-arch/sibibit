@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
    <h3>Dashboard SiBibit</h3>
    <p class="text-subtitle text-muted">Ringkasan Pengelolaan Pembibitan dan Penjualan Bibit Kelapa Sawit</p>
</div>

<section class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon purple mb-2">
                            <i class="bi bi-flower1"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Jenis Bibit</h6>
                        <h6 class="font-extrabold mb-0">{{ $totalVarietas }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon blue mb-2">
                            <i class="bi bi-layers-fill"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Batch Aktif</h6>
                        <h6 class="font-extrabold mb-0">0</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon green mb-2">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Stok Siap Jual</h6>
                        <h6 class="font-extrabold mb-0">0</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon red mb-2">
                            <i class="bi bi-cart-check-fill"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Pesanan Masuk</h6>
                        <h6 class="font-extrabold mb-0">0</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Daftar Jenis Bibit Terbaru</h5>
        <a href="{{ route('varietas.index') }}" class="btn btn-sm btn-outline-primary">Kelola Semua</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jenis Bibit</th>
                        <th>Keunggulan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($varietasTerbaru as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $item->nama_varietas }}</strong></td>
                            <td>{{ $item->keunggulan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Belum ada data jenis bibit.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection