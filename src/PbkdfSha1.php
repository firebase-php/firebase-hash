<?php


namespace FirebaseHash;

class PbkdfSha1 extends RepeatableHash
{
    public function __construct($builder)
    {
        parent::__construct('PBKDF_SHA1', 0, 120000, $builder);
    }

    public static function builder()
    {
        return new class extends RepeatableHashBuilder {
            public function build()
            {
                return new PbkdfSha1($this);
            }
        };
    }
}
