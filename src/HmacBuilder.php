<?php


namespace FirebaseHash;

abstract class HmacBuilder
{
    /**
     * @var string|null
     */
    private $key;

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param string|null $key
     * @return HmacBuilder
     */
    public function setKey(string $key): HmacBuilder
    {
        $this->key = $key;
        return $this;
    }

    abstract public function build();
}
