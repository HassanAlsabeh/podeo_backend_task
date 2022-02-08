<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PodcastRequest;
use App\Interfaces\PodcastInterface;

class PodcastController extends Controller
{
    protected $podcastInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(PodcastInterface $podcastInterface)
    {
        $this->podcastInterface = $podcastInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->podcastInterface->getAllPodcasts();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PodcastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PodcastRequest $request)
    {
        return $this->podcastInterface->requestPodcast($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->podcastInterface->getPodcastById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PodcastRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PodcastRequest $request, $id)
    {
        return $this->podcastInterface->requestPodcast($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->podcastInterface->deletePodcast($id);
    }
}
