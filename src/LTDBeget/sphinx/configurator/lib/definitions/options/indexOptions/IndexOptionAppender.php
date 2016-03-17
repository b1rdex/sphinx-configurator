<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 6:37 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions;


use LTDBeget\sphinx\configurator\exceptions\NotFoundException;
use LTDBeget\sphinx\configurator\lib\definitions\IndexDefinition;
use LTDBeget\sphinx\configurator\lib\OptionAppender;

/**
 * Class IndexOptionAppender
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\indexOptions
 *
 * @method IndexOption addType(string $value)
 * @method IndexOption addSource(string $value)
 * @method IndexOption addPath(string $value)
 * @method IndexOption addDocinfo(string $value)
 * @method IndexOption addDict(string $value)
 * @method IndexOption addMlock(string $value)
 * @method IndexOption addMorphology(string $value)
 * @method IndexOption addMinStemmingLen(string $value)
 * @method IndexOption addStopwords(string $value)
 * @method IndexOption addWordforms(string $value)
 * @method IndexOption addExceptions(string $value)
 * @method IndexOption addEmbeddedLimit(string $value)
 * @method IndexOption addMinWordLen(string $value)
 * @method IndexOption addIgnoreChars(string $value)
 * @method IndexOption addMinPrefixLen(string $value)
 * @method IndexOption addMinInfixLen(string $value)
 * @method IndexOption addMaxSubstringLen(string $value)
 * @method IndexOption addPrefixFields(string $value)
 * @method IndexOption addInfixFields(string $value)
 * @method IndexOption addExpandKeywords(string $value)
 * @method IndexOption addNgramLen(string $value)
 * @method IndexOption addNgramChars(string $value)
 * @method IndexOption addPhraseBoundary(string $value)
 * @method IndexOption addPhraseBoundaryStep(string $value)
 * @method IndexOption addBlendChars(string $value)
 * @method IndexOption addBlendMode(string $value)
 * @method IndexOption addHtmlStrip(string $value)
 * @method IndexOption addHtmlIndexAttrs(string $value)
 * @method IndexOption addHtmlRemoveElements(string $value)
 * @method IndexOption addPreopen(string $value)
 * @method IndexOption addInplaceEnable(string $value)
 * @method IndexOption addInplaceHitGap(string $value)
 * @method IndexOption addInplaceDocinfoGap(string $value)
 * @method IndexOption addInplaceRelocFactor(string $value)
 * @method IndexOption addInplaceWriteFactor(string $value)
 * @method IndexOption addIndexExactWords(string $value)
 * @method IndexOption addOvershortStep(string $value)
 * @method IndexOption addStopwordStep(string $value)
 * @method IndexOption addHitlessWords(string $value)
 * @method IndexOption addIndexSp(string $value)
 * @method IndexOption addIndexZones(string $value)
 * @method IndexOption addIndexFieldLengths(string $value)
 * @method IndexOption addRegexpFilter(string $value)
 * @method IndexOption addBigramFreqWords(string $value)
 * @method IndexOption addBigramIndex(string $value)
 * @method IndexOption addSnippetsFilePrefix(string $value)
 * @method IndexOption addStopwordsUnstemmed(string $value)
 * @method IndexOption addGlobalIdf(string $value)
 * @method IndexOption addAgent(string $value)
 * @method IndexOption addAgentBlackhole(string $value)
 * @method IndexOption addAgentPersistent(string $value)
 * @method IndexOption addAgentConnectTimeout(string $value)
 * @method IndexOption addAgentQueryTimeout(string $value)
 * @method IndexOption addHaStrategy(string $value)
 * @method IndexOption addRlpContext(string $value)
 * @method IndexOption addRtMemLimit(string $value)
 * @method IndexOption addRtField(string $value)
 * @method IndexOption addRtAttrUint(string $value)
 * @method IndexOption addRtAttrBigint(string $value)
 * @method IndexOption addRtAttrFloat(string $value)
 * @method IndexOption addRtAttrTimestamp(string $value)
 * @method IndexOption addRtAttrString(string $value)
 * @method IndexOption addRtAttrMulti(string $value)
 * @method IndexOption addRtAttrMulti64(string $value)
 * @method IndexOption addRtAttrJson(string $value)
 */
class IndexOptionAppender extends OptionAppender
{
    /**
     * IndexOptionAppender constructor.
     * @param IndexDefinition $indexDefinition
     */
    public function __construct(IndexDefinition $indexDefinition)
    {
        $this->indexDefinition = $indexDefinition;
    }

    /**
     * @param string $methodName
     * @param array $arguments
     * @return IndexOption
     * @throws NotFoundException
     */
    public function __call(string $methodName, array $arguments) : IndexOption
    {
        $optionClass = $this->getOptionClassByMethodName($methodName);
        /**
         * @var IndexOption $option
         */

        $option = new $optionClass($this->getIndex(), $arguments[0]);
        $this->getIndex()->addOption($option);

        return $option;
    }

    /**
     * @var IndexDefinition
     */
    private $indexDefinition;

    /**
     * @return IndexDefinition
     */
    private function getIndex() : IndexDefinition
    {
        return $this->indexDefinition;
    }
}