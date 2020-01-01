<?php


namespace FirebaseHash;

class HmacSha1 extends Hmac
{
    public function __construct($builder)
    {
        parent::__construct('HMAC_SHA1', $builder);
    }

    public static function builder()
    {
        return new class extends HmacBuilder {
            public function build()
            {
                return new HmacSha1($this);
            }
        };
    }
}
