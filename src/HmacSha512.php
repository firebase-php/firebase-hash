<?php

namespace FirebaseHash;

class HmacSha512 extends Hmac
{
    public function __construct($builder)
    {
        parent::__construct('HMAC_SHA512', $builder);
    }

    public static function builder()
    {
        return new class extends HmacBuilder {
            public function build()
            {
                return new HmacSha512($this);
            }
        };
    }
}
