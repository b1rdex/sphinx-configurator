<?php
/**
 * automatically generated from sphinx documentation
 */

namespace LTDBeget\sphinx\enums\options;


use LTDBeget\sphinx\enums\base\eOption;

/**
 * Class eIndexerOption
 * @package LTDBeget\sphinx\informer\enums\options
 *
 * @method static eIndexerOption LEMMATIZER_CACHE()
 * @method static eIndexerOption LEMMATIZER_BASE()
 * @method static eIndexerOption ON_FILE_FIELD_ERROR()
 * @method static eIndexerOption MAX_FILE_FIELD_BUFFER()
 * @method static eIndexerOption WRITE_BUFFER()
 * @method static eIndexerOption MAX_XMLPIPE2_FIELD()
 * @method static eIndexerOption MAX_IOSIZE()
 * @method static eIndexerOption MAX_IOPS()
 * @method static eIndexerOption MEM_LIMIT()
 */
final class eIndexerOption extends eOption
{
    const LEMMATIZER_CACHE      = "lemmatizer_cache";
    const LEMMATIZER_BASE       = "lemmatizer_base";
    const ON_FILE_FIELD_ERROR   = "on_file_field_error";
    const MAX_FILE_FIELD_BUFFER = "max_file_field_buffer";
    const WRITE_BUFFER          = "write_buffer";
    const MAX_XMLPIPE2_FIELD    = "max_xmlpipe2_field";
    const MAX_IOSIZE            = "max_iosize";
    const MAX_IOPS              = "max_iops";
    const MEM_LIMIT             = "mem_limit";
}