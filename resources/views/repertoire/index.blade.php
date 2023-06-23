@extends('layouts.app')
@section('title', 'Collège de Maisonneuve')
@section('titleH1', trans('lang.text_repertoire'))
@section('content')
<!-- @php $lang = session('locale') @endphp -->
<div class="my-3"><a class="btn btn-secondary" href='{{route("repertoire.create")}}'>{{trans('lang.text_addFile')}}</a></div>
<div class="card mt-3">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{trans('lang.text_createdAt')}}</th>
                    <th>{{trans('lang.text_shared_by')}}</th>
                    <th>{{trans('lang.text_description')}}</th>
                    <th class="text-end">{{trans('lang.text_seeLink')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($repertoires as $repertoire)
                <tr>
                    <td class="text-center">{{ $repertoire->created_at}}</td>
                    <td>{{ $repertoire->repertoireHasUser?->userHasStudent?->name}}</td>

                    @if($lang == 'fr')
                    <td>{{ $repertoire->title_fr ? $repertoire->title_fr : $repertoire->title_en}}</td>
                    @else
                    <td>{{ $repertoire->title_en ? $repertoire->title_en : $repertoire->title_fr}}</td>
                    @endif
                    <td class="text-end">
                        <a href='{{route("repertoire.show", $repertoire->id)}}'>{{ $repertoire->link }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $repertoires }}
    </div>
</div>
@endsection