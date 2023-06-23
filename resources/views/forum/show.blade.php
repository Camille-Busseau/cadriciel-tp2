@extends('layouts.app')
@section('title', trans('lang.text_article'))
@section('content')
<!-- @php $lang = session('locale') @endphp -->
<div class="row mt-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <p class="mt-2"><strong>{{trans('lang.text_author')}}: </strong> {{ $blogPost->blogPostHasUser->userHasStudent->name }}</p>
        @if($lang == 'fr')
        <div>
          <p style="font-size:20px;">{{ $blogPost->title_fr ? $blogPost->title_fr : $blogPost->title_en}}</p>
        </div>
        @elseif($lang == 'en')
        <div>
          <p style="font-size:20px;">{{ $blogPost->title_en ? $blogPost->title_en : $blogPost->title_fr}}</p>
        </div>
        @endif
      </div>
      <div class="card-body">
        @if($lang == 'fr')
        <div>
          <p style="font-size:20px;">{{ $blogPost->body_fr ? $blogPost->body_fr : $blogPost->body_en}}</p>
        </div>
        @elseif($lang == 'en')
        <div>
          <p style="font-size:20px;">{{ $blogPost->body_en ? $blogPost->body_en : $blogPost->body_fr}}</p>
        </div>
        @endif
        <p><strong>{{trans('lang.text_createdAt')}}: </strong> {{ $blogPost->created_at }}</p>
      </div>
    </div>
  </div>
</div>
<hr>

<div class="d-flex justify-content-between">
  @if(Auth::user()->id === $blogPost->user_id)
  <!-- si il y a plus d'un paramètre après la view, entre [a,b,c] -->
  <a href="{{ route('forum.edit', $blogPost->id) }}" class="btn btn-success">{{trans('lang.text_edit')}}</a>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
    {{trans('lang.text_delete')}}
  </button>
  @endif
</div>



<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="top:30%">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{trans('lang.text_deleteArticle')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{trans('lang.text_confirmDeleteArticle')}}: "{{$blogPost->title_en}}"
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('lang.text_cancel')}}</button>
        <form method="POST">
          @csrf
          @method('delete')
          <input type="submit" value="{{trans('lang.text_delete')}}" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection