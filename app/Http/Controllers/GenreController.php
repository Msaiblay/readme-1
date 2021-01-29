<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Spatie\Permission\Models\Role;


class GenreController extends Controller
{
    public function __construct(){
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        // SQL
        // SELCT * FROM genres

        // ELOQUENT
        $genres = Genre::all();

        // dd =  Dump and Die
        // dd($genres);

        return view('backend.genre.list',compact('genres'));
    }

    public function create()
    {
        return view('backend.genre.new');
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'name'  => ['required', 'min:3', 'max:100', 'unique:genres']  
        ]);
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();

        return redirect()->route('genre.index')->with('successMsg','New Genre is ADDED in your data.');


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // SQL
        // SELECT * FROM genrs WHERE id = $id

        // ELOQUENT
        $genre = Genre::find($id);

        return view('backend.genre.edit',compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;

        $data = [
            'name'  =>  $name
        ];

        Genre::where('id',$id)->update($data);

        return redirect()->route('genre.index')->with('successMsg','Existing Genre is UPDATED in your data.');

    }

    public function destroy($id)
    {
        // DELETE FROM genres WHERE id = $id
        $genre = Genre::find($id);
        $genre->delete();

        return redirect()->route('genre.index')->with('successMsg','Existing Genre :'.$genre->name.' is DELETED in your data.');


    }






























}
