@extends('admin.masterlink')
@section('title')
    Student Dashboard
@endsection

@section('content')

        <div class="container-fluid items-center">
            <div class="row mt-6">
                <div class="col-md-8 offset-2">
                    <div class="card mt-5">
                        <div class="card-header"><h4 class="text-center">Login Form</h4></div>
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="row ">
                                    {{--                                                            <div class="col-md-12 mt-3">--}}
                                    {{--                                                                <div class="single-form form-default">--}}
                                    {{--                                                                    <label>Email</label>--}}
                                    {{--                                                                    <div class="col-md-12 form-input form">--}}
                                    {{--                                                                        <input type="text" class="form-control" name="email" required  placeholder="Enter Email"/>--}}
                                    {{--                                                                    </div>--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </div>--}}
                                    <div class="col-md-12 mt-3">
                                        <div class="single-form form-default">
                                            <label>Email/suid</label>
                                            <div class="col-md-12 form-input form">
                                                <input type="text" class="form-control" name="login" required  placeholder="Enter ID/Email"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="single-form form-default">
                                            <label>Password</label>
                                            <div class="col-md-12 form-input form">
                                                <input type="password" class="form-control" name="password" required  placeholder="Enter Password"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <div class="single-form button mt-3 text-center">
                                            <button class="btn btn-primary form-control" type="submit" >Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

