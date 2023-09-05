@extends('admin.admin')

@section('content')
    <div class="card">
        @if (isset($error))
            <div class="alert alert-danger m-3">
                <strong>Error: </strong>{!!$error!!}
                <p><strong>To edit,</strong> click the item you wish to update.</p>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 col-12 p-5">
                @if (isset($profile))
                    @if ($profile->img == Null)
                        <img src="{{ asset('/images/user-placeholder.png') }}" alt="Profile Image Placeholder" class="rounded-circle img-fluid item-hover" id="editProfilePic" data-id="{{$profile->id}}">    
                    @else
                    <img src="{{ asset('storage/'.$profile->img) }}" alt="Profile Image Placeholder" class="rounded-circle img-fluid item-hover" id="editProfilePic" data-id="{{$profile->id}}">
                    @endif
                @endif
            </div>
            <div class="col-md-8 col-12">
                <div class="card d-flex border-0">
                    <div class="card-body">
                        <h1 class="mt-5 mb-0 editName item-hover" id="editName">{{ $profile->name }}</h1>
                        <h1 class="mt-0 editName item-hover" id="editPass">•••••••••••</h1>
                        <form action="{{ route('users.updateProfileName', $profile->id) }}" method="post" id="update-profile-name-form">
                            @csrf
                            <input type="text" name="name" id="name-input" class="form-control d-none" value="{{ $profile->name }}">
                            @method('PUT')
                        </form>

                        <form action="{{ route('users.updatePassword', $profile->id) }}" method="post" id="update-password-form">
                            @csrf
                            <input type="password" name="password" id="password-input" data-id="{{$profile->id}}" class="form-control d-none" value="{{ $profile->password }}">
                            @method('PUT')
                        </form>
                        @if ($profile->role == 1)
                            <p class="badge badge-lg badge-primary mt-3" style="font-size:1.5em">Administrator</p>
                        @elseif($profile->role == 2)
                            <p class="badge badge-lg badge-success mt-3" style="font-size:1.5em">Supervisor</p>
                        @else
                            <p class="badge badge-lg badge-warning mt-3" style="font-size:1.5em">Trainee</p>
                        @endif
                        @if (!$profile->role_id == 3)
                            <div class="d-flex mt-5">
                                @if ($profile->signature == Null)
                                    <img src="{{ asset('/images/sign-placeholder.png') }}" alt="Profile Image Placeholder" class="rounded-circle img-fluid item-hover" id="editSignature" data-id="{{$profile->id}}">    
                                @else
                                    <img src="{{ asset('storage/'.$profile->signature) }}" alt="Profile Image Placeholder" class="rounded-circle img-fluid item-hover" id="editSignature" data-id="{{$profile->id}}" width="50%">    
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.profile.partials._profile-pic-modal')
    @include('admin.profile.partials._signature-modal')
    @include('admin.profile.partials._scripts')
@endsection
