<?php

namespace App\Http\Controllers;

use App\FavoriteAttorney;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class AttorneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($attorney_id)
    {

        $client = new Client();
        $response = $client->request(
            'GET',
            config('services.uscca_services.domain') . '/attorneys/' . $attorney_id, [
                'headers' => [
                    'Authorization' => "Bearer " . config('services.uscca_services.access-token'),
                    'Accept'        => 'application/json'
                ]
            ]
        );

        $body     = $response->getBody();
        $contents = $body->getContents();
        $body     = json_decode($contents);

        //dd($body->data);

        if (isset($body->data))
        {
            return view('single-attorney', ['attorney_detail' => $body->data]);
        }
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


    public function favoriteAttorney($attorney_id)
    {
        $user_id = Auth::id();

        $client = new Client();
        $response = $client->request(
            'GET',
            config('services.uscca_services.domain') . '/attorneys/' . $attorney_id, [
                'headers' => [
                    'Authorization' => "Bearer " . config('services.uscca_services.access-token'),
                    'Accept'        => 'application/json'
                ]
            ]
        );

        $body     = $response->getBody();
        $contents = $body->getContents();
        $body     = json_decode($contents);

        //implement check to restrict fav same attorney
        if (isset($body->data))
        {
            $favorite_attorney = new FavoriteAttorney();
            $favorite_attorney->user_id     = $user_id;
            $favorite_attorney->name        = $body->data->firstName . ' ' . $body->data->lastName;
            $favorite_attorney->firm_name   = $body->data->firmName;
            $favorite_attorney->city        = $body->data->city;
            $favorite_attorney->state       = $body->data->state;
            $favorite_attorney->attorney_id = $body->data->sfid;

            $favorite_attorney->save();
        }

        return redirect()->action('AttorneyController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        try {
            $client = new Client();

            $response = $client->request(
                'GET',
                config('services.uscca_services.domain') . '/attorneys', [
                    'headers' => [
                        'Authorization' => "Bearer " . config('services.uscca_services.access-token'),
                        'Accept'        => 'application/json'
                    ]
                ]
            );

            $body     = $response->getBody();
            $contents = $body->getContents();
            $body     = json_decode($contents);

            $user_favorite_attorneys = FavoriteAttorney::where('user_id', $user_id)->get();

            if ( $user_favorite_attorneys->isEmpty())
            {
                $user_favorite_attorneys = '';
            }

            //dd($body->meta->pagination);

            if (isset($body->data))
            {
                return view('attorneys', ['attorneys' => $body->data, 'favorite_attorneys' => $user_favorite_attorneys, 'pagination' => $body->meta->pagination]);
            }
        }
        catch (RequestException $ex) {

            return response()->json([
                'status' => $ex->getMessage()
            ]);
        }
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
}
