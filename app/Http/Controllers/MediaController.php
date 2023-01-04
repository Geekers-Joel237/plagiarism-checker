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
      /*  $validator = Validator::make($request->all(),[
            'file.*'=>'mimes:txt',
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
      //  return redirect()->route('/user/PointParPoint')->with('success','product create successfully');
       }
    return response()->json([
        'message'=>'file(s) uploaded successfully',
        'file' => $fileName
    ]);*/
   $request->validate([
    'file' => 'required|mimes:csv,txt,xlx,xls,pdf'
   ]);

   $fileModal = new Media;
   if($request->file()){
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        $extension = $request->file('file')->getClientOriginalExtension();

        $fileModel->name = time().'_'.$request->file->getClientOriginalName();
        $fileModel->file_path = '/storage/' . $filePath;
        $fileModel->save();

        return response()->json([
            'message'=>'file(s) uploaded successfully',
            'file' => $fileName
        ]);

       /* return back()
        ->with('success','File has been uploaded.')
        ->with('file', $fileName);*/
   }else{
     return back()
    ->with('error','File has been uploaded.');
   }

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
