@extends('admin.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            New Diary
        </div>
        <form action="{{route('diaries.store')}}" method="POST">
            @csrf
            <div class="card-body">
                    <div class="form-group">
                        <label for="todays-plan">Today's Plan</label>
                        <textarea class="form-control" id="todays-plan" name="plantoday" rows="3">{{ old('plantoday') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="eod">End of Day Report</label>
                        <textarea class="form-control" id="eod" name="eod" rows="3">{{ old('eod') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="roadblocks">Roadblocks</label>
                        <textarea class="form-control" id="roadblocks" name="roadblocks" rows="3">{{ old('roadblocks') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="summary">Summary of the Day</label>
                        <textarea class="form-control" id="summary" name="summary" rows="3">{{ old('summary') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tomorrows-plan">Tomorrow's Plan</label>
                        <textarea class="form-control" id="tomorrows-plan" name="plantomorrow" rows="3">{{ old('plantomorrow') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="supervisor">Supervisor</label>
                        <select name="supervisor" id="supervisor" class="custom-select">
                            @if (isset($supervisors))
                                <option value="" selected disabled>Select Supervisor</option>
                                @foreach ($supervisors as $supervisor)
                                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                @endforeach
                            @endif
                        </select>                          
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="p-0 m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Save</button>
                <a href="{{ route('diaries.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
        </form>
    </div>
@endsection