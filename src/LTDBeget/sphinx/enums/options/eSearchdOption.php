<?php
/**
 * automatically generated from sphinx documentation
 */

namespace LTDBeget\sphinx\enums\options;


use LTDBeget\sphinx\enums\base\eOption;

/**
 * Class eSearchdOption
 * @package LTDBeget\sphinx\informer\enums\options
 *
 * @method static eSearchdOption PREDICTED_TIME_COSTS()
 * @method static eSearchdOption RT_MERGE_MAXIOSIZE()
 * @method static eSearchdOption RT_MERGE_IOPS()
 * @method static eSearchdOption PERSISTENT_CONNECTIONS_LIMIT()
 * @method static eSearchdOption HA_PERIOD_KARMA()
 * @method static eSearchdOption HA_PING_INTERVAL()
 * @method static eSearchdOption SPHINXQL_STATE()
 * @method static eSearchdOption PREFORK_ROTATION_THROTTLE()
 * @method static eSearchdOption WATCHDOG()
 * @method static eSearchdOption COMPAT_SPHINXQL_MAGICS()
 * @method static eSearchdOption EXPANSION_LIMIT()
 * @method static eSearchdOption THREAD_STACK()
 * @method static eSearchdOption RT_FLUSH_PERIOD()
 * @method static eSearchdOption MYSQL_VERSION_STRING()
 * @method static eSearchdOption PLUGIN_DIR()
 * @method static eSearchdOption COLLATION_LIBC_LOCALE()
 * @method static eSearchdOption COLLATION_SERVER()
 * @method static eSearchdOption SNIPPETS_FILE_PREFIX()
 * @method static eSearchdOption BINLOG_MAX_LOG_SIZE()
 * @method static eSearchdOption BINLOG_FLUSH()
 * @method static eSearchdOption BINLOG_PATH()
 * @method static eSearchdOption DIST_THREADS()
 * @method static eSearchdOption WORKERS()
 * @method static eSearchdOption SUBTREE_HITS_CACHE()
 * @method static eSearchdOption SUBTREE_DOCS_CACHE()
 * @method static eSearchdOption MAX_BATCH_QUERIES()
 * @method static eSearchdOption READ_UNHINTED()
 * @method static eSearchdOption READ_BUFFER()
 * @method static eSearchdOption LISTEN_BACKLOG()
 * @method static eSearchdOption MAX_FILTER_VALUES()
 * @method static eSearchdOption MAX_FILTERS()
 * @method static eSearchdOption CRASH_LOG_PATH()
 * @method static eSearchdOption MVA_UPDATES_POOL()
 * @method static eSearchdOption MAX_PACKET_SIZE()
 * @method static eSearchdOption ONDISK_DICT_DEFAULT()
 * @method static eSearchdOption ATTR_FLUSH_PERIOD()
 * @method static eSearchdOption UNLINK_OLD()
 * @method static eSearchdOption PREOPEN_INDEXES()
 * @method static eSearchdOption SEAMLESS_ROTATE()
 * @method static eSearchdOption MAX_MATCHES()
 * @method static eSearchdOption PID_FILE()
 * @method static eSearchdOption MAX_CHILDREN()
 * @method static eSearchdOption CLIENT_TIMEOUT()
 * @method static eSearchdOption READ_TIMEOUT()
 * @method static eSearchdOption QUERY_LOG_FORMAT()
 * @method static eSearchdOption QUERY_LOG()
 * @method static eSearchdOption LOG()
 * @method static eSearchdOption PORT()
 * @method static eSearchdOption ADDRESS()
 * @method static eSearchdOption LISTEN()
 * @method static eSearchdOption ONDISK_ATTRS_DEFAULT()
 * @method static eSearchdOption SHUTDOWN_TIMEOUT()
 * @method static eSearchdOption QUERY_LOG_MIN_MSEC()
 * @method static eSearchdOption AGENT_RETRY_DELAY()
 * @method static eSearchdOption AGENT_RETRY_COUNT()
 * @method static eSearchdOption AGENT_QUERY_TIMEOUT()
 * @method static eSearchdOption AGENT_CONNECT_TIMEOUT()
 */
final class eSearchdOption extends eOption
{
    const PREDICTED_TIME_COSTS         = 'predicted_time_costs';
    const RT_MERGE_MAXIOSIZE           = 'rt_merge_maxiosize';
    const RT_MERGE_IOPS                = 'rt_merge_iops';
    const PERSISTENT_CONNECTIONS_LIMIT = 'persistent_connections_limit';
    const HA_PERIOD_KARMA              = 'ha_period_karma';
    const HA_PING_INTERVAL             = 'ha_ping_interval';
    const SPHINXQL_STATE               = 'sphinxql_state';
    const PREFORK_ROTATION_THROTTLE    = 'prefork_rotation_throttle';
    const WATCHDOG                     = 'watchdog';
    const COMPAT_SPHINXQL_MAGICS       = 'compat_sphinxql_magics';
    const EXPANSION_LIMIT              = 'expansion_limit';
    const THREAD_STACK                 = 'thread_stack';
    const RT_FLUSH_PERIOD              = 'rt_flush_period';
    const MYSQL_VERSION_STRING         = 'mysql_version_string';
    const PLUGIN_DIR                   = 'plugin_dir';
    const COLLATION_LIBC_LOCALE        = 'collation_libc_locale';
    const COLLATION_SERVER             = 'collation_server';
    const SNIPPETS_FILE_PREFIX         = 'snippets_file_prefix';
    const BINLOG_MAX_LOG_SIZE          = 'binlog_max_log_size';
    const BINLOG_FLUSH                 = 'binlog_flush';
    const BINLOG_PATH                  = 'binlog_path';
    const DIST_THREADS                 = 'dist_threads';
    const WORKERS                      = 'workers';
    const SUBTREE_HITS_CACHE           = 'subtree_hits_cache';
    const SUBTREE_DOCS_CACHE           = 'subtree_docs_cache';
    const MAX_BATCH_QUERIES            = 'max_batch_queries';
    const READ_UNHINTED                = 'read_unhinted';
    const READ_BUFFER                  = 'read_buffer';
    const LISTEN_BACKLOG               = 'listen_backlog';
    const MAX_FILTER_VALUES            = 'max_filter_values';
    const MAX_FILTERS                  = 'max_filters';
    const CRASH_LOG_PATH               = 'crash_log_path';
    const MVA_UPDATES_POOL             = 'mva_updates_pool';
    const MAX_PACKET_SIZE              = 'max_packet_size';
    const ONDISK_DICT_DEFAULT          = 'ondisk_dict_default';
    const ATTR_FLUSH_PERIOD            = 'attr_flush_period';
    const UNLINK_OLD                   = 'unlink_old';
    const PREOPEN_INDEXES              = 'preopen_indexes';
    const SEAMLESS_ROTATE              = 'seamless_rotate';
    const MAX_MATCHES                  = 'max_matches';
    const PID_FILE                     = 'pid_file';
    const MAX_CHILDREN                 = 'max_children';
    const CLIENT_TIMEOUT               = 'client_timeout';
    const READ_TIMEOUT                 = 'read_timeout';
    const QUERY_LOG_FORMAT             = 'query_log_format';
    const QUERY_LOG                    = 'query_log';
    const LOG                          = 'log';
    const PORT                         = 'port';
    const ADDRESS                      = 'address';
    const LISTEN                       = 'listen';
    const ONDISK_ATTRS_DEFAULT         = 'ondisk_attrs_default';
    const SHUTDOWN_TIMEOUT             = 'shutdown_timeout';
    const QUERY_LOG_MIN_MSEC           = 'query_log_min_msec';
    const AGENT_RETRY_DELAY            = 'agent_retry_delay';
    const AGENT_RETRY_COUNT            = 'agent_retry_count';
    const AGENT_QUERY_TIMEOUT          = 'agent_query_timeout';
    const AGENT_CONNECT_TIMEOUT        = 'agent_connect_timeout';
}