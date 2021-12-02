<?php

namespace App\Repository;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface CountryRepositoryInterface {

    /**
     * @param string $code
     */
    public function increment(string $code);

    /**
     * @return array
     */
    public function all(): array;
}
