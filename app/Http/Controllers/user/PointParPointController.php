<?php

namespace App\Http\Controllers\user;

use App\Http\controllers\Controller;
use App\Models\PointParPoint;
use Illuminate\Http\Request;
use Caxy\HtmlDiff\HtmlDiff;
use Caxy\HtmlDiff\HtmlDiffConfig;




class PointParPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comparison = new \Atomescrochus\StringSimilarities\Compare();

        $oldHtml = 'Testing Plagiarism ABC College for Women is one of the most prestigious institutions of London with a full time enrollment of about 8000 students. The glorious academic values of this oldest premier post-graduate female institution have been shaped by its institutional history, which is spread over a span of 64 years. In January 2002, the University made all strong decisions for the improvement in Higher Education. Established in May 1962 as an Intermediate residential college and affiliated with the University of the Oxford, it was housed in a building on XYZ Road, with strength of 90 students and then the progress flourished with full shot. And College started programs like Electronics, Environmental Science, Fine Arts, Economics and Mass Communication. Various national industries and linkages with foreign Colleges helped a
         lot…';
        $newHtml = 'Since the establishment of ABC College for Women and in early January 2002, the University has tried its level best for improvement in Higher Education. Government did various national industries and linkages with foreign universities MoU with various national industries and linkages with foreign universities have been established in the field of Pharmacy, Electronics, Environmental Science, Fine Arts, Economics and Mass Communication. This is how they made the glorious academic values of this oldest premier post-graduate female institution very nicely';


        // the functions returns similarity percentage between strings
        $jaroWinkler = $comparison->jaroWinkler($oldHtml, $newHtml); // JaroWinkler comparison
        $levenshtein = $comparison->levenshtein($oldHtml, $newHtml); // Levenshtein comparison
        $smg = $comparison->smg($oldHtml, $newHtml); // Smith Waterman Gotoh comparison
        $similar = $comparison->similarText($oldHtml, $newHtml); // Using "similar_text()"
        // die($similar);

        // This next one will return an array containing the results of all working comparison methods
        // plus an array of 'data' that includes the first and second string, and the time in second it took to run all
        // comparison. BE AWARE that comparing long string can results in really long compute time!
        $all = $comparison->all($oldHtml, $newHtml);
        // var_dump($all);

        $htmlDiff = new HtmlDiff($oldHtml, $newHtml);
        // Set some of the configuration options.
        // $htmlDiff->getConfig()
        // ->setMatchThreshold(80)
        // ->setInsertSpaceInReplace(true)
        // ;

        $config = new HtmlDiffConfig();
    $config
    // Percentage required for list items to be considered a match.
    ->setMatchThreshold(80)

    // Set the encoding of the text to be diffed.
    ->setEncoding('UTF-8')

    // If true, a space will be added between the <del> and <ins> tags of text that was replaced.
    ->setInsertSpaceInReplace(false)

    // Option to disable the new Table Diffing feature and treat tables as regular text.
    ->setUseTableDiffing(true)

    // Pass an instance of \Doctrine\Common\Cache\Cache to cache the calculated diffs.
    ->setCacheProvider(null)

    // Disable the HTML purifier (only do this if you known what you're doing)
    // This bundle heavily relies on the purified input from ezyang/htmlpurifier
    ->setPurifierEnabled(true)

    // Set the cache directory that HTMLPurifier should use.
    ->setPurifierCacheLocation(null)

    // Group consecutive deletions and insertions instead of showing a deletion and insertion for each word individually.
    ->setGroupDiffs(true)

    // List of characters to consider part of a single word when in the middle of text.
    ->setSpecialCaseChars(array('.', ',', '(', ')', '\''));
/*
    // List of tags (and their replacement strings) to be diffed in isolation.
    ->setIsolatedDiffTags(array(
        'ol'     => '[[REPLACE_ORDERED_LIST]]',
        'ul'     => '[[REPLACE_UNORDERED_LIST]]',
        'sub'    => '[[REPLACE_SUB_SCRIPT]]',
        'sup'    => '[[REPLACE_SUPER_SCRIPT]]',
        'dl'     => '[[REPLACE_DEFINITION_LIST]]',
        'table'  => '[[REPLACE_TABLE]]',
        'strong' => '[[REPLACE_STRONG]]',
        'b'      => '[[REPLACE_B]]',
        'em'     => '[[REPLACE_EM]]',
        'i'      => '[[REPLACE_I]]',
        'a'      => '[[REPLACE_A]]',
    ))*/

    // Sets whether newline characters are kept or removed when `$htmlDiff->build()` is called.
    // For example, if your content includes <pre> tags, you might want to set this to true.
    // ->setKeepNewLines(false);


        // $content = $htmlDiff->build();

        // Create an HtmlDiff object with the custom configuration.
$firstHtmlDiff = HtmlDiff::create($oldHtml, $newHtml, $config);
$firstContent = $firstHtmlDiff->build();

// $secondHtmlDiff = HtmlDiff::create($oldHtml2, $newHtml2, $config);
// $secondHtmlDiff->getConfig()->setMatchThreshold(50);

// $secondContent = $secondHtmlDiff->build();

        // die($content);
        return view('user.PointParPoint',compact(
            'oldHtml',
            'newHtml',
            'firstContent',
            'all'
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
     * @param  \App\Models\PointParPoint  $pointParPoint
     * @return \Illuminate\Http\Response
     */
    public function show(PointParPoint $pointParPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointParPoint  $pointParPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(PointParPoint $pointParPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointParPoint  $pointParPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointParPoint $pointParPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointParPoint  $pointParPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointParPoint $pointParPoint)
    {
        //
    }

    
 
// Display text content 

      
    
}
