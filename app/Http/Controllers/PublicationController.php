<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publications = Publication::orderBy('id', 'desc')->get();

        $latestComments = [];

        foreach ($publications as $publication) {
            for ($i=0; $i < 1; $i++) { 
                array_push($latestComments, $publication->comments[$i]);
            }
        }
        
        return view('publications.index', [
            'publications' => $publications,
            'latest' => $latestComments
        ]);
    }
    
    public function getPublication($id)
    {
        $publications = Publication::where('id', $id)->get();


        return view('publications.publication', [
            'publications' => $publications
        ]);
    }

    public function create()
    {
        return view('publications.create');
    }

    public function valid(Request $request)
    {
        return $this->validate($request, [
            'photo' => ['required', 'image'],
            'description' => ['max:130']
        ]);
    }

    public function store(Request $request)
    {
        $this->valid($request);

        $publication = new Publication();
        $publication->description = $request->input('description');
        $publication->user_id = Auth::user()->id;
        $photo = $request->file('photo');

        if($photo){
            $photo_name = time() . $photo->getClientOriginalName();

            Storage::disk('images')->put($photo_name, File::get($photo));

            $publication->photo = $photo_name;
        }

        $publication->save();

        return redirect('publications');
    }

    public function edit(int $id)
    {
        
    }

    public function update(Request $request, int $id)
    {
        $publication = Publication::find($id);

        $this->valid($request);        
        $publication->description = $request->input('description');
        $photo = $request->file('photo');

        if($photo){
            $photo_name = time() . $photo->getClientOriginalName();

            Storage::disk('images')->put($photo_name, File::get($photo));

            $publication->photo = $photo_name;
        }

        // Update table
        $publication->update();

        return redirect('publications.index');
    }

    public function destroy(int $id)
    {
        Publication::where('id', $id)->delete();
        
        return $this->index();
    }

    public function getPhoto(string $filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
}
