<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Caxy\HtmlDiff\HtmlDiff;
use Caxy\HtmlDiff\HtmlDiffConfig;
use \NumberFormatter;

class PlagiatEnLigneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.Enligne');
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
        $file = $request->file;
        $validator = Validator::make($request->all(),[
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
        ]);

        $pdfParser = new \Smalot\PdfParser\Parser();
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

          return back()
          ->with('source',$content);
        }

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

    public function traitementEnligne(Request $request){
        $media = Media::all();
        $arrayPath = array();

        $arrayMaxPlagiat = array();
        $arrayPlagiat = [
            "path_cible"=>"",
            "path_source"=>"",
            "content"=> "",
            "pourcentage"=> 0,
            "diff"=>""

        ];

        foreach ($media as $file){
          array_push($arrayPath, $file->filePath);
        }

        //element de comparaison
        $comparison = new \Atomescrochus\StringSimilarities\Compare();

        //element de recuparation
        $pdfParser = new \Smalot\PdfParser\Parser();
        $content ;
        //element de difference
        $diff ;
        foreach ($arrayPath as $path){
            //calcul de comparaison
            $pdf = $pdfParser->parseFile("storage/".$path);
            $content = $pdf->getText();
            $similar = $comparison->similarText($request->content, $content);
            $similar = number_format((float)$similar, 2, '.', '');
            // $formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
            // $similar =  $formatter->format($similar);
            //difference
            $htmlDiff = new HtmlDiff($request->content, $content);
            $htmlDiff->getConfig()
                     ->setMatchThreshold(80)
                     ->setInsertSpaceInReplace(true);
            $diff =$htmlDiff->build();
            //rempliage de l'array de comparaison
            $arrayPlagiat["pourcentage"] = $similar;
            $arrayPlagiat["content"] = $content;
            $arrayPlagiat["diff"] = $diff;
            $arrayPlagiat["path_cible"] = $path;
            // $arrayPlagiat["path_source"] = $diff;
            //remplisage array max palgiat
            for($i = 0 ; $i <= count($arrayMaxPlagiat); $i++){
                if(count($arrayMaxPlagiat)<5){
                    array_push($arrayMaxPlagiat,$arrayPlagiat);
                }else{
                    $small = $arrayMaxPlagiat[0]["pourcentage"];
                    $position;
                    for($j=1 ; $j < count($arrayMaxPlagiat);$j++){
                        if($small >= $arrayMaxPlagiat[$j]["pourcentage"]){
                            $small = $arrayMaxPlagiat[$j]["pourcentage"];
                            $position = $j;
                        }
                    }

                    $arrayMaxPlagiat[$position] = $arrayPlagiat;
                }
            }
        }

        return \view('user.records',\compact(
            'arrayMaxPlagiat'
        ));
        // dd($arrayMaxPlagiat);



    }
}
