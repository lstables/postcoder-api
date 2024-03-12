<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Keys
        $apiKey = config('services.postcoder.api_key');
        $countryCode = "UK";
        $searchTerm = $request->searchTerm;

        // Prepare URL
        $requestUrl = "https://ws.postcoder.com/pcw/$apiKey/address/$countryCode/" . urlencode($searchTerm);

        $response = Http::withoutVerifying()->get($requestUrl);

        // Check if the request was successful
        if ($response->successful()) {
            $addresses = $response->json();

            if (count($addresses) > 0) {
                foreach ($addresses as $address) {
                    echo($address['summaryline'] . "<br>");
                }
            } else {
                echo "No results";
            }
        } else {

            if ($response->clientError()) {
                echo "Client Error";
            } elseif ($response->serverError()) {
                echo "Server Error";
            } else {
                echo "Request error";
            }
        }
    }
}
