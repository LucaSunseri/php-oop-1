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
        return substr($this->overview, 0, 200) . "...";
    }

    public function getFormatDate()
    {
        return date("m-d-Y", strtotime($this->release_date));
    }
}
