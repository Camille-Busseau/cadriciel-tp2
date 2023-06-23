@extends('layouts.app')
@section('title', 'Modifier un profil')
@section('titleH1', "Modifier un profil d'étudiant.e")
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <form method="POST">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    Modifier le profil no {{$student->id}}
                </div>
                <div class="card-body">
                    <label for="name">{{trans('lang.text_name')}}</label>
                    <input type="text" name="name" class='form-control' value="{{$student->name}}">
                    
                    <label for="email">{{trans('lang.text_email')}}</label>
                    <input type="text" name="email" class="form-control" value='{{$student->studentHasUser->email}}'>

                    <label for="address">{{trans('lang.text_address')}}</label>
                    <input type="text" name="address" class="form-control" value='{{$student->address}}'>

                    <label for="phone">{{trans('lang.text_phone')}}</label>
                    <input type="text" name="phone" class="form-control" value='{{$student->phone}}'>

                    <input style='display:none' name="bday" class="form-control" value='{{$student->bday}}'>

                    <label for="city">Ville</label>
                    <select id="city" name="city_id" class="form-control">
                        @foreach($cities as $city)
                        <option value='{{$city->id}}'>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success" value="{{trans('lang.text_save')}}">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection