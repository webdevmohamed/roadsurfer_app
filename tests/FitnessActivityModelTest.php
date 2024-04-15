<?php

use PHPUnit\Framework\TestCase;

require_once 'app/Utils/DatabaseConnection.php';
require_once 'app/Models/FitnessActivityModel.php';

class FitnessActivityModelTest extends TestCase
{

    /**
     * Test for getAllFitnessActivities() method
     */
    public function testGetAllFitnessActivities()
    {
        $activityModel = new FitnessActivityModel();
        $activities = $activityModel->getAllFitnessActivities();
        foreach ($activities as $activity) {
            $this->assertInstanceOf(FitnessActivity::class, $activity);
        }
    }

    /**
     * Test for getActivitiesByTypeId($typeId) method
     */
    public function testGetActivitiesByTypeId()
    {
        $activityModel = new FitnessActivityModel();
        $activities = $activityModel->getActivitiesByTypeId(1);
        foreach ($activities as $activity) {
            $this->assertInstanceOf(FitnessActivity::class, $activity);
        }
    }

    /**
     * Test for getDistanceAccumulatedByTypeId($typeId) method
     */
    public function testGetDistanceAccumulatedByTypeId()
    {
        $activityModel = new FitnessActivityModel();
        $distanceAccumulated = $activityModel->getDistanceAccumulatedByTypeId(1);
        $this->assertIsNumeric($distanceAccumulated);
    }

    /**
     * Test for getTotalElapsedTimeByTypeId($typeId) method
     */
    public function testGetTotalElapsedTimeByTypeId()
    {
        $activityModel = new FitnessActivityModel();
        $totalElapsedTime = $activityModel->getTotalElapsedTimeByTypeId(1);
        $this->assertIsString($totalElapsedTime);
    }

    /**
     * Test for addFitnessActivity($fitnessActivity) method
     */
    public function testAddFitnessActivity()
    {
        $activityModel = new FitnessActivityModel();
        $fitnessActivity = new FitnessActivity();
        $fitnessActivity->setActivityType(2);
        $fitnessActivity->setActivityDate('2024-04-14');
        $fitnessActivity->setName('Morning Run');
        $fitnessActivity->setDistance(5.2);
        $fitnessActivity->setDistanceUnit('km');
        $fitnessActivity->setElapsedTime('00:30:00');
        $this->assertTrue($activityModel->addFitnessActivity($fitnessActivity));
    }
}
