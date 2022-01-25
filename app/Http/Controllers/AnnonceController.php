<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Exception\InvalidOptionException;

class AnnonceController extends Controller
{
    /**
     * Show all annonces
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allAnnonces = Annonce::orderBy('updated_at', 'desc')->paginate(20);

        return view('annonces/annonce_index', [
            'annonces' => $allAnnonces
        ]);
    }

    /**
     * Create a new annonce
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        return view('annonces/annonce_new');
    }


    /**
     * Create or update a new annonce
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(Request $request, int $id)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:1000'],
            'location' => ['max:255', 'nullable'],
            'departement' => ['max:10', 'nullable'],
            'country' => ['max:255', 'nullable'],
            'remote' => ['boolean'],
            'company' => ['required', 'min:2', 'max:255'],
            'pay' => ['max:255', 'nullable'],
            'experience' => ['integer', 'nullable', 'min:0', 'max:10']
        ]);

        if ($request->isMethod('PUT')) {

            $annonce = Annonce::find($id);
            $annonce->update($attributes);
        } else if ($request->isMethod('POST')) {

            $currentUserId = Auth::id();
            $attributes['users_id'] = $currentUserId;
            $annonce = Annonce::create($attributes);
        } else {
            throw new InvalidOptionException("You must use POST or PUT method for this route!");
        }

        return redirect()->route('annonce_show', ['id' => $annonce->id]);
    }

    /**
     * Show annonce by id
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(int $id)
    {
        $annonce = Annonce::findOrFail($id);

        return view('annonces/annonce_show', [
            'annonce' => $annonce
        ]);
    }

    /**
     * Edit annonce by id
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id)
    {
        $annonce = Annonce::find($id);

        return view('annonces/annonce_new', [
            'annonce' => $annonce
        ]);
    }

    /**
     * Delete annonce by id
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(int $id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();
        
        return redirect()->route('annonce_index');
    }
}
