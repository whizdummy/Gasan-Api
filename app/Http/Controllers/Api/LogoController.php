<?php

namespace Gasan\Http\Controllers\Api;

use Illuminate\Http\Request;

use Gasan\Http\Requests;
use Gasan\Http\Controllers\Controller;

use Gasan\Municipality;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipality = Municipality::select(
                'name',
                'image_path'
            )
            ->first();

        if($municipality->image_path != null) {
            $jsonValue = array(
                'status'    => 'S',
                'message'   => 'Image found',
                'data'      => $municipality
            );
        } else {
            $jsonValue = array(
                'status'    => 'F',
                'message'   => 'Image not found',
                'data'      => null
            );
        }

        return response()->json($jsonValue);
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
        $municipality = Municipality::find((int) $request->municipalityID);

        if(count($municipality) > 0) {
            if($request->hasFile('file')) {
                $file = $request->file('file');

                $fileName = 'MUN-' . $request->municipalityID . '.png';

                $file->move(public_path() . '\images\municipalities\\', $fileName);

                $municipality->image_path = $fileName;

                $municipality->save();

                $jsonValue = array(
                    'status'    => 'S',
                    'message'   => 'Image successfully uploaded',
                    'data'      =>  $municipality
                );
            } else {
                $jsonValue = array(
                    'status'    => 'F',
                    'message'   => 'Image not uploaded',
                    'data'      => null
                );
            }
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
        //
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
