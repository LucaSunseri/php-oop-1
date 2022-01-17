<?php

class Movie
{
    public $title;
    public $overview;
    public $poster_path;
    public $release_date;
    public $vote_average;
    public $link_wiki;

    function __construct($_title)
    {
        $this->title = $_title;
    }

    public function getEditOverview()
    {
        return substr($this->overview, 0, 150) . "...";
    }

    public function getFormatDate()
    {
        return date("d-m-Y", strtotime($this->release_date));
    }

    public function getFormatVote()
    {
        $vote = "&#128525;";

        if ($this->vote_average <= 4) {
            $vote = "&#9785;";
        } elseif ($this->vote_average <= 6) {
            $vote = "&#128578;";
        } elseif ($this->vote_average <= 8) {
            $vote = "&#128522;";
        }

        return $vote;
    }
}
