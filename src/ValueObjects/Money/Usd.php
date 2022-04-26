<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 12.02.17
 * Time: 07:01
 */

namespace Domain\ValueObjects\Money;


/**
 * Class Usd
 * @package Domain\ValueObjects\Money
 */
final class Usd
{
    /**
     * @var
     */
    const DOLLAR_UNIT = 100;

    /**
     * @var
     */
    private $pennies;

    /**
     * Usd constructor.
     * @param $pennies
     */
    private function __construct($pennies)
    {
        $this->pennies = $pennies;
    }

    /**
     * @param $pennies
     * @return static
     */
    public static function fromPennies($pennies)
    {
        return new static($pennies);
    }

    /**
     * @param $dollars
     * @return static
     */
    public static function fromDollars($dollars)
    {
        return new static($dollars * self::DOLLAR_UNIT);
    }

    /**
     * @return mixed
     */
    public function toPennies()
    {
        return $this->pennies;
    }

    /**
     * @return mixed
     */
    public function toDollars()
    {
        return $this->pennies * self::DOLLAR_UNIT;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return (string) $this->toPennies();
    }
}