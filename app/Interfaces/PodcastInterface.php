<?php

namespace App\Interfaces;

use App\Http\Requests\PodcastRequest;

interface PodcastInterface
{
    /**
     * Get all podcasts
     *
     * @method  GET api/podcasts
     * @access  public
     */
    public function getAllPodcasts();

    /**
     * Get podcast By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/podcasts/{id}
     * @access  public
     */
    public function getPodcastById($id);

    /**
     * Create | Update podcastGET
     *
     * @param   \App\Http\Requests\PodcastRequest    $request
     * @param   integer                           $id
     *
     * @method  POST    api/podcasts       For Create
     * @method  PUT     api/podcasts/{id}  For Update
     * @access  public
     */
    public function requestPodcast(PodcastRequest $request, $id = null);

    /**
     * Delete podcast
     *
     * @param   integer     $id
     *
     * @method  DELETE  api/podcasts/{id}
     * @access  public
     */
    public function deletePodcast($id);
}
