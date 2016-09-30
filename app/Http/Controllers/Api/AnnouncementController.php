<?php

namespace Gasan\Http\Controllers\Api;

use Illuminate\Http\Request;

use Gasan\Http\Requests;
use Gasan\Http\Controllers\Controller;

use Gasan\Announcement;

class AnnouncementController extends Controller
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
            'data'      => $this->getAnnouncementQuery('index', null)
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
        $announcement = Announcement::create(array(
            'municipality_id'   => 1,
            'title'             => $request->title,
            'description'       => $request->description,
            'duration'          => $request->duration,
            'is_lapsed'         => 0
        ));

        return response()->json(array(
            'status'    => 'S',
            'message'   => 'Successfully created',
            'data'      => $announcement
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(array(
            'status'    => 'S',
            'message'   => 'Successfully retrieved',
            'data'      => $this->getAnnouncementQuery('show', $id)
        ));
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
        $announcement = Announcement::find($id);

        $announcement->title        = $request->title;
        $announcement->description  = $request->description;
        $announcement->duration     = $request->duration;
        $announcement->is_lapsed    = 0;

        $announcement->save();

        return response()->json(array(
            'status'    => 'S',
            'message'   => 'Successfully updated',
            'data'      => null
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);

        $announcement->delete();

        return response()->json(array(
            'status'    => 'S',
            'message'   => 'Successfully deleted',
            'data'      => null
        ));
    }

    function getAnnouncementQuery($queryType, $id) {
        $query = Announcement::select(
            'id',
            'municipality_id',
            'title',
            'description',
            'duration'
        )
        ->where(
            'is_lapsed',
            '=',
            0
        );

        switch ($queryType) {
            case 'index':
                $queryResult = $query->get();
                break;
            
            case 'show':
                $queryResult = $query->where(
                    'id',
                    '=',
                    $id
                )
                ->first();
                break;

            default:
                break;
        }

        return $queryResult;
    }
}
