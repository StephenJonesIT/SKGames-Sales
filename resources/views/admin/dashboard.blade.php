@extends('admin.layouts.app')

@section('content')
    
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashbroad')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-12">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$orderCount}}</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$productCount}}</h3>

              <p>Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('admin.products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$userCount}}</h3>

              <p>User Account</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('admin.users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                  </li>
                </ul>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart"
                     style="position: relative; height: 300px;">
                     <canvas id="revenue-chart-canvas" width="400" height="400" style="width: 100%; height: 400px;"></canvas>
                 </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="400" style="height: 400px;"></canvas>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          var revenueCtx = document.getElementById('revenue-chart-canvas').getContext('2d');
          var salesCtx = document.getElementById('sales-chart-canvas').getContext('2d');
          var salesData = @json($salesData);
          var labels = [];
          var data = [];
  
          salesData.forEach(function (item) {
              labels.push('Tháng ' + item.month);
              data.push(item.total_sales);
          });
  
          console.log(salesData);
  
          // Biểu đồ dạng Area cho doanh thu
          var revenueChart = new Chart(revenueCtx, {
              type: 'line', // Đổi sang 'line' cho biểu đồ dạng Area
              data: {
                  labels: labels,
                  datasets: [{
                      label: 'Tổng số tiền',
                      data: data,
                      backgroundColor: 'rgba(75, 192, 192, 0.2)',
                      borderColor: 'rgba(75, 192, 192, 1)',
                      fill: true, // Thêm fill để tạo biểu đồ dạng Area
                      borderWidth: 1
                  }]
              },
              options: {
                  responsive: true,
                  maintainAspectRatio: false,
                  scales: {
                      y: {
                          beginAtZero: true
                      }
                  }
              }
          });
  
          // Biểu đồ dạng Donut cho doanh thu
          var salesChart = new Chart(salesCtx, {
              type: 'doughnut',
              data: {
                  labels: labels,
                  datasets: [{
                      label: 'Tổng số tiền',
                      data: data,
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
                  maintainAspectRatio: false
              }
          });
      });
  </script>
  
  


@endsection