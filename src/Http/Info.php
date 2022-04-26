<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 11.02.17
 * Time: 19:12
 */

namespace Domain\Http;


/**
 * All http status codes with format 1XX
 */
interface Info
{
    const HTTP_CONTINUE = 100;
    const HTTP_SWITCHING_PROTOCOLS = 101;
    const HTTP_PROCESSING = 102;            // RFC2518
}