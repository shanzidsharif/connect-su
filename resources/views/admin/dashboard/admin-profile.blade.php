@extends('admin.master')

@section('title')

@endsection

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



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

                            <h6 class="card-title">Basic Form</h6>
                            <form action="{{ route('admin.profile.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Name</label>
                                    <input type="text" name="name" readonly class="form-control" id="exampleInputUsername1" value="{{ $profile->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputSUid" class="form-label">SU ID</label>
                                    <input type="text" class="form-control" name="suid" id="exampleInputSUid"  value="{{ $profile->suid }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  value="{{ $profile->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="mobile" id="exampleInputPassword1"  value="{{ $profile->mobile }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputAddress" class="form-label">Address</label>
                                    <textarea type="text" class="form-control" name="address" id="exampleInputAddress">{{ $profile->address }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputNid" class="form-label">NID</label>
                                    <input type="number" name="nid" class="form-control" id="exampleInputNid"  value="{{ $profile->nid }}">
                                </div>
                                <div class="mb-3">
                                    <label for="imageId" class="form-label">Photo</label>
                                    <input type="file" name="image" class="form-control" id="imageId" accept="image/*" />

                                    <div class="d-flex align-items-center justify-content-between my-3">
                                        <div>
                                            <img class="wd-100 rounded-circle" id="showImage" src="{{ (!empty($profile->image)) ? ( asset($profile->image) ) :  (asset('backend/upload/no_image.jpg')) }}">
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary me-2">Update Profile</button>
                                <button class="btn btn-secondary" type="reset">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <!-- right wrapper end -->
        </div>


        <script type="text/javascript">
            $(document).ready(function () {
                $('#imageId').change(function (e) {
                    var read = new FileReader();
                    read.onload = function (i) {
                        $('#showImage').attr('src', i.target.result);
                    };
                    read.readAsDataURL(e.target.files['0']);
                });
            });

        </script>




@endsection
