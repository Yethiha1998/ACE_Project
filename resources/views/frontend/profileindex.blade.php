@extends('layouts.master')


@section('title')
    Dashboard | Festivilla
@endsection



@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <ol class="breadcrumb bg-dark text-yellow-all">
                    <li class="breadcrumb-item"><a href="/backend/dashboard"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-car"></i> Profile</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- profile -->


        <div class="row profile">
        <div class="col-md-3 col-lg-3 col-sm-0">

        </div>
        <div class="col-md-6 col-lg-6 col-sm-12" >
            <img src="../assets/img/avatar/avatar-1.png" alt="profile" class="profileimg"><br><p><br><p>
            <form action="/backend/profile/{{ Auth::user()->id }}" method="post">@csrf
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5">
                        Name:
                    </div>
                    <div class="col-7">
                        <input type="text" name="name" value={{ Auth::user()->name }}>
                    </div>
                </div><p>
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5">
                        Email:
                    </div>
                    <div class="col-7">
                        <input type="email" name="email" value={{ Auth::user()->email }}>
                    </div>
                </div><p>
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5">
                        Phone No:
                    </div>
                    <div class="col-7">
                        <input type="text" name="phone" value={{ Auth::user()->phone_number }}>
                    </div>
                </div><p>
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5">
                        NRC:
                    </div>
                    <div class="col-7">
                        <input type="text" name="nrc" value={{ Auth::user()->NRC }}>
                    </div>
                </div><p>
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5">
                        Registeration Date:
                    </div>
                    <div class="col-7">
                        <input disabled type="date" name="register" value={{ Auth::user()->created_at }}>
                    </div>
                </div><p>
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5">
                        Date Of Birth:
                    </div>
                    <div class="col-7">
                        <input type="date" name="dob" value={{ Auth::user()->Date_of_birth }}>
                    </div>
                </div><p>
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5">
                        Address:
                    </div>
                    <div class="col-7">
                        <textarea name="address" rows="1">{{ Auth::user()->address }}</textarea>
                    </div>
                </div><p><br>
                <button class="btn-text">Save Changes</button>
            </form>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-0">

        </div>
    </div>
</div>

@endsection


@section('scripts')

@endsection