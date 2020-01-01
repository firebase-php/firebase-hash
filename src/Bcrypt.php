<?php


namespace FirebaseHash;

class Bcrypt implements Hashable
{
    public function getOptions()
    {
        return [];
    }

    public function getName()
    {
        return 'BCRYPT';
    }
}
