<?php
/**
 * automatically generated from sphinx documentation
 */

namespace LTDBeget\sphinx\enums\options;


use LTDBeget\sphinx\enums\base\eOption;

/**
 * Class eCommonOption
 * @package LTDBeget\sphinx\informer\enums\options
 *
 * @method static eCommonOption RLP_MAX_BATCH_DOCS()
 * @method static eCommonOption RLP_MAX_BATCH_SIZE()
 * @method static eCommonOption RLP_ENVIRONMENT()
 * @method static eCommonOption RLP_ROOT()
 * @method static eCommonOption JSON_AUTOCONV_KEYNAMES()
 * @method static eCommonOption JSON_AUTOCONV_NUMBERS()
 * @method static eCommonOption ON_JSON_ATTR_ERROR()
 * @method static eCommonOption LEMMATIZER_BASE()
 * @method static eCommonOption PLUGIN_DIR()
 */
final class eCommonOption extends eOption
{
    const RLP_MAX_BATCH_DOCS     = "rlp_max_batch_docs";
    const RLP_MAX_BATCH_SIZE     = "rlp_max_batch_size";
    const RLP_ENVIRONMENT        = "rlp_environment";
    const RLP_ROOT               = "rlp_root";
    const JSON_AUTOCONV_KEYNAMES = "json_autoconv_keynames";
    const JSON_AUTOCONV_NUMBERS  = "json_autoconv_numbers";
    const ON_JSON_ATTR_ERROR     = "on_json_attr_error";
    const LEMMATIZER_BASE        = "lemmatizer_base";
    const PLUGIN_DIR             = "plugin_dir";
}