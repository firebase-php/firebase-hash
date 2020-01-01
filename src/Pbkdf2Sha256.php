<?php


namespace FirebaseHash;

class Pbkdf2Sha256 extends RepeatableHash
{
    public function __construct($builder)
    {
        parent::__construct('PBKDF2_SHA256', 0, 120000, $builder);
    }

    public static function builder()
    {
        return new class extends RepeatableHashBuilder {
            public function build()
            {
                return new Pbkdf2Sha256($this);
            }
        };
    }
}
