<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userData = json_encode($user);
        switch (auth()->user()->current_destination) {
            case 'marketplace':   
                $destination = 'http://localhost:9000?user=' . urlencode($userData);
                return Redirect::away($destination);
                break;
            
            case 'call-center':
                return Redirect::away('http://localhost/eco');
                break;
        
            case 'website':
                $destination = 'http://localhost/eco?user=' . urlencode($userData);
                return Redirect::away($destination);
                break;
    
            case 'payment':
                return Redirect::away('http://localhost/eco');
                break;
    
            case 'advisory':
                return Redirect::away('http://localhost/eco');
                break;
                        
            default:
                $destination = 'http://localhost/eco?user=' . urlencode($userData);
                return Redirect::away($destination);
                break;
        }
        // return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
