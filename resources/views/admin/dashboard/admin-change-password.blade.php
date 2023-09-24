@extends('admin.master')

@section('title')

@endsection

@section('content')


{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>--}}


    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <img class="wd-80 rounded-circle" src="{{ (!empty($profile->image)) ? ( asset($profile->image) ) :  (asset('backend/upload/no_image.jpg'))  }}">
                            <span class="h4 ms-3">{{ $profile->name }}</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name: </label>
                        <p class="text-muted">{{ $profile->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted"> {{ $profile->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted"> {{ $profile->mobile }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{ $profile->address }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Change Password Form</h6>
                        <h5>{{ session('messages') }}</h5>
                        <form action="{{ route('admin.change.password') }}" method="POST" class="forms-sample">
                            @csrf
                            <div class="mb-3">
                                <label for="oldPassword" class="form-label">Old Password</label>
                                <input type="password" name="old_password"  class="form-control @error('old_password') is-invalid @enderror" id="oldPassword"/>
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" name="new_password"  class="form-control @error('new_password') is-invalid @enderror" id="newPassword"/>
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="passwordConfirmation" class="form-label">Password Confirmation</label>
                                <input type="password" name="new_password_confirmation"  class="form-control" id="passwordConfirmation"/>
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Change Password</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

