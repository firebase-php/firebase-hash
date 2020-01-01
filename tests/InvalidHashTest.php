<?php


namespace FirebaseHash\Tests;

use FirebaseHash\HmacMd5;
use FirebaseHash\HmacSha1;
use FirebaseHash\HmacSha256;
use FirebaseHash\HmacSha512;
use FirebaseHash\Md5;
use FirebaseHash\Pbkdf2Sha256;
use FirebaseHash\PbkdfSha1;
use FirebaseHash\Scrypt;
use FirebaseHash\Sha1;
use FirebaseHash\Sha256;
use FirebaseHash\Sha512;
use PHPUnit\Framework\TestCase;

class InvalidHashTest extends TestCase
{
    private const SIGNER_KEY = 'key';

    private const SALT_SEPARATOR = 'separator';

    public function testInvalidHmac()
    {
        $builders = [
            HmacSha512::builder(),
            HmacSha256::builder(),
            HmacSha1::builder(),
            HmacMd5::builder()
        ];
        foreach ($builders as $builder) {
            try {
                $builder->build();
                self::fail('No error thrown for missing key');
            } catch (\Exception $e) {
                self::assertTrue($e instanceof \InvalidArgumentException);
            }
        }
    }

    public function testInvalidRepeatableHash()
    {
        $builders = [
            Sha512::builder()->setRounds(0),
            Sha256::builder()->setRounds(0),
            Sha1::builder()->setRounds(0),
            Md5::builder()->setRounds(-1),
            Pbkdf2Sha256::builder()->setRounds(-1),
            PbkdfSha1::builder()->setRounds(-1),
            Sha512::builder()->setRounds(8193),
            Sha256::builder()->setRounds(8193),
            Sha1::builder()->setRounds(8193),
            Md5::builder()->setRounds(8193),
            Pbkdf2Sha256::builder()->setRounds(120001),
            PbkdfSha1::builder()->setRounds(120001),
        ];

        foreach ($builders as $builder) {
            try {
                $builder->build();
                self::fail('No error thrown for invalid rounds');
            } catch (\Exception $e) {
                self::assertTrue($e instanceof \InvalidArgumentException);
            }
        }
    }

    public function testValidRepeatableHash()
    {
        Md5::builder()->setRounds(0)->build();
        Md5::builder()->setRounds(8192)->build();
        Sha1::builder()->setRounds(1)->build();
        Sha1::builder()->setRounds(8192)->build();
        Sha256::builder()->setRounds(1)->build();
        Sha256::builder()->setRounds(8192)->build();
        Sha512::builder()->setRounds(1)->build();
        Sha512::builder()->setRounds(8192)->build();
        PbkdfSha1::builder()->setRounds(0)->build();
        PbkdfSha1::builder()->setRounds(120000)->build();
        Pbkdf2Sha256::builder()->setRounds(0)->build();
        Pbkdf2Sha256::builder()->setRounds(120000)->build();
        $this->expectNotToPerformAssertions();
    }

    public function testInvalidScrypt()
    {
        $builders = [
            Scrypt::builder()
                ->setSaltSeparator(self::SALT_SEPARATOR)
                ->setRounds(5)
                ->setMemoryCost(12),
            Scrypt::builder()
                ->setKey(self::SIGNER_KEY)
                ->setSaltSeparator(self::SALT_SEPARATOR)
                ->setRounds(9)
                ->setMemoryCost(14),
            Scrypt::builder()
                ->setKey(self::SIGNER_KEY)
                ->setSaltSeparator(self::SALT_SEPARATOR)
                ->setRounds(-1)
                ->setMemoryCost(14),
            Scrypt::builder()
                ->setKey(self::SIGNER_KEY)
                ->setSaltSeparator(self::SALT_SEPARATOR)
                ->setRounds(8)
                ->setMemoryCost(15),
        ];
        foreach ($builders as $builder) {
            try {
                $builder->build();
            } catch (\Exception $e) {
                self::assertTrue($e instanceof \InvalidArgumentException);
            }
        }
    }
}
