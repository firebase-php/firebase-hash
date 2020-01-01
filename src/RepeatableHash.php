<?php


namespace FirebaseHash;

abstract class RepeatableHash implements Hashable
{
    private $rounds;

    private $name;

    public function __construct(string $name, int $min, int $max, RepeatableHashBuilder $builder)
    {
        $this->name = $name;

        if ($builder->getRounds() < $min || $builder->getRounds() > $max) {
            throw new \InvalidArgumentException(
                sprintf('Rounds value must be between %s and %s (inclusive).', $min, $max)
            );
        }

        $this->rounds = $builder->getRounds();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getOptions()
    {
        return [
            'rounds' => $this->rounds
        ];
    }

    abstract public static function builder();
}
