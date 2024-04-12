<?php

class FitnessActivity implements JsonSerializable
{

    private int $id;
    private string $activity_type;
    private string $activity_date;
    private string $name;
    private float $distance;
    private string $distance_unit;
    private string $elapsed_time;


    public function __construct()
    {

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getActivityType(): string
    {
        return $this->activity_type;
    }

    /**
     * @param string $activity_type
     */
    public function setActivityType(string $activity_type): void
    {
        $this->activity_type = $activity_type;
    }

    /**
     * @return string
     */
    public function getActivityDate(): string
    {
        return $this->activity_date;
    }

    /**
     * @param string $activity_date
     */
    public function setActivityDate(string $activity_date): void
    {
        $this->activity_date = $activity_date;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return string
     */
    public function getDistanceUnit(): string
    {
        return $this->distance_unit;
    }

    /**
     * @param string $distance_unit
     */
    public function setDistanceUnit(string $distance_unit): void
    {
        $this->distance_unit = $distance_unit;
    }

    /**
     * @return string
     */
    public function getElapsedTime(): string
    {
        return $this->elapsed_time;
    }

    /**
     * @param string $elapsed_time
     */
    public function setElapsedTime(string $elapsed_time): void
    {
        $this->elapsed_time = $elapsed_time;
    }


    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'activity_type' => $this->activity_type,
            'activity_date' => $this->activity_date,
            'name' => $this->name,
            'distance' => $this->distance,
            'distance_unit' => $this->distance_unit,
            'elapsed_time' => $this->elapsed_time,
        ];
    }
}