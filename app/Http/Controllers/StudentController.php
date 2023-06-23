<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\Repertoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::Select()
            ->orderBy('name')
            ->paginate(10);
        return view('maisonneuve.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::selectCity();
        return view('maisonneuve.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $newStudent = Student::create([
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'bday' => $request->bday,
    //         'city_id' => $request->city_id,
    //     ]);

    //     // redirect permet de reprendre la route du début, permet le traitement de show du début VS return view('blog.show', ['blogPost'=> $newPost]) qui s'y rend directement.
    //     return redirect(route('maisonneuve.show', $newStudent->id));
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $cities = City::selectCity();
        return view('maisonneuve.show', ['student' => $student, 'cities' => $cities]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $cities = City::selectCity();
        return view('maisonneuve.edit', ['student' => $student, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // user table update
        $user = User::findUser($student->id);
        $user->update([
            'email' => $request->email
        ]);

        // student table update
        $student->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'bday' => $request->bday,
            'city_id' => $request->city_id
        ]);

        return redirect(route('maisonneuve.show', $student->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // J'ai essayé de faire en sorte que à la suppression d'un compte, tous les articles/fichiers soit supprimés, mais ça ne fonctionne pas
        $repertoires = Repertoire::findUser($student->id);
        $repertoires->delete();

        $blogPosts = BlogPost::findUser($student->id);
        $blogPosts->delete();

        $student->delete();
        // user table update
        $user = User::findUser($student->id);
        $user->delete();

        Auth::logout();
        return redirect(route('maisonneuve.index'));
    }
}
