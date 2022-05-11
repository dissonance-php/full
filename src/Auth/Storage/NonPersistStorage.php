<?php

/**
 * @see       https://github.com/laminas/laminas-authentication for the canonical source repository
 * @copyright https://github.com/laminas/laminas-authentication/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-authentication/blob/master/LICENSE.md New BSD License
 */

namespace Symbiotic\Auth\Storage;


use Symbiotic\Auth\AuthStorageInterface;

/**
 * Non-Persistent Authentication Storage
 *
 * Since HTTP Authentication happens again on each request, this will always be
 * re-populated. So there's no need to use sessions, this simple value class
 * will hold the data for rest of the current request.
 */
class NonPersistStorage implements AuthStorageInterface
{
    /**
     * Holds the actual auth data
     * @var array|mixed
     */
    protected $data;

    /**
     * Returns true if and only if storage is empty
     *
     * @return bool
     */
    public function isEmpty():bool
    {
        return empty($this->data);
    }

    /**
     * Returns the contents of storage
     * Behavior is undefined when storage is empty.
     *
     * @return mixed
     */
    public function read()
    {
        return $this->data;
    }

    /**
     * Writes $contents to storage
     *
     * @param mixed $contents
     *
     * @return void
     */
    public function write($contents)
    {
        $this->data = $contents;
    }

    /**
     * Clears contents from storage
     *
     * @return void
     */
    public function clear()
    {
        $this->data = null;
    }
}