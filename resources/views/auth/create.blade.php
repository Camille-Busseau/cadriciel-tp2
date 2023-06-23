@extends('layouts.app')
@section('title', 'Registration')
@section('titleH1', 'Registration')
@section('content')
<div class="row justify-content-center">
    <div class="col-6">

        <div class="card">
            <form method='POST'>
                @csrf
                <div class="card-body">
                    <input type="text" class="form-control mt-3" name="name" placeholder="Name" value="{{old('name')}}">
                    <!-- <input type="password" name="password" minlength="2" maxlength="20" required> -->
                    @if($errors->has('name'))
                    <div class="text-danger mt-2">
                        <!-- lang/eng/validation -->
                        {{$errors->first('name')}}
                    </div>
                    @endif

                    <input type="text" class="form-control mt-3" name="address" placeholder="Address" value="{{old('address')}}">
                    <!-- <input type="password" name="password" minlength="2" maxlength="20" required> -->
                    @if($errors->has('address'))
                    <div class="text-danger mt-2">
                        <!-- lang/eng/validation -->
                        {{$errors->first('address')}}
                    </div>
                    @endif

                    <input type="text" class="form-control mt-3" name="phone" placeholder="Phone Number" value="{{old('phone')}}">
                    <!-- <input type="password" name="password" minlength="2" maxlength="20" required> -->
                    @if($errors->has('phone'))
                    <div class="text-danger mt-2">
                        <!-- lang/eng/validation -->
                        {{$errors->first('phone')}}
                    </div>
                    @endif

                    <input type="date" class="form-control mt-3" name="bday" placeholder="Date of birth" value="{{old('bday')}}">
                    <!-- <input type="password" name="password" minlength="2" maxlength="20" required> -->
                    @if($errors->has('bday'))
                    <div class="text-danger mt-2">
                        <!-- lang/eng/validation -->
                        {{$errors->first('bday')}}
                    </div>
                    @endif

                    <!-- <label for="city">Ville</label> -->
                    <select id="city" name="city_id" class="form-control mt-2" required>
                        <option value='' disabled selected>Choose a city</option>
                        @foreach($cities as $city)
                        <option value='{{$city->id}}'>{{$city->name}}</option>
                        @endforeach
                    </select>

                    <input type="email" class="form-control mt-3" name="email" placeholder="Email" value="{{old('email')}}">
                    @if($errors->has('email'))
                    <div class="text-danger mt-2">
                        {{$errors->first('email')}}
                    </div>

                    @endif
                    <input type="password" class="form-control mt-3" name="password" placeholder="Password">
                    @if($errors->has('password'))
                    <div class="text-danger mt-2">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                </div>
                <div class="card-footer d-grid mx-auto">
                    <input type="submit" value="Save" class="btn btn-dark btn-block">
                </div>

            </form>

        </div>
    </div>
</div>
@endsection