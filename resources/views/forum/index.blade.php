@extends('layouts.app')
@section('title', 'Collège de Maisonneuve')
@section('titleH1', trans('lang.text_forum'))
@section('content')
@php $lang = session('locale') @endphp
<div class="my-3"><a class="btn btn-secondary" href='{{route("forum.create")}}'>{{trans('lang.text_addArticle')}}</a></div>
<div class="card mt-3">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{trans('lang.text_createdAt')}}</th>
                    <th>{{trans('lang.text_author')}}</th>
                    <th>{{trans('lang.text_title')}}</th>
                    <th>{{trans('lang.text_toArticle')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogPosts as $blogPost)
                <tr>
                    <td>{{ $blogPost->created_at }}</td>
                    <td>{{ $blogPost->blogPostHasUser->userHasStudent?->name}}</td>


                    @if($lang == 'fr')
                    <td>{{ $blogPost->title_fr ? $blogPost->title_fr : $blogPost->title_en}}</td>
                    @else
                    <td>{{ $blogPost->title_en ? $blogPost->title_en : $blogPost->title_fr}}</td>
                    @endif

                    <td>
                        <a href="{{route('forum.show', $blogPost->id)}}">{{ trans('lang.text_toArticle') }}</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogPosts }}
    </div>
</div>
@endsection