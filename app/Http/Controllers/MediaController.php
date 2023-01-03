<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(),[
            'file'=>'required'
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->failed());
        }
        if($request->hasfile('file')) {
            try {

                $fileFormat = $request->file('file')->gettype();
                $extension = $request->file('file')->getClientOriginalExtension();
                $name = time().'_'.$request->file('file')->getClientOriginalName();
                $fileName = substr($name,0,strlen($name)-(strlen($extension)+1));
                $filePath = $request->file('file')->storeAs('news', $name);
           media::create(array_merge($request->all(),
           [
               'filePath'=>$filePath,
               'extension'=>$extension,
               'fileName'=>$fileName,
           ]));
            } catch (\Throwable $th) {
                return response()->json([
                    "error"=>$th
                ], 400);
            }
       }
       else{
        return response()->json($validator->failed(), 400);
       }
    return response()->json([
        'message'=>'file(s) uploaded successfully',
        'file' => $fileName
    ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {

        $media = media::find($id);
        if(!$media)
        {
            return response()->json([
                'message'=>'aucun media correspondant a cet id '
            ]);
        }
        $result = $media->delete;
        return response()->json(
         $result
        );
    }
}
