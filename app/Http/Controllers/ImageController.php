<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;



class ImageController extends Controller
{
    public function fetchHealthImages()
    {
        // Replace 'YOUR_ACCESS_KEY' with your actual Unsplash API access key
        $accessKey = '_GYEeJzkKLLxsMAGAo4ItQdnNQMO4yGgzyPhFfkOLQM';
        $apiUrl = 'https://api.unsplash.com/photos/random?query=healthcare&count=5';
 // 'health' is the search query, and 'count' is the number of images to retrieve

        $client = new Client();

        try {
            $response = $client->get($apiUrl, [
                'headers' => [
                    'Authorization' => 'Client-ID ' . $accessKey,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return view('home', ['images' => $data]);
        } catch (\Exception $e) {
            return view('home', ['images' => []]);
        }
    }
}

