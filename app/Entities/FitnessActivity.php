<?php

class FitnessActivity
{

    private $id;
    private $activity_type;
    private $activity_date;
    private $name;
    private $distance;
    private $distance_unit;
    private $elapsed_time;


    public function __construct()
    {

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getActivityType()
    {
        return $this->activity_type;
    }

    /**
     * @param mixed $activity_type
     */
    public function setActivityType($activity_type): void
    {
        $this->activity_type = $activity_type;
    }

    /**
     * @return mixed
     */
    public function getActivityDate()
    {
        return $this->activity_date;
    }

    /**
     * @param mixed $activity_date
     */
    public function setActivityDate($activity_date): void
    {
        $this->activity_date = $activity_date;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param mixed $distance
     */
    public function setDistance($distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return mixed
     */
    public function getDistanceUnit()
    {
        return $this->distance_unit;
    }

    /**
     * @param mixed $distance_unit
     */
    public function setDistanceUnit($distance_unit): void
    {
        $this->distance_unit = $distance_unit;
    }

    /**
     * @return mixed
     */
    public function getElapsedTime()
    {
        return $this->elapsed_time;
    }

    /**
     * @param mixed $elapsed_time
     */
    public function setElapsedTime($elapsed_time): void
    {
        $this->elapsed_time = $elapsed_time;
    }




}