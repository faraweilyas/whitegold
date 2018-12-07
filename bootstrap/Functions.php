<?php

/**
* Authenticate URL parameter by replacing '/' character with '-'
* @param string $urlParameter
* @return string
*/
function authUrl (string $urlParameter) : string
{
    return str_replace("/", "-", $urlParameter);
}

/**
* Reverse URL parameter by replacing '-' character '/' back to raw value
* @param string $urlParameter
* @return string
*/
function rawUrl (string $urlParameter) : string
{
    return str_replace("-", "/", $urlParameter);
}

/**
* Replace newline with br tag
* @param string $text
* @return string
*/
function replaceNl2Br (string $text="") : string
{
    return str_replace(["\r\n", "\r", "\n"], '<br />', $text);
}

/**
* Formats a given number
* @param mixed $number
* @param bool $round
* @return string
*/
function formatNumber ($number, bool $round=FALSE) : string
{
    if (empty($number)) return "";
    if (!$round)
        return number_format($number, 2, '.', ',');
    else
        return stripper(number_format($number, 2, '.', ','), 3);
}

/**
* Formats a given digit
* @param mixed $digit
* @param bool $round
* @param mixed $prefix
* @return string
*/
function formatDigit ($digit, bool $round=FALSE, $prefix="&#8358;") : string
{
    if (empty($digit)) return "";
    if (!$round)
        return $prefix.number_format($digit, 2, '.', ',');
    else
        return stripper($prefix.number_format($digit, 2, '.', ','), 3);
}

/**
* Removes some part of a given string starting from the end
* @param string $value
* @param int $length
* @return string
*/
function stripper (string $value, int $length=1) : string
{
    $valueLength = strlen(trim($value));
    return substr($value, 0, $valueLength - $length);
}

/**
* Shortens parsed content and appends "..." at the end of the content indicating it was shortened.
* @param string $content
* @param int $fixedLength
* @return string
*/
function shortenContent (string $content, int $fixedLength) : string
{
    $content = trim($content);
    if (strlen($content) < $fixedLength) return $content;
    return trim(substr($content, 0, $fixedLength - 3))."...";        
}

/**
* Remove invalid Characters from given value
* @param array $invalidChars
* @param mixed $value
* @return mixed
*/
function removeInvalidChar (array $invalidChars, $value)
{
    foreach ($invalidChars as $invalidChar):
        $value = str_replace($invalidChar, "", $value);
    endforeach;
    return $value;
}
