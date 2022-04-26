<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 11.02.17
 * Time: 19:12
 */

namespace Domain\Http;


/**
 * All http status codes with format 3XX
 */
interface Redirection
{
    const HTTP_MULTIPLE_CHOICES = 300;
    const HTTP_MOVED_PERMANENTLY = 301;
    const HTTP_FOUND = 302;
    const HTTP_SEE_OTHER = 303;
    const HTTP_NOT_MODIFIED = 304;
    const HTTP_USE_PROXY = 305;
    const HTTP_RESERVED = 306;
    const HTTP_TEMPORARY_REDIRECT = 307;
    const HTTP_PERMANENTLY_REDIRECT = 308;  // RFC7238
}