<?php


class Group {

    private $listOfMembers = [];

    /**
     * Group constructor.
     * @param array $listOfMembers
     */
    public function __construct(array $listOfMembers)
    {
        $this->listOfMembers = $listOfMembers;
    }

}