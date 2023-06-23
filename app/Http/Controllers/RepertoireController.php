<?php

namespace App\Http\Controllers;

use App\Models\Repertoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use PDF;



class RepertoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repertoires = Repertoire::Select()
            ->orderBy('id')
            ->paginate(10);
        return view('repertoire.index', ['repertoires' => $repertoires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cities = City::selectCity();
        return view('repertoire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title_en' => 'required_without:title_fr',
            'title_fr' => 'required_without:title_en',
            'link' => 'required',
            'link.*' => 'mimes:doc,docx,pdf,zip'
        ]);

        $newFile = Repertoire::create([
            'link' => $request->link,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'user_id' => Auth::user()->id
        ]);

        Storage::disk('local')->put($request->link, 'Contents');
        return redirect(route('repertoire'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function show(Repertoire $repertoire)
    {
        return view('repertoire.show', ['repertoire' => $repertoire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Repertoire $repertoire)
    {
        return view('repertoire.edit', ['repertoire' => $repertoire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repertoire $repertoire)
    {
        $request->validate([
            'title_en' => 'required_without:title_fr',
            'title_fr' => 'required_without:title_en',
            'link' => 'requires|mimetypes:application/pdf,application/zip,application/msword'
        ]);

        $repertoire->update([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr
        ]);

        return redirect(route('repertoire.show', $repertoire->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repertoire  $repertoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repertoire $repertoire)
    {
        $repertoire->delete();
        return redirect(route('repertoire'));
    }

    public function download(Repertoire $repertoire)
    {
        return Storage::download($repertoire->link);
        return view('repertoire.show', $repertoire->id);
    }
}
