{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

{{-- ================= QUICK ACTIONS ================= --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body d-flex flex-wrap gap-2 justify-content-center justify-content-md-start">
                <a href="{{ route('admin.blog.index') }}" class="btn btn-primary mr-2 mb-2">
                    <i class="fas fa-plus mr-1"></i> Tulis Blog Baru
                </a>
                <a href="{{ route('admin.mobil.index') }}" class="btn btn-success mr-2 mb-2">
                    <i class="fas fa-car mr-1"></i> Tambah Mobil
                </a>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-info mr-2 mb-2">
                    <i class="fas fa-edit mr-1"></i> Update CMS
                </a>
                <a href="/" target="_blank" class="btn btn-secondary mb-2">
                    <i class="fas fa-external-link-alt mr-1"></i> Lihat Website
                </a>
            </div>
        </div>
    </div>
</div>

{{-- ================= TOTAL STATS ================= --}}
<div class="row">
    <!-- Mobil Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Mobil</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMobil }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Blog</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBlog }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partner Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Partner</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPartner }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rute Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Rute</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRute }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-route fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- CHART --}}
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Komposisi Data</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2" style="height: 300px">
                    <canvas id="dashboardChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- RECENT BLOGS --}}
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog Terbaru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentBlogs as $blog)
                            <tr>
                                <td><a href="{{ route('blog.show', $blog->slug) }}" target="_blank">{{ Str::limit($blog->title, 30) }}</a></td>
                                <td>
                                    <span class="badge badge-{{ $blog->status == 'publish' ? 'success' : 'warning' }}">
                                        {{ $blog->status }}
                                    </span>
                                </td>
                                <td>{{ $blog->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('dashboardChart');

    if (!ctx) return;

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Mobil', 'Blog', 'Partner', 'Rute'],
            datasets: [{
                data: [
                    {{ $totalMobil }},
                    {{ $totalBlog }},
                    {{ $totalPartner }},
                    {{ $totalRute }}
                ],
                backgroundColor: [
                    '#4e73df',
                    '#1cc88a',
                    '#36b9cc',
                    '#f6c23e'
                ],
                hoverBackgroundColor: [
                    '#2e59d9',
                    '#17a673',
                    '#2c9faf',
                    '#dda20a'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            cutout: '70%'
        }
    });
});
</script>
@endpush