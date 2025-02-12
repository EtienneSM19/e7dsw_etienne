<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::all();
        return view('publication', compact('publications'));
    }

    public function show($id)
    {
        $publication = Publication::find($id);
        return view('publication');
    }

    public function create()
    {
        return view('publication');
    }

    public function store(Request $request)
    {
        $publication = new Publication();
        $publication->title = $request->title;
        $publication->description = $request->description;
        $publication->author = $request->author;
        $publication->date = $request->date;
        $publication->save();
        return redirect('/api/publications');
    }

    public function edit($id)
    {
        $publication = Publication::find($id);
        return view('publication');
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::find($id);
        $publication->title = $request->title;
        $publication->description = $request->description;
        $publication->author = $request->author;
        $publication->date = $request->date;
        $publication->save();
        return redirect('/api/publications');
    }

    public function destroy($id)
    {
        $publication = Publication::find($id);
        $publication->delete();
        return redirect('/api/publications');
    }
}
