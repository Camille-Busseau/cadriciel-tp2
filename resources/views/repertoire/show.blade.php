@extends('layouts.app')
@section('title', trans('lang.text_sharedFile'))
@section('titleH1', trans('lang.text_sharedFile'))
@section('content')
@php $lang = session('locale') @endphp
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if($lang == 'fr' )
                <h4 class="mt-2">{{ $repertoire->title_fr ? $repertoire->title_fr : $repertoire->title_en}}</h4>
                @elseif($lang == 'en')
                <h4 class="mt-2">{{ $repertoire->title_en ? $repertoire->title_en : $repertoire->title_fr}}</h4>
                @endif
            </div>
            <div class="card-body">
                <p>{{ $repertoire->link }}</p>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="d-flex justify-content-between">
    @if(Auth::user()->id == $repertoire->user_id)
    <a href="{{ route('repertoire.edit', $repertoire->id) }}" class="btn btn-success">{{trans('lang.text_edit')}}</a>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">
        {{trans('lang.text_delete')}}
    </button>
    @endif
    <a href="{{ route('repertoire.download', $repertoire->id) }}" class="btn btn-warning">{{trans('lang.text_link')}}</a>
</div>



<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="top:30%">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{trans('lang.text_deleteFile')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{trans('lang.text_confirmDeleteFile')}} "{{$repertoire->link}}"
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
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