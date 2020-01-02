<?php


namespace FirebaseHash;

final class Scrypt extends RepeatableHash
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $saltSeparator;

    /**
     * @var string
     */
    private $memoryCost;

    public function __construct($builder)
    {
        parent::__construct('SCRYPT', 0, 8, $builder);

        if (is_null($builder->getKey()) || strlen($builder->getKey()) === 0) {
            throw new \InvalidArgumentException('A non-empty key is required for Scrypt');
        }

        if ($builder->getMemoryCost() < 0 || $builder->getMemoryCost() > 14) {
            throw new \InvalidArgumentException('memoryCost must be between 1 and 14');
        }

        $this->key = base64_encode($builder->getKey());
        if (is_null($builder->getSaltSeparator())) {
            $this->saltSeparator = '';
        } else {
            $this->saltSeparator = $builder->getSaltSeparator();
        }
        $this->memoryCost = $builder->getMemoryCost();
    }

    public function getOptions()
    {
        return array_merge(
            parent::getOptions(),
            [
                'signerKey' => $this->key,
                'memoryCost' => $this->memoryCost,
                'saltSeparator' => $this->saltSeparator
            ]
        );
    }

    public static function builder()
    {
        return new class extends RepeatableHashBuilder {

            /**
             * @var string
             */
            private $key;

            /**
             * @var string
             */
            private $saltSeparator;

            /**
             * @var string
             */
            private $memoryCost;

            /**
             * @return string
             */
            public function getKey(): ?string
            {
                return $this->key;
            }

            /**
             * @param string $key
             * @return
             */
            public function setKey(string $key)
            {
                $this->key = $key;
                return $this;
            }

            /**
             * @return string
             */
            public function getSaltSeparator(): ?string
            {
                return $this->saltSeparator;
            }

            /**
             * @param string $saltSeparator
             * @return
             */
            public function setSaltSeparator(string $saltSeparator)
            {
                $this->saltSeparator = $saltSeparator;
                return $this;
            }

            /**
             * @return string
             */
            public function getMemoryCost(): ?string
            {
                return $this->memoryCost;
            }

            /**
             * @param string $memoryCost
             * @return
             */
            public function setMemoryCost(string $memoryCost)
            {
                $this->memoryCost = $memoryCost;
                return $this;
            }

            public function build()
            {
                return new Scrypt($this);
            }
        };
    }
}
