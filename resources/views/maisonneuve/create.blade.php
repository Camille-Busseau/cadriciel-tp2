@extends('layouts.app')
@section('title', trans('lang.text_createProfile'))
@section('titleH1', trans('lang.text_createProfile'))
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <form method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    {{trans('lang.text_createProfileL')}}
                </div>
                <div class="card-body">
                    <label for="name">{{trans('lang.text_name')}}</label>
                    <input type="text" name="name" class='form-control' value='{{old("name")}}'>
                    @if($errors->has('name'))
                    <div class="text-danger mt-2">
                        <!-- lang/eng/validation -->
                        {{$errors->first('name')}}
                    </div>
                    @endif
                    
                    <label for="email">{{trans('lang.text_email')}}</label>
                    <input type="text" name="email" class="form-control" value='{{old("email")}}'>

                    <label for="address">{{trans('lang.text_address')}}</label>
                    <input type="text" name="address" class="form-control" value='{{old("address)}}' >

                    <label for="phone">{{trans('lang.text_phone')}}</label>
                    <input type="text" name="phone" class="form-control" value='{{old("phone")}}'>

                    <label for="bday">{{trans('lang.text_bday')}}</label>
                    <input type="date" name="bday" class="form-control" value='{{old("bday")}}'>

                    <label for="city">{{trans('lang.text_city')}}</label>
                    <select id="city" name="city_id" class="form-control">
                        @foreach($cities as $city)
                        <option value='{{$city->id}}'>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success" value="Enregistrer">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection