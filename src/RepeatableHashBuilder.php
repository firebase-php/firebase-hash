<?php


namespace FirebaseHash;

abstract class RepeatableHashBuilder
{
    /**
     * @var int
     */
    private $rounds;

    /**
     * @return int
     */
    public function getRounds(): int
    {
        return $this->rounds;
    }

    /**
     * @param int $rounds
     * @return RepeatableHashBuilder
     */
    public function setRounds(int $rounds): RepeatableHashBuilder
    {
        $this->rounds = $rounds;
        return $this;
    }

    abstract public function build();
}
