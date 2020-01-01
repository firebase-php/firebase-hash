<?php


namespace FirebaseHash;

class Sha256 extends RepeatableHash
{
    public function __construct($builder)
    {
        parent::__construct('SHA256', 1, 8192, $builder);
    }

    public static function builder()
    {
        return new class extends RepeatableHashBuilder {
            public function build()
            {
                return new Sha256($this);
            }
        };
    }
}
