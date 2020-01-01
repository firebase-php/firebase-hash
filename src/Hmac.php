<?php


namespace FirebaseHash;

abstract class Hmac implements Hashable
{
    private $key;

    private $name;

    public function __construct(string $name, HmacBuilder $builder)
    {
        $this->name = $name;

        if (is_null($builder->getKey()) || strlen($builder->getKey()) === 0) {
            throw new \InvalidArgumentException('A non-empty key is required for HMAC algorithm');
        }
        $this->key = base64_encode($builder->getKey());
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    abstract public static function builder();

    public function getOptions()
    {
        return [
            'signerKey' => $this->key
        ];
    }
}
