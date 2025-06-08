@extends('admin.layouts._masterLayout')

@section('content')

<section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                        <div class="icon"><i class="icon-user-1"></i></div>
                        <strong>New Clients</strong>
                    </div>
                    <div class="number dashtext-1">{{ $userCount }}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                    <div class="icon"><i class="icon-contract"></i></div><strong>Categories</strong>
                    </div>
                    <div class="number dashtext-4">{{ count($categories) }}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: {{ count($categories) }}%" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                    <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Products</strong>
                    </div>
                    <div class="number dashtext-2" >{{ count($products) }}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: {{ count($products) }}%" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                    <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>New Order</strong>
                    </div>
                    <div class="number dashtext-3">{{ $newOrderCount }}</div>
                </div>
                <div class="progress progress-template">
                    <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
                </div>
            </div>
         
        </div>

        <div class="block row">
            <canvas id="ordersPieChart" width="400" height="400" style="max-width: 400px; max-height: 400px; margin: 0 auto"></canvas>
        </div>
    </div>
</section>


@endsection

@section('scripts')
<script>
    // Lấy dữ liệu từ PHP
    const labels = @json($ordersByStatus->pluck('status'));
    const data = @json($ordersByStatus->pluck('total_order'));
    const canvas = document.getElementById('ordersPieChart')
    // Khởi tạo biểu đồ Pie Chart
    const ctx = document.getElementById('ordersPieChart').getContext('2d');
    const ordersPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['PENDING', 'COMPLETED', 'CANCEL', 'SHIPPED', 'PROCESSING'], // Các trạng thái
            datasets: [{
                label: 'Số lượng đơn theo trạng thái',
                data: data, // Số lượng đơn hàng
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return `${tooltipItem.label}: ${tooltipItem.raw}`;
                        }
                    }
                }
            }
        }
    });

  
</script>
@endsection