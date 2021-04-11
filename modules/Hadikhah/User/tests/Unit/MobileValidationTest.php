<?php

namespace Hadikhah\User\tests\unit;

use Hadikhah\User\Rules\ValidPhone;
use PHPUnit\Framework\TestCase;

class MobileValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_validation_returns_false_at_mobile_less_than_11_digits()
    {
        $result = (new ValidPhone)->passes('', '0920030301');
        $this->assertEquals(0, $result);
    }

    public function test_validation_returns_false_at_mobile_more_than_11_digits()
    {
        $result = (new ValidPhone)->passes('', '091020306666');
        $this->assertEquals(0, $result);
    }

    public function test_validation_returns_true_at_mobile_exact_11_digits_and_start_with_09()
    {
        $result = (new ValidPhone)->passes('', '09171717177');
        $this->assertEquals(1, $result);
    }

    public function test_validation_returns_false_at_mobile_not_started_with_09()
    {
        $result = (new ValidPhone)->passes('', '91717171772');
        $this->assertEquals(0, $result);
    }


}
