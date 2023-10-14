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
        // important
        // dd('Destination: '.auth()->user()->current_destination);
        $user = auth()->user();
        $userData = json_encode($user);
            
        if(auth()->check()){
            switch (auth()->user()->current_destination) {
                case 'marketplace':
                    $destination = 'https://market.greenwebbtech.com?user=' . urlencode($userData);
                    return Redirect::away($destination);
                break;
                
                case 'call-center':
                    $destination = 'https://callcenter.greenwebbtech.com/login?user=' . urlencode($userData);
                    return Redirect::away($destination);
                break;
                
                case 'call center':
                    $destination = 'https://callcenter.greenwebbtech.com/login?user=' . urlencode($userData);
                    return Redirect::away($destination);
                break;
            
                case 'website':
                    $destination = 'https://website.greenwebbtech.com?user=' . urlencode($userData);
                    return Redirect::away($destination);
                break;
        
                case 'payment':
                    $destination = 'https://website.greenwebbtech.com?user=' . urlencode($userData);
                    return Redirect::away($destination);
                break;
        
                case 'payment solution':
                    $destination = 'https://website.greenwebbtech.com?user=' . urlencode($userData);
                    return Redirect::away($destination);
                break;
        
                case 'advisory':
                    $destination = 'https://callcenter.greenwebbtech.com?user=' . urlencode($userData);
                    return Redirect::away($destination);
                break;
        
                case 'auth':
                    return view('dashboard');
                break;
                            
                default:
                    if (auth()->user()->type == 'admin') {
                        return view('dashboard');
                    }else{
                        $destination = 'https://website.greenwebbtech.com?user=' . urlencode($userData);
                        return Redirect::away($destination);
                    }
                break;
            }
        }else{
            return view('dashboard');
        }
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
