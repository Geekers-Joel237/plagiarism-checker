<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $comparison = new \Atomescrochus\StringSimilarities\Compare();

        // $firstString = 'Testing Plagiarism ABC College for Women is one of the most prestigious institutions of London with a full time enrollment of about 8000 students. The glorious academic values of this oldest premier post-graduate female institution have been shaped by its institutional history, which is spread over a span of 64 years. In January 2002, the University made all strong decisions for the improvement in Higher Education. Established in May 1962 as an Intermediate residential college and affiliated with the University of the Oxford, it was housed in a building on XYZ Road, with strength of 90 students and then the progress flourished with full shot. And College started programs like Electronics, Environmental Science, Fine Arts, Economics and Mass Communication. Various national industries and linkages with foreign Colleges helped a lot…';
        // $secondString = 'Since the establishment of ABC College for Women and in early January 2002, the University has tried its level best for improvement in Higher Education. Government did various national industries and linkages with foreign universities MoU with various national industries and linkages with foreign universities have been established in the field of Pharmacy, Electronics, Environmental Science, Fine Arts, Economics and Mass Communication. This is how they made the glorious academic values of this oldest premier post-graduate female institution very nicely';
        // // the functions returns similarity percentage between strings
        // $jaroWinkler = $comparison->jaroWinkler($firstString, $secondString); // JaroWinkler comparison
        // $levenshtein = $comparison->levenshtein($firstString, $secondString); // Levenshtein comparison
        // $smg = $comparison->smg($firstString, $secondString); // Smith Waterman Gotoh comparison
        // $similar = $comparison->similarText($firstString, $secondString); // Using "similar_text()"
        // die($similar);

        // // This next one will return an array containing the results of all working comparison methods
        // // plus an array of 'data' that includes the first and second string, and the time in second it took to run all
        // // comparison. BE AWARE that comparing long string can results in really long compute time!
        // $all = $comparison->all($firstString, $secondString);
        // var_dump($all);
        return \view('user.dashboard');

        // Compare string line by line
        // $diff = Diff::compare("hello\na", "hello\nasd\na");
        // Outputs span, ins, del HTML tags, depend if entry
        // is unmodified, inserted or deleted
        // echo $diff->toHTML();
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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
