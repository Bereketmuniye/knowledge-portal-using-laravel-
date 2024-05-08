@extends('layouts.app')
@section('content')
<div style="background-color: white">
    <canvas id="registrationChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var registrations = @json($registrations);

        var labels = registrations.map(function(registration) {
            return registration.registration_date;
        });

        var data = registrations.map(function(registration) {
            return registration.registration_count;
        });

        var ctx = document.getElementById('registrationChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'User Registrations',
                    data: data,
                    backgroundColor: 'rgba(217,83,79)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
