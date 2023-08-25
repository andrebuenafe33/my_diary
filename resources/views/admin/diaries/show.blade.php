@extends('admin.admin')

@section('content')
{{-- <div class="card">
    <div class="card-header">
        <h4 class="m-0">EOD Report by {{ $diary->author->name}} on {{ $diary->created_at->format('M d, Y')}}</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title"><strong>EOD Report for {{ $diary->created_at->format('F d, Y') }}</strong></h5>
        <p class="card-text"><strong>Author:</strong> {{ $diary->author->name }}</p>
        <p class="card-text"><strong>Supervisor:</strong> {{ $diary->supervisor->name }}</p>
        <p class="card-text"><strong>Date:</strong> {{ $diary->created_at->format('M d, Y') }}</p>
        <hr>
        <h6 class="card-subtitle mb-2 text-muted"><strong>Plan for Today</strong></h6>
        <p class="card-text">{!! $diary->plan_today !!}</p><hr>
        <h6 class="card-subtitle mb-2 text-muted"><strong>End of Day Summary</strong></h6>
        <p class="card-text">{!! $diary->end_day !!}</p><hr>
        <h6 class="card-subtitle mb-2 text-muted"><strong>Plan for Tomorrow</strong></h6>
        <p class="card-text">{!! $diary->plan_tomorrow !!}</p><hr>
        <h6 class="card-subtitle mb-2 text-muted"><strong>Roadblocks</strong></h6>
        <p class="card-text">{!! $diary->roadblocks !!}</p>
    </div>
    
    <div class="card-footer text-muted">
        Status: @if ($diary->status == 0)
            <span class="badge badge-warning">Pending</span>
        @else
            <span class="badge badge-success">Approved</span>
        @endif
    </div>
</div> --}}

{{-- <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8 col-12">
                <h4 class="m-0">
                    <i class="fas fa-solid fa-book-open"></i>
                   EOD Report by {{$diary->author->name}} on {{$diary->created_at->format('M d, Y')}}
                </h4>
            </div>
            <div class="col-md-4 col-12 text-right">
                <a href="{{ route('diaries.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-solid fa-chevron-left"></i>
                    Back
                </a>
                    @if ($diary->status == 1)
                        <a href="{{ route('diaries.print', $diary->id) }}" class="btn btn-sm btn-warning" target="_blank">
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
                <div class="col-9 font-weight-bold">{{ $diary->author->name }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Company Name: </div>
                <div class="col-9 font-weight-bold">CREATIVEDEVLABS (CDL INNOVATIVE IT SOLUTIONS)</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Diary Date: </div>
                <div class="col-9 font-weight-bold">{{ $diary->created_at->format('M d, Y H:m:s') }}</div>
            </div>
        </div>
        <h5 class="text-uppercase">Plan Today</h5>
        {!! $diary->plan_today !!}
        <hr>
        <h5 class="text-uppercase">End-of-Day Report</h5>
        {!! $diary->end_today !!}
        <hr>
        <h5 class="text-uppercase">Plan Tomorrow</h5>
        {!! $diary->plan_tomorrow !!}
        <hr>
        <h5 class="text-uppercase">Roadblocks</h5>
        {!! $diary->roadblocks !!}
        <hr>

        <h5 class="text-uppercase">Summary</h5>
        {!! $diary->summary !!}
        <hr>
        
        <p class="mt-5">Checked by:</p>       
        <img src="{{ asset('storage/'.$diary['signature']) }}" alt="Supervisor's Signature" width="15%" class="position-relative top-1 mt-5">
        <h5 class="text-uppercase mb-0">{{$diary->supervisor->name }}</h5>
        <p class="m-0">HTE Supervising Officer</p>
        <p class="m-0">Date: {{ now()->format('md/y') }}</p>
    </div>
</div> --}}
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
                <div class="col-9 font-weight-bold">CREATIVEDEVLABS (CDL INNOVATIVE IT SOLUTIONS)</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Diary Date: </div>
                <div class="col-9 font-weight-bold">{{ $diary['diary']->created_at->format('m/d/y') }}</div>
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
        
        <p class="mt-5">Checked by:</p>       
        <img src="{{ asset('storage/'.$diary['signature']) }}" alt="Supervisor's Signature" width="15%" class="position-relative top-1 mt-5">
        <h5 class="text-uppercase mb-0">{{$diary['supervisor'] }}</h5>
        <p class="m-0">HTE Supervising Officer</p>
        <p class="m-0">Date: {{ now()->format('md/y') }}</p>
    </div>
</div>

@endsection