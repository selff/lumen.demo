<?php

namespace App\Repository;

/**
 * Class CountryRepository
 *
 * @package App\Repository
 */
class CountryRepository implements CountryRepositoryInterface
{
    /**
     * @param string $code
     */
    public function increment(string $code)
    {
        app('redis')->ZINCRBY('countries', 1, $code);
    }

    /**
     * @return array
     */
    public  function all(): array
    {
        $data = app('redis')->ZRANGE('countries', 0, -1, true);

        return array_reverse($data);
    }
}
