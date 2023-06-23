@extends('layouts.app')
@section('title', 'Profil no '.$student->id)
@section('titleH1', 'Étudiant.e no '.$student->id)
@section('content')
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $student->name }}</h4>
            </div>
            <div class="card-body">
                <p><strong>{{trans('lang.text_email')}}:</strong> {{ $student->studentHasUser->email }}</p>
                <p><strong>{{trans('lang.text_address')}}:</strong> {{ $student->address }}</p>
                <p><strong>{{trans('lang.text_phone')}}:</strong> {{ $student->phone }}</p>
                <p><strong>{{trans('lang.text_bday')}}:</strong> {{ $student->bday }}</p>
                <p><strong>{{trans('lang.text_city')}}:</strong> {{ $student->studentHasCity?->name }}</p>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="d-flex justify-content-between">
  @if(Auth::user()->id == $student->id)
        <a href="{{ route('maisonneuve.edit', $student->id) }}" class="btn btn-success">{{trans('lang.text_edit')}}</a>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{trans('lang.text_studentDelete')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{trans('lang.text_confirmStudentDelete')}}: "{{$student->name}}"
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('lang.text_cancel')}}</button>
        <form method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection