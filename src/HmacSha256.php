<?php


namespace FirebaseHash;

class HmacSha256 extends Hmac
{
    public function __construct($builder)
    {
        parent::__construct('HMAC_SHA256', $builder);
    }

    public static function builder()
    {
        return new class extends HmacBuilder {
            public function build()
            {
                return new HmacSha256($this);
            }
        };
    }
}
