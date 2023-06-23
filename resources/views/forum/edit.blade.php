@extends('layouts.app')
@section('title', trans('lang.text_editArticle'))
@section('titleH1', trans('lang.text_editArticleL'))
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <form method="POST">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    {{trans('lang.text_article')}}
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
                        @if($errors->has('body_en'))
                        <div class="text-danger mt-2">
                            <!-- lang/eng/validation -->
                            {{$errors->first('body_en')}}
                        </div>
                        @elseif($errors->has('body_fr'))
                        <div class="text-danger mt-2">
                            <!-- lang/eng/validation -->
                            {{$errors->first('body_fr')}}
                        </div>
                        @endif
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class='py-3'>
                                <label for="name">{{trans('lang.text_titleFile')}}</label>
                                @if($errors->first('title_en'))
                                <input type="text" min='10' max='100' name="title_en" class='form-control' 
                                value="{{old('title_en')}}">
                                @else
                                <input type="text" min='10' max='100' name="title_en" class='form-control' 
                                value="{{$blogPost->title_en}}">
                                @endif
                            </div>
                            <div class='py-3'>
                                <label for="name">{{trans('lang.text_content')}}</label>
                                @if($errors->first('body_en'))
                                <textarea rows='15' name="body_en" class='form-control' value="{{old('body_en')}}"></textarea>
                                @else
                                <textarea rows='15' name="body_en" class='form-control'>{{$blogPost->body_en}}</textarea>
                                @endif

                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class='py-3'>
                                <label for="name">{{trans('lang.text_titleFile')}}</label>
                                @if($errors->first('title_fr'))
                                <input type="text" min='10' max='100' name="title_fr" class='form-control' 
                                value="{{old('title_fr')}}">
                                @else
                                <input type='text' min='10' max='100' name="title_fr" class='form-control' value="{{$blogPost->title_fr}}">
                                @endif
                            </div>
                            <div class='py-3'>
                                <label for="name">{{trans('lang.text_content')}}</label>
                                @if($errors->first('body_fr'))
                                <textarea rows='15' name="body_fr" class='form-control' value='{{old("body_fr")}}'></textarea>
                                @else
                                <textarea rows='15' name="body_fr" class='form-control'>{{$blogPost->body_fr}}</textarea>
                                @endif

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