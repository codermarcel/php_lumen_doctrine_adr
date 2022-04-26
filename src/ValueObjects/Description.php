<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/23/2017
 * Time: 6:10 AM
 */

namespace Domain\ValueObjects;

/**
 * Class Title
 * @package Domain\ValueObjects
 */
class Description
{
    /**
     * @var
     */
    private $description;

    /**
     * Title constructor.
     * @param $title
     */
    private function __construct($description)
    {
        $this->description = $description;
    }

    /**
     * @param $title
     * @return static
     */
    public static function fromString($description)
    {
        return new static($description);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->description;
    }
}