<?php
/**
 * automatically generated from sphinx documentation
 */

namespace LTDBeget\sphinx\enums\options;


use LTDBeget\sphinx\enums\base\eOption;

/**
 * Class eSourceOption
 * @package LTDBeget\sphinx\informer\enums\options
 *
 * @method static eSourceOption UNPACK_MYSQLCOMPRESS_MAXSIZE()
 * @method static eSourceOption UNPACK_MYSQLCOMPRESS()
 * @method static eSourceOption UNPACK_ZLIB()
 * @method static eSourceOption MSSQL_UNICODE()
 * @method static eSourceOption MSSQL_WINAUTH()
 * @method static eSourceOption XMLPIPE_FIXUP_UTF8()
 * @method static eSourceOption XMLPIPE_ATTR_JSON()
 * @method static eSourceOption XMLPIPE_ATTR_WORDCOUNT()
 * @method static eSourceOption XMLPIPE_ATTR_STRING()
 * @method static eSourceOption XMLPIPE_ATTR_MULTI_64()
 * @method static eSourceOption XMLPIPE_ATTR_MULTI()
 * @method static eSourceOption XMLPIPE_ATTR_FLOAT()
 * @method static eSourceOption XMLPIPE_ATTR_STR2ORDINAL()
 * @method static eSourceOption XMLPIPE_ATTR_TIMESTAMP()
 * @method static eSourceOption XMLPIPE_ATTR_BOOL()
 * @method static eSourceOption XMLPIPE_ATTR_BIGINT()
 * @method static eSourceOption XMLPIPE_ATTR_UINT()
 * @method static eSourceOption XMLPIPE_FIELD_WORDCOUNT()
 * @method static eSourceOption XMLPIPE_FIELD_STRING()
 * @method static eSourceOption XMLPIPE_FIELD()
 * @method static eSourceOption XMLPIPE_COMMAND()
 * @method static eSourceOption SQL_QUERY_INFO()
 * @method static eSourceOption SQL_RANGED_THROTTLE()
 * @method static eSourceOption SQL_QUERY_POST_INDEX()
 * @method static eSourceOption SQL_QUERY_POST()
 * @method static eSourceOption SQL_FILE_FIELD()
 * @method static eSourceOption SQL_FIELD_STR2WORDCOUNT()
 * @method static eSourceOption SQL_FIELD_STRING()
 * @method static eSourceOption SQL_COLUMN_BUFFERS()
 * @method static eSourceOption SQL_ATTR_STR2WORDCOUNT()
 * @method static eSourceOption SQL_ATTR_JSON()
 * @method static eSourceOption SQL_ATTR_STRING()
 * @method static eSourceOption SQL_ATTR_MULTI()
 * @method static eSourceOption SQL_ATTR_FLOAT()
 * @method static eSourceOption SQL_ATTR_STR2ORDINAL()
 * @method static eSourceOption SQL_ATTR_TIMESTAMP()
 * @method static eSourceOption SQL_ATTR_BIGINT()
 * @method static eSourceOption SQL_ATTR_BOOL()
 * @method static eSourceOption SQL_ATTR_UINT()
 * @method static eSourceOption SQL_QUERY_KILLLIST()
 * @method static eSourceOption SQL_RANGE_STEP()
 * @method static eSourceOption SQL_QUERY_RANGE()
 * @method static eSourceOption SQL_JOINED_FIELD()
 * @method static eSourceOption SQL_QUERY()
 * @method static eSourceOption SQL_QUERY_PRE()
 * @method static eSourceOption ODBC_DSN()
 * @method static eSourceOption MYSQL_SSL_CERT()
 * @method static eSourceOption MYSQL_SSL_KEY()
 * @method static eSourceOption MYSQL_SSL_CA()
 * @method static eSourceOption MYSQL_CONNECT_FLAGS()
 * @method static eSourceOption ON_JSON_ATTR_ERROR()
 * @method static eSourceOption JSON_AUTOCONV_KEYNAMES()
 * @method static eSourceOption JSON_AUTOCONV_NUMBERS()
 * @method static eSourceOption SQL_SOCK()
 * @method static eSourceOption SQL_DB()
 * @method static eSourceOption SQL_PASS()
 * @method static eSourceOption SQL_USER()
 * @method static eSourceOption SQL_PORT()
 * @method static eSourceOption SQL_HOST()
 * @method static eSourceOption TYPE()
 * @method static eSourceOption CSVPIPE_DELIMITER()
 */
final class eSourceOption extends eOption
{
    const UNPACK_MYSQLCOMPRESS_MAXSIZE = 'unpack_mysqlcompress_maxsize';
    const UNPACK_MYSQLCOMPRESS         = 'unpack_mysqlcompress';
    const UNPACK_ZLIB                  = 'unpack_zlib';
    const MSSQL_UNICODE                = 'mssql_unicode';
    const MSSQL_WINAUTH                = 'mssql_winauth';
    const XMLPIPE_FIXUP_UTF8           = 'xmlpipe_fixup_utf8';
    const XMLPIPE_ATTR_JSON            = 'xmlpipe_attr_json';
    const XMLPIPE_ATTR_WORDCOUNT       = 'xmlpipe_attr_wordcount';
    const XMLPIPE_ATTR_STRING          = 'xmlpipe_attr_string';
    const XMLPIPE_ATTR_MULTI_64        = 'xmlpipe_attr_multi_64';
    const XMLPIPE_ATTR_MULTI           = 'xmlpipe_attr_multi';
    const XMLPIPE_ATTR_FLOAT           = 'xmlpipe_attr_float';
    const XMLPIPE_ATTR_STR2ORDINAL     = 'xmlpipe_attr_str2ordinal';
    const XMLPIPE_ATTR_TIMESTAMP       = 'xmlpipe_attr_timestamp';
    const XMLPIPE_ATTR_BOOL            = 'xmlpipe_attr_bool';
    const XMLPIPE_ATTR_BIGINT          = 'xmlpipe_attr_bigint';
    const XMLPIPE_ATTR_UINT            = 'xmlpipe_attr_uint';
    const XMLPIPE_FIELD_WORDCOUNT      = 'xmlpipe_field_wordcount';
    const XMLPIPE_FIELD_STRING         = 'xmlpipe_field_string';
    const XMLPIPE_FIELD                = 'xmlpipe_field';
    const XMLPIPE_COMMAND              = 'xmlpipe_command';
    const SQL_QUERY_INFO               = 'sql_query_info';
    const SQL_RANGED_THROTTLE          = 'sql_ranged_throttle';
    const SQL_QUERY_POST_INDEX         = 'sql_query_post_index';
    const SQL_QUERY_POST               = 'sql_query_post';
    const SQL_FILE_FIELD               = 'sql_file_field';
    const SQL_FIELD_STR2WORDCOUNT      = 'sql_field_str2wordcount';
    const SQL_FIELD_STRING             = 'sql_field_string';
    const SQL_COLUMN_BUFFERS           = 'sql_column_buffers';
    const SQL_ATTR_STR2WORDCOUNT       = 'sql_attr_str2wordcount';
    const SQL_ATTR_JSON                = 'sql_attr_json';
    const SQL_ATTR_STRING              = 'sql_attr_string';
    const SQL_ATTR_MULTI               = 'sql_attr_multi';
    const SQL_ATTR_FLOAT               = 'sql_attr_float';
    const SQL_ATTR_STR2ORDINAL         = 'sql_attr_str2ordinal';
    const SQL_ATTR_TIMESTAMP           = 'sql_attr_timestamp';
    const SQL_ATTR_BIGINT              = 'sql_attr_bigint';
    const SQL_ATTR_BOOL                = 'sql_attr_bool';
    const SQL_ATTR_UINT                = 'sql_attr_uint';
    const SQL_QUERY_KILLLIST           = 'sql_query_killlist';
    const SQL_RANGE_STEP               = 'sql_range_step';
    const SQL_QUERY_RANGE              = 'sql_query_range';
    const SQL_JOINED_FIELD             = 'sql_joined_field';
    const SQL_QUERY                    = 'sql_query';
    const SQL_QUERY_PRE                = 'sql_query_pre';
    const ODBC_DSN                     = 'odbc_dsn';
    const MYSQL_SSL_CERT               = 'mysql_ssl_cert';
    const MYSQL_SSL_KEY                = 'mysql_ssl_key';
    const MYSQL_SSL_CA                 = 'mysql_ssl_ca';
    const MYSQL_CONNECT_FLAGS          = 'mysql_connect_flags';
    const ON_JSON_ATTR_ERROR           = 'on_json_attr_error';
    const JSON_AUTOCONV_KEYNAMES       = 'json_autoconv_keynames';
    const JSON_AUTOCONV_NUMBERS        = 'json_autoconv_numbers';
    const SQL_SOCK                     = 'sql_sock';
    const SQL_DB                       = 'sql_db';
    const SQL_PASS                     = 'sql_pass';
    const SQL_USER                     = 'sql_user';
    const SQL_PORT                     = 'sql_port';
    const SQL_HOST                     = 'sql_host';
    const TYPE                         = 'type';
    const CSVPIPE_DELIMITER            = 'csvpipe_delimiter';
}