@extends('layouts.app')
@section('title', trans('lang.text_addArticle'))
@section('titleH1', trans('lang.text_addArticle'))
@section('content')

<form method="POST">
    @csrf
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div>{{trans('lang.text_addArticleL')}}</div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">{{trans('lang.text_english')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">{{trans('lang.text_french')}}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class='py-3'>
                                <label for="title_en">{{trans('lang.text_titleArticle')}}</label>
                                <input type="text" rows='2' max='100' name="title_en" class='form-control'value='{{old("title_en")}}'>
                            </div>
                            @if($errors->has('title_en'))
                            <div class="text-danger mt-2">
                                <!-- lang/eng/validation -->
                                {{$errors->first('title_en')}}
                            </div>
                            @endif
                            <div class='py-3'>
                                <label for="body_en">{{trans('lang.text_bodyArticle')}}</label>
                                <textarea type="textarea" rows='15' name="body_en" class='form-control'>{{old("body_en")}}</textarea>
                            </div>
                            @if($errors->has('body_en'))
                            <div class="text-danger mt-2">
                                <!-- lang/eng/validation -->
                                {{$errors->first('body_en')}}
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class='py-3'>
                                <label for="title_fr">{{trans('lang.text_titleArticle')}}</label>
                                <input type="text" rows='2' max='100' name="title_fr" class='form-control'value='{{old("title_fr")}}'>
                            </div>
                            @if($errors->has('title_fr'))
                            <div class="text-danger mt-2">
                                <!-- lang/eng/validation -->
                                {{$errors->first('title_fr')}}
                            </div>
                            @endif
                            <div class='py-3'>
                                <label for="body_fr">{{trans('lang.text_bodyArticle')}}</label>
                                <textarea type="textarea" rows='15' name="body_fr" class='form-control'>{{old("body_fr")}}</textarea>
                            </div>
                            @if($errors->has('body_fr'))
                            <div class="text-danger mt-2">
                                <!-- lang/eng/validation -->
                                {{$errors->first('body_fr')}}
                            </div>
                            @endif
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