<?php
/**
 * @author: Viskov Sergey
 * @date: 3/2/16
 * @time: 5:07 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions;


use LTDBeget\sphinx\configurator\exceptions\NotFoundException;
use LTDBeget\sphinx\configurator\lib\definitions\SourceDefinition;
use LTDBeget\sphinx\configurator\lib\OptionAppender;

/**
 * Class SourceOptionAppender
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions
 *
 * @method SourceOption addType(string $value)
 * @method SourceOption addSqlHost(string $value)
 * @method SourceOption addSqlUser(string $value)
 * @method SourceOption addSqlPass(string $value)
 * @method SourceOption addSqlDb(string $value)
 * @method SourceOption addSqlSock(string $value)
 * @method SourceOption addMysqlConnectFlags(string $value)
 * @method SourceOption addMysqlSslCert(string $value)
 * @method SourceOption addMysqlSslKey(string $value)
 * @method SourceOption addMysqlSslCa(string $value)
 * @method SourceOption addMssqlWinauth(string $value)
 * @method SourceOption addOdbcDsn(string $value)
 * @method SourceOption addSqlQuery(string $value)
 * @method SourceOption addSqlColumnBuffers(string $value)
 * @method SourceOption addSqlQueryPre(string $value)
 * @method SourceOption addSqlJoinedField(string $value)
 * @method SourceOption addSqlFileField(string $value)
 * @method SourceOption addSqlQueryRange(string $value)
 * @method SourceOption addSqlRangeStep(string $value)
 * @method SourceOption addSqlAttrUint(string $value)
 * @method SourceOption addSqlAttrBool(string $value)
 * @method SourceOption addSqlAttrBigint(string $value)
 * @method SourceOption addSqlAttrTimestamp(string $value)
 * @method SourceOption addSqlAttrFloat(string $value)
 * @method SourceOption addSqlAttrMulti(string $value)
 * @method SourceOption addSqlAttrString(string $value)
 * @method SourceOption addSqlAttrJson(string $value)
 * @method SourceOption addSqlFieldString(string $value)
 * @method SourceOption addSqlQueryPost(string $value)
 * @method SourceOption addSqlQueryPostIndex(string $value)
 * @method SourceOption addSqlRangedThrottle(string $value)
 * @method SourceOption addSqlQueryKilllist(string $value)
 * @method SourceOption addUnpackZlib(string $value)
 * @method SourceOption addUnpackMysqlcompress(string $value)
 * @method SourceOption addUnpackMysqlcompressMaxsize(string $value)
 * @method SourceOption addHookConnect(string $value)
 * @method SourceOption addHookQueryRange(string $value)
 * @method SourceOption addHookPostIndex(string $value)
 * @method SourceOption addXmlpipeCommand(string $value)
 * @method SourceOption addXmlpipeField(string $value)
 * @method SourceOption addXmlpipeAttrTimestamp(string $value)
 * @method SourceOption addXmlpipeAttrUint(string $value)
 * @method SourceOption addXmlpipeAttrBool(string $value)
 * @method SourceOption addXmlpipeAttrFloat(string $value)
 * @method SourceOption addXmlpipeAttrBigint(string $value)
 * @method SourceOption addXmlpipeAttrMulti(string $value)
 * @method SourceOption addXmlpipeAttrMulti64(string $value)
 * @method SourceOption addXmlpipeAttrString(string $value)
 * @method SourceOption addXmlpipeAttrJson(string $value)
 * @method SourceOption addXmlpipeFieldString(string $value)
 * @method SourceOption addXmlpipeFixupUtf8(string $value)
 */
class SourceOptionAppender extends OptionAppender
{
    /**
     * @param SourceDefinition $sourceDefinition
     */
    public function __construct(SourceDefinition $sourceDefinition)
    {
        $this->sourceDefinition = $sourceDefinition;
    }

    /**
     * @param string $methodName
     * @param array $arguments
     * @return SourceOption
     * @throws NotFoundException
     */
    public function __call(string $methodName, array $arguments) : SourceOption
    {
        $optionClass = $this->getOptionClassByMethodName($methodName);

        /**
         * @var SourceOption $option
         */
        $option = new $optionClass($this->getSource(), $arguments[0]);
        $this->getSource()->addOption($option);

        return $option;
    }

    /**
     * @var SourceDefinition
     */
    private $sourceDefinition;

    /**
     * @return SourceDefinition
     */
    private function getSource() : SourceDefinition
    {
        return $this->sourceDefinition;
    }
}