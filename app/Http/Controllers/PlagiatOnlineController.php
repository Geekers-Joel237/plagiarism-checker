<?php
namespace App\Http\Controllers;



use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Psr\Http\Client\ClientExceptionInterface;

class PlagiatOnlineController extends Controller
{

    /**
     * @throws GuzzleException
     * @throws ClientExceptionInterface
     */
    public function check_plagiat()
    {
        try {
            $client = new Client();
            $headers = [
                'Content-Type' => 'application/json',
                'X-RapidAPI-Key' => '941fda43f1msh261969b320772a8p14ff81jsn42829015de4a',
                'X-RapidAPI-Host' => 'plagiarism-checker-and-auto-citation-generator-multi-lingual.p.rapidapi.com'
            ];
            $body = '{
              "text": "A text can be any example of written or spoken language, from something as complex as a book or legal document to something as simple as the",
              "language": "en",
              "includeCitations": false,
              "scrapeSources": false
            }';
            $request = new Request('POST', 'https://plagiarism-checker-and-auto-citation-generator-multi-lingual.p.rapidapi.com/plagiarism', $headers, $body);
            $res = $client->sendAsync($request)->wait();
            return json_decode($res->getBody());


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
