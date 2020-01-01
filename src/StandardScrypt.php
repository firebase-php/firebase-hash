<?php


namespace FirebaseHash;

class StandardScrypt implements Hashable
{
    /**
     * @var int
     */
    private $derivedKeyLength;

    /**
     * @var int
     */
    private $blockSize;

    /**
     * @var int
     */
    private $parallelization;

    /**
     * @var int
     */
    private $memoryCost;

    public function getOptions()
    {
        return [
            'dkLen' => $this->derivedKeyLength,
            'blockSize' => $this->blockSize,
            'parallelization' => $this->parallelization,
            'memoryCost' => $this->memoryCost
        ];
    }

    public function getName()
    {
        return 'STANDARD_SCRYPT';
    }

    /**
     * @return int
     */
    public function getDerivedKeyLength(): int
    {
        return $this->derivedKeyLength;
    }

    /**
     * @param int $derivedKeyLength
     * @return StandardScrypt
     */
    public function setDerivedKeyLength(int $derivedKeyLength): StandardScrypt
    {
        $this->derivedKeyLength = $derivedKeyLength;
        return $this;
    }

    /**
     * @return int
     */
    public function getBlockSize(): int
    {
        return $this->blockSize;
    }

    /**
     * @param int $blockSize
     * @return StandardScrypt
     */
    public function setBlockSize(int $blockSize): StandardScrypt
    {
        $this->blockSize = $blockSize;
        return $this;
    }

    /**
     * @return int
     */
    public function getParallelization(): int
    {
        return $this->parallelization;
    }

    /**
     * @param int $parallelization
     * @return StandardScrypt
     */
    public function setParallelization(int $parallelization): StandardScrypt
    {
        $this->parallelization = $parallelization;
        return $this;
    }

    /**
     * @return int
     */
    public function getMemoryCost(): int
    {
        return $this->memoryCost;
    }

    /**
     * @param int $memoryCost
     * @return StandardScrypt
     */
    public function setMemoryCost(int $memoryCost): StandardScrypt
    {
        $this->memoryCost = $memoryCost;
        return $this;
    }
}
