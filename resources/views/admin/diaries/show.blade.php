@extends('admin.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8 col-12">
                <h4 class="m-0">
                    <i class="fas fa-solid fa-book-open"></i>
                    {{ $diary['title']}}
                </h4>
            </div>
            <div class="col-md-4 col-12 text-right">
                <a href="{{ back()->getTargetUrl() }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-solid fa-chevron-left"></i>
                    Back
                </a>
                @if ($diary['diary']->status == 1)
                    <a href="{{ route('diaries.print', $diary['diary']->id) }}" class="btn btn-sm btn-warning" target="_blank">
                        <i class="fas fa-solid fa-print"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="header-box py-3 border-bottom mb-3">
            <h3 class="text-uppercase bg-primary p-2 text-light">Practicum Duty Diary</h3>
            <div class="row pl-2">
                <div class="col-3">Name of Trainee: </div>
                <div class="col-9 font-weight-bold">{{ $diary['name'] }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Company Name: </div>
                <div class="col-9 font-weight-bold">Andre Joseph Buenafe (Company Kuntahay Hehe)</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Diary Date: </div>
                <div class="col-9 font-weight-bold">{{ $diary['diary']->created_at->format('F d, Y') }}</div>
            </div>
        </div>
        <h5 class="text-uppercase">Plan Today</h5>
        {!! $diary['diary']->plan_today !!}
        <hr>
        <h5 class="text-uppercase">End-of-Day Report</h5>
        {!! $diary['diary']->end_today !!}
        <hr>
        <h5 class="text-uppercase">Plan Tomorrow</h5>
        {!! $diary['diary']->plan_tomorrow !!}
        <hr>
        <h5 class="text-uppercase">Roadblocks</h5>
        {!! $diary['diary']->roadblocks !!}
        <hr>

        <h5 class="text-uppercase">Summary</h5>
        {!! $diary['diary']->summary !!}
        <hr>
        
        <p class="mt-0">Checked by:</p>       
        <img src="{{ asset('storage/'.$diary['signature']) }}" alt="Supervisor's Signature" width="15%" class="position-relative top-1 mt-5">
        <h5 class="text-uppercase mb-0">{{$diary['supervisor'] }}</h5>
        <p class="m-0">HTE Supervising Officer</p>
        <p class="m-0">Date: {{ now()->format('F d, Y') }}</p>
    </div>
</div>

@endsection