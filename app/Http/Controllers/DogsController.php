<?php

namespace App\Http\Controllers;
use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class DogsController extends Controller
{
    public function index(){
        $dogs = Dog::all();
        return view('dogs.dogs', ['dogs' => $dogs]);
    }

    public function store( Request $request)
    {
        $attr = $request->validate([
            'name' => ['required', 'min:3'],
            'image' => ['required'],
        ]);

        $attr['image'] = $request->file('image')->store('image');

        $dog = Auth::user()->dogs()->create($attr);
        $dogs = Dog::all();
        return view('home-app', ['home-app' => $dogs])->with('message', "Dog's account successfully created");
    }
    public function show(Dog $dog){
        return view('dogs.show', ['dog' => $dog]);
    }

    public function create(){
        return view('dogs.create');
    }
    public function edit(Dog $dog){
        Gate::authorize('edit-dogs', $dog);
        return view('podcasts.edit', $dog)->with('message', "Please, edit your dog's account !");
    }
    public function destroy(Dog $dog){
        Gate::authorize('edit-dogs', $dog);
        $dog->delete();
        return redirect(route('home'))->with('message', 'Podcast successfully deleted !');
    }

}
