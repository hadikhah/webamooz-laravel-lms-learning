<?php

namespace Tests\Unit;

use Hadikhah\User\Rules\ValidPassword;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class passwordValidationTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_validation_returns_false_at_password_less_than_6_character()
    {
        $result = (new ValidPassword)->passes('', 'Ka12#');
        $this->assertEquals(0, $result);
    }

    public function test_validation_returns_false_at_password_not_included_signs()
    {
        $result = (new ValidPassword)->passes('', 'asdfA1323');
        $this->assertEquals(0, $result);
    }

    public function test_validation_returns_false_at_password_not_included_capital_character()
    {
        $result = (new ValidPassword)->passes('', '#$cbs123');
        $this->assertEquals(0, $result);
    }

    public function test_validation_returns_false_at_password_not_included_small_character()
    {
        $result = (new ValidPassword)->passes('', '#ASLKJD123');
        $this->assertEquals(0, $result);
    }

    public function test_validation_returns_false_at_password_not_included_digits()
    {
        $result = (new ValidPassword)->passes('', '#alk$&%LKJ');
        $this->assertEquals(0, $result);
    }


}
