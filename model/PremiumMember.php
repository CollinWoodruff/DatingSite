<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 2/16/2019
 * Time: 10:43 PM
 */

class PremiumMember
{
    private  $_inDoorInterests;
    private $_outDoorInterests;

    function __construct($inDoorInterests, $outDoorInterests)
    {
        $this -> inDoorInterests = $inDoorInterests;
        $this -> outDoorInterests = $outDoorInterests;
    }

    function setinDoor($inDoorInterests)
    {
        $this->inDoorInterests = $inDoorInterests;
    }

    function getinDoor()
    {
        return $this->inDoorInterests;
    }

    function setoutDoor($outDoorInterests)
    {
        $this->outDoorInterests = $outDoorInterests;
    }

    function getLName()
    {
        return $this->outDoorInterests;
    }
}