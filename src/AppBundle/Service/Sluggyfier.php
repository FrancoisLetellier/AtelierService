<?php
/**
 * Created by PhpStorm.
 * User: topikana
 * Date: 06/06/17
 * Time: 11:08
 */

namespace AppBundle\Service;


class Sluggyfier
{
    private $logger;

    /**
     * @return mixed
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param mixed $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    public function __construct()
    {

    }

    public function slug($text)
    {
        /**
 * Return the slug of a string to be used in a URL.
 *
 * @return String
 */
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicated - symbols
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

    }
