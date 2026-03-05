{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

{{-- ================= CHART & TOTAL ================= --}}
<div class="row">

    {{-- CHART --}}
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    Statistik Data
                </h6>
            </div>
            <div class="card-body text-center" style="height:280px">
                <canvas id="dashboardChart"></canvas>
            </div>
        </div>
    </div>

    {{-- TOTAL CARD (pengganti booking terbaru) --}}
    <div class="col-lg-6">

        <div class="row">

            {{-- TOTAL MOBIL --}}
            <div class="col-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body px-4">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Mobil
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalMobil }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-car fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TOTAL BLOG --}}
            <div class="col-12 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body px-4">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Blog
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalBlog }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
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
            labels: ['Mobil', 'Blog'],
            datasets: [{
                data: [
                    {{ $totalMobil }},
                    {{ $totalBlog }}
                ],
                backgroundColor: [
                    '#4e73df',
                    '#36b9cc'
                ],
                hoverBackgroundColor: [
                    '#2e59d9',
                    '#2c9faf'
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
            }
        }
    });
});
</script>
@endpush