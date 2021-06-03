<?php

namespace App\Http\Controllers;

use App\Models\habitar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class HabitarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $locais = DB::table('habitars')
            ->leftJoin('users', 'users.id', '=', 'habitars.user_id')
            ->get();


        return response()->json(['data' => $locais]);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $local = habitar::create([
            'title' => $request['title'],
            'adress' => $request['adress'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],
            'user_id' => Auth()->user()->id

        ]);
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\habitar  $habitar
     * @return \Illuminate\Http\Response
     */
    public function show(habitar $habitar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\habitar  $habitar
     * @return \Illuminate\Http\Response
     */
    public function edit(habitar $habitar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\habitar  $habitar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, habitar $habitar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\habitar  $habitar
     * @return \Illuminate\Http\Response
     */
    public function destroy(habitar $habitar)
    {
        //
    }
}
