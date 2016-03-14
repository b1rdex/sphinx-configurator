<?php
/**
 * @author: Viskov Sergey
 * @date: 3/14/16
 * @time: 3:25 PM
 */

namespace LTDBeget\sphinxConfigurator\helpers;


use Camel\CaseTransformer;
use Camel\Format\CamelCase;
use Camel\Format\FormatInterface;
use Camel\Format\ScreamingSnakeCase;
use Camel\Format\SnakeCase;
use Camel\Format\SpinalCase;
use Camel\Format\StudlyCaps;

final class CaseTransformerHelper
{
    /**
     * @param string $input
     * @return string
     */
    public static function camelCase2SnakeCase(string $input) : string
    {
        $transformerHelper = self::getInstance();
        $from              = $transformerHelper->camelCaseFormat;
        $to                = $transformerHelper->snakeCaseFormat;

        return $transformerHelper->getTransformer($from, $to)->transform($input);
    }

    /**
     * @param string $input
     * @return string
     */
    public static function SnakeCase2UpperCamelCase(string $input) : string
    {
        $transformerHelper = self::getInstance();
        $from              = $transformerHelper->snakeCaseFormat;
        $to                = $transformerHelper->studlyCapsFormat;

        return $transformerHelper->getTransformer($from, $to)->transform($input);
    }

    /**
     * @return CaseTransformerHelper
     */
    private static function getInstance() : CaseTransformerHelper
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * CaseTransformerHelper constructor.
     */
    private function __construct()
    {
        $this->camelCaseFormat          = new CamelCase;
        $this->studlyCapsFormat         = new StudlyCaps;
        $this->snakeCaseFormat          = new SnakeCase;
        $this->screamingSnakeCaseFormat = new ScreamingSnakeCase;
        $this->spinalCaseFormat         = new SpinalCase;
    }

    private function __clone(){}

    /**
     * @param FormatInterface $from
     * @param FormatInterface $to
     * @return CaseTransformer
     */
    private function getTransformer(FormatInterface $from, FormatInterface $to) : CaseTransformer
    {
        $key = $this->getKey($from, $to);
        if(array_key_exists($key, $this->transformers)) {
            return $this->transformers[$key];
        }

        $this->transformers[$key] = new CaseTransformer($from, $to);

        return $this->transformers[$key];
    }

    /**
     * @param FormatInterface $from
     * @param FormatInterface $to
     * @return string
     */
    private function getKey(FormatInterface $from, FormatInterface $to) : string
    {
        $fromFormat = (new \ReflectionClass($from))->getShortName();
        $toFormat = (new \ReflectionClass($to))->getShortName();
        return "{$fromFormat}2{$toFormat}";
    }

    /**
     * @var CamelCase
     */
    private $camelCaseFormat;

    /**
     * @var StudlyCaps
     */
    private $studlyCapsFormat;

    /**
     * @var SnakeCase
     */
    private $snakeCaseFormat;

    /**
     * @var ScreamingSnakeCase
     */
    private $screamingSnakeCaseFormat;

    /**
     * @var SpinalCase
     */
    private $spinalCaseFormat;

    /**
     * @var CaseTransformer[]
     */
    private $transformers = [];

    /**
     * @var CaseTransformerHelper
     */
    private static $instance;
}