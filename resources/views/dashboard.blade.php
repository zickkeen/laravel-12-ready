@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">

    <!-- Top Summary -->
    <div class="row mb-4 text-center">
        <div class="col">
            <h1 class="display-6">Server Infrastructure Monitoring</h1>
            <p class="text-muted">Manage and monitor over 200 servers in real-time.</p>
        </div>
    </div>

    <!-- Cards -->
    <div class="row g-4 text-center">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-light">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase">Total Servers</h6>
                    <h2>205</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-success text-white">
                <div class="card-body">
                    <h6 class="text-uppercase">Online</h6>
                    <h2>198</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-danger text-white">
                <div class="card-body">
                    <h6 class="text-uppercase">Offline</h6>
                    <h2>3</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-warning text-dark">
                <div class="card-body">
                    <h6 class="text-uppercase">Warning</h6>
                    <h2>4</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="row my-5">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Cari server berdasarkan nama / IP / lokasi...">
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-outline-primary">Refresh Data</button>
        </div>
    </div>

    <!-- Mini Chart Overview (Placeholder) -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Average CPU Usage</h6>
                    <canvas id="cpuChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Average Memory Usage</h6>
                    <canvas id="memoryChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Average Disk Usage</h6>
                    <canvas id="diskChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Server List (Top Problematic Servers) -->
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-4">Server Issues (Top 10)</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Server</th>
                                    <th>IP Address</th>
                                    <th>Status</th>
                                    <th>CPU</th>
                                    <th>Memory</th>
                                    <th>Disk</th>
                                    <th>Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop server data here -->
                                <tr>
                                    <td>server-01</td>
                                    <td>192.168.1.10</td>
                                    <td><span class="badge bg-danger">Offline</span></td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>2 mins ago</td>
                                </tr>
                                <tr>
                                    <td>server-102</td>
                                    <td>10.10.5.2</td>
                                    <td><span class="badge bg-warning text-dark">Warning</span></td>
                                    <td>92%</td>
                                    <td>87%</td>
                                    <td>85%</td>
                                    <td>Just now</td>
                                </tr>
                                <!-- More data -->
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-3">
                        <a href="#" class="btn btn-outline-primary btn-sm">View All Servers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Alerts -->
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-4">Recent Alerts</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">[Offline] Server-01 - 2 minutes ago</li>
                        <li class="list-group-item">[High CPU] Server-102 - 30 seconds ago</li>
                        <li class="list-group-item">[Disk Warning] Server-99 - 5 minutes ago</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<!-- Chart.js integration (example only) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dummy data for charts
    new Chart(document.getElementById('cpuChart'), {
        type: 'line',
        data: { labels: ['Jan','Feb','Mar','Apr'], datasets: [{ data: [60, 65, 70, 62], label: 'CPU (%)', borderColor: '#3e95cd', fill: false }] },
    });
    new Chart(document.getElementById('memoryChart'), {
        type: 'line',
        data: { labels: ['Jan','Feb','Mar','Apr'], datasets: [{ data: [70, 75, 80, 78], label: 'Memory (%)', borderColor: '#8e5ea2', fill: false }] },
    });
    new Chart(document.getElementById('diskChart'), {
        type: 'line',
        data: { labels: ['Jan','Feb','Mar','Apr'], datasets: [{ data: [50, 55, 60, 58], label: 'Disk (%)', borderColor: '#3cba9f', fill: false }] },
    });
</script>
@endsection
