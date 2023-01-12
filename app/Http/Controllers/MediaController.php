<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Smalot\PdfParser\Parser;

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
      
   /* $validator = Validator::make($request->all(),[
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
    ]);
   

   $fileModal = new Media;*/
  /* if($request->file()){
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        $extension = $request->file('file')->getClientOriginalExtension();

        $fileModal->fileName = time().'_'.$request->file->getClientOriginalName();
        $fileModal->filePath = '/storage/' . $filePath;
        $fileModal->extension = $extension;
        $fileModal->save();

        return back()
        ->with('success','File has been uploaded.');
       
   }else{
     return back()
    ->with('error','File has not been uploaded.');
   }*/
   $file = $request->file;

   $validator = Validator::make($request->all(),[
    'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
   ]);

   $pdfParser = new Parser();
   $pdf = $pdfParser->parseFile($file->path());
   $content = $pdf->getText();

   $fileModal = new Media;
   if($request->file()){
    $fileName = time().'_'.$request->file->getClientOriginalName();
    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
    $extension = $request->file('file')->getClientOriginalExtension();
    
   

    $fileModal->filePath = $filePath;
    $fileModal->fileName = $fileName;
    $fileModal->extension = $extension;

    $fileModal->save();

    return view('user.PointParPoint', compact('content'));

    return back()
    ->with('success','File has been uploaded.');
   }else{
    return back()
    ->with('error','File has not been uploaded.');
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

    public function uploadSource(Request $request){
        
        if ($request->file){
            $file = $request->file;

            $validator = Validator::make($request->all(),[
             'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            ]);
         
            $pdfParser = new Parser();
            $pdf = $pdfParser->parseFile($file->path());
            $content = $pdf->getText();
         
            $fileModal = new Media;

            if($request->file()){
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $extension = $request->file('file')->getClientOriginalExtension();
                
               
            
                $fileModal->filePath = $filePath;
                $fileModal->fileName = $fileName;
                $fileModal->extension = $extension;
            
                $fileModal->save();
            
               // return view('user.PointParPoint', compact('content'));
            
                return back()
                ->with('source', $content);
               }else{
                echo "Error";
               // return view('user.PointParPoint', compact('content2'));
               }

        }else{
          //  echo "Error";
            $content2 = "contenue du second area";
            return back()
            ->with('source2', $content2);
        }
    }

    
}
