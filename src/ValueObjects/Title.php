<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/23/2017
 * Time: 6:08 AM
 */

namespace Domain\ValueObjects;


/**
 * Class Title
 * @package Domain\ValueObjects
 */
class Title
{
    /**
     * @var
     */
    private $title;

    /**
     * Title constructor.
     * @param $title
     */
    private function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @param $title
     * @return static
     */
    public static function fromString($title)
    {
        return new static($title);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}