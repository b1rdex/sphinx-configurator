<?php
/**
 * @author: Viskov Sergey
 * @date: 3/4/16
 * @time: 7:25 PM
 */

namespace LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions;


use LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\SourceOption;

/**
 * Class OdbcDsn
 *
 * ODBC specific DSN (data source name)
 * mandatory for odbc source type, no default value
 *
 * odbc_dsn        = DBQ=C:\data;DefaultDir=C:\data;Driver={Microsoft Text Driver (*.txt; *.csv)};
 * sql_query        = SELECT id, data FROM documents.csv
 *
 * @package LTDBeget\sphinx\configurator\lib\definitions\options\sourceOptions\concreteOptions
 */
class OdbcDsn extends SourceOption
{
    /**
     * @return bool
     */
    public function validate() : bool
    {
        return true;
    }
}