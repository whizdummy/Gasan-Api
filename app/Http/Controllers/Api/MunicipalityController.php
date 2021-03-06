<?php

namespace Gasan\Http\Controllers\Api;

use Illuminate\Http\Request;

use Gasan\Http\Requests;
use Gasan\Http\Controllers\Controller;

use Gasan\Municipality;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'status'    => 'S',
            'message'   => 'Successfully retrieved',
            'data'      => Municipality::first()
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $municipality = Municipality::find($id);

        if(count($municipality) > 0) {
            if((int) $request->is_mission == 1) {
                $municipality->mission  = $request->mission;
            } else {
                $municipality->vision   = $request->vision;
            }

            $municipality->save();

            $jsonValue = array(
                'status'    => 'S',
                'message'   => 'Successfully updated municipality details',
                'data'      => $municipality
            );
        } else {
            $jsonValue = array(
                'status'    => 'F',
                'message'   => 'Municipality not found',
                'data'      => null
            );
        }

        return response()->json($jsonValue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
