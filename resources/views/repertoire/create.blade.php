@extends('layouts.app')
@section('title', trans('lang.text_addFile'))
@section('titleH1', trans('lang.text_addFile'))
@section('content')

<form method="POST">
    @csrf
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div>{{trans('lang.text_addFileL')}}</div>
                </div>
                <div class="card-body">
                    <div class='mb-3'>
                        <label for="myFile" class="btn btn-secondary mb-1">{{trans('lang.text_chooseLink')}}</label>
                        <input type="file" id="myFile" class='form-control' name="link">
                        @if($errors->has('link'))
                        <div class="text-danger mt-2">
                            <!-- lang/eng/validation -->
                            {{$errors->first('link')}}
                        </div>
                        @endif
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">{{trans('lang.text_english')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">{{trans('lang.text_french')}}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @if($errors->has('title_en'))
                        <div class="text-danger mt-2">
                            <!-- lang/eng/validation -->
                            {{$errors->first('title_en')}}
                        </div>
                        @elseif($errors->has('title_fr'))
                        <div class="text-danger mt-2">
                            <!-- lang/eng/validation -->
                            {{$errors->first('title_fr')}}
                        </div>
                        @endif
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class='py-3'>
                                <label for="name">{{trans('lang.text_titleFile')}}</label>
                                <input type="textarea" rows='2' max='100' name="title_en" class='form-control' value='{{old("title_en")}}'>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class='py-3'>
                                <label for="name">{{trans('lang.text_titleFile')}}</label>
                                <input type="textarea" rows='2' max='100' name="title_fr" class='form-control' value='{{old("title_fr")}}'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success" value="{{trans('lang.text_save')}}">
                </div>
            </div>
        </div>
    </div>

</form>


@endsection