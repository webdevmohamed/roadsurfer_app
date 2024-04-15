<?php

use PHPUnit\Framework\TestCase;

require_once 'app/Utils/DatabaseConnection.php';
require_once 'app/Models/ActivityTypeModel.php';

class ActivityTypeModelTest extends TestCase
{
    /**
     * Test for getAllActivityTypes() method
     */
    public function testGetAllActivityTypes()
    {
        $activityTypeModel = new ActivityTypeModel();
        $activityTypes = $activityTypeModel->getAllActivityTypes();
        foreach ($activityTypes as $activityType) {
            $this->assertInstanceOf(ActivityType::class, $activityType);
        }
    }

    /**
     * Test for doesActivityTypeExists() method
     */
    public function testDoesActivityTypeExists()
    {
        $activityTypeModel = new ActivityTypeModel();
        $this->assertTrue($activityTypeModel->doesActivityTypeExists(1, 'id'));
        $this->assertTrue($activityTypeModel->doesActivityTypeExists('Running', 'name'));
        $this->assertFalse($activityTypeModel->doesActivityTypeExists(1000, 'id'));
        $this->assertFalse($activityTypeModel->doesActivityTypeExists('Boxing', 'name'));
    }

    /**
     * Test for addActivityType() method
     */
    public function testAddActivityType()
    {
        $activityTypeModel = new ActivityTypeModel();
        $this->assertTrue($activityTypeModel->addActivityType('Gym'));
    }
}
