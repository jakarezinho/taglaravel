<?php

namespace App\Http\Controllers;

use App\Models\habitar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;




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
            ->select(['habitars.*', 'users.name', 'users.profile_photo_path', DB::raw('COUNT(votes.id) as likes')])

            ->leftJoin('users', 'users.id', '=', 'habitars.user_id')
            ->leftJoin('votes', function ($join) {
                $join->on('habitars.id', '=', 'votes.habitars_id')
                    ->where('votes.action', '=', 'like');
            })->groupBy('habitars.id')
            ->orderBy('habitars.id','desc')
            ->limit(24)
            ->get();


        return response()->json(['data' => $locais]);
    }

    

    /**
     * get tags by distance lat lng 
     * @return \Illuminate\Http\Response
     */
    public function avolta($lat, $lng, $distance)
    {


        $locais = DB::table('habitars')
            ->selectRaw('users.name, users.profile_photo_path,habitars.*, ( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) AS distance,COUNT(votes.id) as likes', [$lat, $lng, $lat])
            ->leftJoin('users', 'users.id', '=', 'habitars.user_id')
            ->leftJoin('votes', function ($join) {
                $join->on('habitars.id', '=', 'votes.habitars_id')
                    ->where('votes.action', '=', 'like');
            })
            ->havingRaw('distance < ?', [$distance])
            ->groupBy('habitars.id')
            ->orderBy('distance')
            ->get();


        return response()->json(['data' => $locais]);
    }

    /**
     * 
     * tags for dislikes
     * @return \Illuminate\Http\Response
     */
    public function tagsdislikes()
    {
        $dislike = DB::table('habitars')
            ->select(['habitars.*', DB::raw('COUNT(votes.id) as dislikes')])

            ->leftJoin('votes', function ($join) {
                $join->on('habitars.id', '=', 'votes.habitars_id')
                    ->where('votes.action', '=', 'dislike');
            })->groupBy('habitars.id')
            ->get();

        return response()->json(['data' => $dislike]);
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
            'emoji' => $request['emoji'],
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
        if (Auth()->user()->id == $habitar->user_id || Gate::authorize('manage-users')) {
            return $habitar->delete();
        } else {
            return route('/map');
        }
    }
}
