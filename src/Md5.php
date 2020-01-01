<?php


namespace FirebaseHash;

class Md5 extends RepeatableHash
{
    public function __construct($builder)
    {
        parent::__construct('MD5', 0, 8192, $builder);
    }

    public static function builder()
    {
        return new class extends RepeatableHashBuilder {
            public function build()
            {
                return new Md5($this);
            }
        };
    }
}
