<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
    	$todo = Todo::all();

    	return view('welcome',['todo' => $todo]);
    }
    public function store(){
    	$atribut = request()->validate([
    		'judul'  => 'required',
    		'deskripsi' => 'nullable'
    	]);

    	Todo::create($atribut);
    	return redirect('/');
    }
    public function update(Todo $todos){
    	$todos->update(['selesai' => true]);

    	return redirect('/');
    }
    public function destroy(Todo $todos){
    	$todos->delete();

    	return redirect('/');
    }
}
