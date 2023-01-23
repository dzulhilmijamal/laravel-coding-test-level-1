@extends('layouts.master')

@section('container')
    <main>
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-dark">
                        <h5 class="card-title text-light">Login System</h5>
                        </div>
                        <div class="card-body">
                            @if(Session::has('failed'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('failed')}}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ url('/auth') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" value="administrator">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" value="password">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </main>
@endsection
