<?php
/**
 * automatically generated from sphinx documentation
 */

namespace LTDBeget\sphinx\enums\options;

use LTDBeget\sphinx\enums\base\eOption;

/**
 * Class eIndexOption
 *
 * @package LTDBeget\sphinx\informer\enums\options
 *
 * @method static eIndexOption GLOBAL_IDF()
 * @method static eIndexOption STOPWORDS_UNSTEMMED()
 * @method static eIndexOption REGEXP_FILTER()
 * @method static eIndexOption INDEX_FIELD_LENGTHS()
 * @method static eIndexOption BIGRAM_INDEX()
 * @method static eIndexOption BIGRAM_FREQ_WORDS()
 * @method static eIndexOption HA_STRATEGY()
 * @method static eIndexOption RT_ATTR_JSON()
 * @method static eIndexOption RT_ATTR_STRING()
 * @method static eIndexOption RT_ATTR_TIMESTAMP()
 * @method static eIndexOption RT_ATTR_MULTI_64()
 * @method static eIndexOption RT_ATTR_MULTI()
 * @method static eIndexOption RT_ATTR_FLOAT()
 * @method static eIndexOption RT_ATTR_BIGINT()
 * @method static eIndexOption RT_ATTR_UINT()
 * @method static eIndexOption RT_FIELD()
 * @method static eIndexOption RT_MEM_LIMIT()
 * @method static eIndexOption BLEND_MODE()
 * @method static eIndexOption BLEND_CHARS()
 * @method static eIndexOption EXPAND_KEYWORDS()
 * @method static eIndexOption HITLESS_WORDS()
 * @method static eIndexOption STOPWORD_STEP()
 * @method static eIndexOption OVERSHORT_STEP()
 * @method static eIndexOption INDEX_EXACT_WORDS()
 * @method static eIndexOption INPLACE_WRITE_FACTOR()
 * @method static eIndexOption INPLACE_RELOC_FACTOR()
 * @method static eIndexOption INPLACE_DOCINFO_GAP()
 * @method static eIndexOption INPLACE_HIT_GAP()
 * @method static eIndexOption INPLACE_ENABLE()
 * @method static eIndexOption ONDISK_DICT()
 * @method static eIndexOption PREOPEN()
 * @method static eIndexOption AGENT_QUERY_TIMEOUT()
 * @method static eIndexOption AGENT_CONNECT_TIMEOUT()
 * @method static eIndexOption AGENT_BLACKHOLE()
 * @method static eIndexOption AGENT_PERSISTENT()
 * @method static eIndexOption AGENT()
 * @method static eIndexOption LOCAL()
 * @method static eIndexOption HTML_REMOVE_ELEMENTS()
 * @method static eIndexOption HTML_INDEX_ATTRS()
 * @method static eIndexOption HTML_STRIP()
 * @method static eIndexOption PHRASE_BOUNDARY_STEP()
 * @method static eIndexOption PHRASE_BOUNDARY()
 * @method static eIndexOption NGRAM_CHARS()
 * @method static eIndexOption NGRAM_LEN()
 * @method static eIndexOption ENABLE_STAR()
 * @method static eIndexOption INFIX_FIELDS()
 * @method static eIndexOption PREFIX_FIELDS()
 * @method static eIndexOption MAX_SUBSTRING_LEN()
 * @method static eIndexOption MIN_INFIX_LEN()
 * @method static eIndexOption MIN_PREFIX_LEN()
 * @method static eIndexOption IGNORE_CHARS()
 * @method static eIndexOption CHARSET_TABLE()
 * @method static eIndexOption CHARSET_TYPE()
 * @method static eIndexOption MIN_WORD_LEN()
 * @method static eIndexOption EXCEPTIONS()
 * @method static eIndexOption EMBEDDED_LIMIT()
 * @method static eIndexOption WORDFORMS()
 * @method static eIndexOption STOPWORDS()
 * @method static eIndexOption MIN_STEMMING_LEN()
 * @method static eIndexOption INDEX_ZONES()
 * @method static eIndexOption INDEX_SP()
 * @method static eIndexOption DICT()
 * @method static eIndexOption MORPHOLOGY()
 * @method static eIndexOption MLOCK()
 * @method static eIndexOption DOCINFO()
 * @method static eIndexOption PATH()
 * @method static eIndexOption SOURCE()
 * @method static eIndexOption TYPE()
 * @method static eIndexOption RT_ATTR_BOOL()
 * @method static eIndexOption ONDISK_ATTRS()
 * @method static eIndexOption RLP_CONTEXT()
 * @method static eIndexOption KBATCH()
 * @method static eIndexOption KILLLIST_TARGET()
 */
final class eIndexOption extends eOption
{
    const GLOBAL_IDF            = 'global_idf';
    const STOPWORDS_UNSTEMMED   = 'stopwords_unstemmed';
    const REGEXP_FILTER         = 'regexp_filter';
    const INDEX_FIELD_LENGTHS   = 'index_field_lengths';
    const BIGRAM_INDEX          = 'bigram_index';
    const BIGRAM_FREQ_WORDS     = 'bigram_freq_words';
    const HA_STRATEGY           = 'ha_strategy';
    const RT_ATTR_JSON          = 'rt_attr_json';
    const RT_ATTR_STRING        = 'rt_attr_string';
    const RT_ATTR_TIMESTAMP     = 'rt_attr_timestamp';
    const RT_ATTR_MULTI_64      = 'rt_attr_multi_64';
    const RT_ATTR_MULTI         = 'rt_attr_multi';
    const RT_ATTR_FLOAT         = 'rt_attr_float';
    const RT_ATTR_BIGINT        = 'rt_attr_bigint';
    const RT_ATTR_UINT          = 'rt_attr_uint';
    const RT_FIELD              = 'rt_field';
    const RT_MEM_LIMIT          = 'rt_mem_limit';
    const BLEND_MODE            = 'blend_mode';
    const BLEND_CHARS           = 'blend_chars';
    const EXPAND_KEYWORDS       = 'expand_keywords';
    const HITLESS_WORDS         = 'hitless_words';
    const STOPWORD_STEP         = 'stopword_step';
    const OVERSHORT_STEP        = 'overshort_step';
    const INDEX_EXACT_WORDS     = 'index_exact_words';
    const INPLACE_WRITE_FACTOR  = 'inplace_write_factor';
    const INPLACE_RELOC_FACTOR  = 'inplace_reloc_factor';
    const INPLACE_DOCINFO_GAP   = 'inplace_docinfo_gap';
    const INPLACE_HIT_GAP       = 'inplace_hit_gap';
    const INPLACE_ENABLE        = 'inplace_enable';
    const ONDISK_DICT           = 'ondisk_dict';
    const PREOPEN               = 'preopen';
    const AGENT_QUERY_TIMEOUT   = 'agent_query_timeout';
    const AGENT_CONNECT_TIMEOUT = 'agent_connect_timeout';
    const AGENT_BLACKHOLE       = 'agent_blackhole';
    const AGENT_PERSISTENT      = 'agent_persistent';
    const AGENT                 = 'agent';
    const LOCAL                 = 'local';
    const HTML_REMOVE_ELEMENTS  = 'html_remove_elements';
    const HTML_INDEX_ATTRS      = 'html_index_attrs';
    const HTML_STRIP            = 'html_strip';
    const PHRASE_BOUNDARY_STEP  = 'phrase_boundary_step';
    const PHRASE_BOUNDARY       = 'phrase_boundary';
    const NGRAM_CHARS           = 'ngram_chars';
    const NGRAM_LEN             = 'ngram_len';
    const ENABLE_STAR           = 'enable_star';
    const INFIX_FIELDS          = 'infix_fields';
    const PREFIX_FIELDS         = 'prefix_fields';
    const MAX_SUBSTRING_LEN     = 'max_substring_len';
    const MIN_INFIX_LEN         = 'min_infix_len';
    const MIN_PREFIX_LEN        = 'min_prefix_len';
    const IGNORE_CHARS          = 'ignore_chars';
    const CHARSET_TABLE         = 'charset_table';
    const CHARSET_TYPE          = 'charset_type';
    const MIN_WORD_LEN          = 'min_word_len';
    const EXCEPTIONS            = 'exceptions';
    const EMBEDDED_LIMIT        = 'embedded_limit';
    const WORDFORMS             = 'wordforms';
    const STOPWORDS             = 'stopwords';
    const MIN_STEMMING_LEN      = 'min_stemming_len';
    const INDEX_ZONES           = 'index_zones';
    const INDEX_SP              = 'index_sp';
    const DICT                  = 'dict';
    const MORPHOLOGY            = 'morphology';
    const MLOCK                 = 'mlock';
    const DOCINFO               = 'docinfo';
    const PATH                  = 'path';
    const SOURCE                = 'source';
    const TYPE                  = 'type';
    const RT_ATTR_BOOL          = 'rt_attr_bool';
    const ONDISK_ATTRS          = 'ondisk_attrs';
    const RLP_CONTEXT           = 'rlp_context';
    const KBATCH                = 'kbatch';
    const KILLLIST_TARGET       = 'killlist_target';
}
