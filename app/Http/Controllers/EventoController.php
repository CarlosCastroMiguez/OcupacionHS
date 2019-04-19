<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class EventoController extends Controller
{   
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){   
        
        return view ('calendar');
    }

    
    public function create() {
        
        
    }
    public function store() {
        
        
    }
    
    public function update() {
        
        
    }
    public function delete() {
        
        
    }
    
    
    
    
}
