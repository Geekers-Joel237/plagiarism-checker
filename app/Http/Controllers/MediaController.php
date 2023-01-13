<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Smalot\PdfParser\Parser;
use Caxy\HtmlDiff\HtmlDiff;
use Caxy\HtmlDiff\HtmlDiffConfig;

class MediaController extends Controller
{
    public $contenueFile1;
    public $contenueFile2;

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
   $contenueFile1 = $content;


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
        
       $content;
       $content2 = "contenue 2";
       
        if ($request->file){
            $file = $request->file;

            $validator = Validator::make($request->all(),[
             'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            ]);
         
            $pdfParser = new \Smalot\PdfParser\Parser();
            $pdf = $pdfParser->parseFile($file->path());
            $content = $pdf->getText();
            $this->contenueFile1 = $content;
           
         
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

               if($request->file2){

                $file2 = $request->file2;


                $pdfParser2 = new \Smalot\PdfParser\Parser();
                $pdf2 = $pdfParser2->parseFile($file2->path());
                $content2 = $pdf2->getText();
                $this->contenueFile2 = $content2;

                return back()
                ->with('source', $content)
                ->with('source2', $content2);
               }
            
                
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

    public function traitement(Request $request){
      
        
        //dd($request->content1);
        $content1 = $request->content1;
        $content2 = $request->content2;
        if(!isset($request->content1) || !isset($request->content2)){
            return back()->with('error','aucun ficher uploader');
        }

        $htmlDiff = new HtmlDiff($content1, $content2);
        $htmlDiff->getConfig()
                ->setMatchThreshold(80)
                ->setInsertSpaceInReplace(true);

        $content = $htmlDiff->build();

        $comparison = new \Atomescrochus\StringSimilarities\Compare();
        $similar = $comparison->similarText($content1, $content2); 
      //  dd($request->content2);
        return view ('user.traitement',compact('content1', 'content2','content','similar'));
        //faire compariason
       //9 return view('user.traitement', compact('fileText1', 'fileText2'));
       

    }

    
}
