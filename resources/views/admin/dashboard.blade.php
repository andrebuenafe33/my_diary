@extends('admin.admin')

@section('content')
<div class="row">
<!-- Project Card Example -->
<div class="card shadow mb-4" id="dashboard-page" data-aos="zoom-in-left" data-aos-delay="100" data-aos-duration="500" data-aos-anchor-placement="bottom-bottom">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">Welcome to my Duty Diary Dashboard</h6>
    </div>
    <div class="card-body">
        <h4 class="small font-weight-bold" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">My Skills in Laravel!<span
                class="float-right">20%</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">My Brain in Logic!<span
                class="float-right">40%</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">My Skills in Database!<span
                class="float-right">60%</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 60%"
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">My Brain Everyday!<span
                class="float-right">80%</span></h4>
        <div class="progress mb-4">
            <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">Snack Time!<span
                class="float-right">Complete!</span></h4>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>


     <!-- Content Row -->
     

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" data-aos="zoom-in-left" data-aos-delay="150" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Diaries</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$diaryCount}} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4" data-aos="zoom-in-left" data-aos-delay="150" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Documentations</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$docCount}} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4" data-aos="zoom-in-left" data-aos-delay="150" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Approval Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$diaryCount}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4" data-aos="zoom-in-left" data-aos-delay="150" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$userCount}} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Content Row -->



<script>
    $(document).ready(function() {
        // Animate progress bars on page load
        $('.progress-bar').each(function() {
            var progressValue = $(this).attr('aria-valuenow');
            $(this).animate({ width: progressValue + '%' }, 2000); // Animation duration in milliseconds
        });
    });
    </script>

@endsection