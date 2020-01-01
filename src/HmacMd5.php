<?php


namespace FirebaseHash;

class HmacMd5 extends Hmac
{
    public function __construct($builder)
    {
        parent::__construct('HMAC_MD5', $builder);
    }

    public static function builder()
    {
        return new class extends HmacBuilder {
            public function build()
            {
                return new HmacMd5($this);
            }
        };
    }
}
