<?php

namespace App\Repositories;

use App\Http\Requests\PodcastRequest;
use App\Interfaces\PodcastInterface;
use App\Models\Podcast;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;

class PodcastRepository implements PodcastInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllPodcasts()
    {
        try {
            $podcasts = Podcast::with('episodes')->get();
            return $this->success("All Podcasts", $podcasts);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getPodcastById($id)
    {
        try {
            $podcast = Podcast::with('episodes')->find($id);

            // Check the podcast
            if(!$podcast) return $this->error("No Podcast with ID $id", 404);

            return $this->success("Podcast Detail", $podcast);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestPodcast(PodcastRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If podcast exists when we find it
            // Then update the podcast
            // Else create the new one.
            $podcast = $id ? Podcast::find($id) : new Podcast();

            // Check the podcast
            if($id && !$podcast) return $this->error("No podcast with ID $id", 404);

            $podcast->title = $request->title;
            $podcast->image = $request->image;
            $podcast->description = $request->description;
            // Save the podcast
            $podcast->save();

            DB::commit();
            return $this->success(
                $id ? "Podcast updated"
                    : "Podcast created",
                $podcast, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deletePodcast($id)
    {
        DB::beginTransaction();
        try {
            $podcast = Podcast::find($id);

            // Check the podcast
            if(!$podcast) return $this->error("No podcast with ID $id", 404);

            // Delete the podcast
            $podcast->delete();

            DB::commit();
            return $this->success("Podcast deleted", $podcast);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
