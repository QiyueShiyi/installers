<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-08-27 17:18
 */
namespace Notadd\Installer\Prerequisite;

use Notadd\Installer\Abstracts\Prerequisite;

/**
 * Class WritablePath.
 */
class WritablePath extends Prerequisite
{
    /**
     * @var array
     */
    protected $paths;

    /**
     * WritablePath constructor.
     *
     * @param array $paths
     */
    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    /**
     * Checking prerequisite's rules.
     */
    public function check()
    {
        foreach ($this->paths as $path) {
            if (!is_writable($path)) {
                $this->errors[] = [
                    'message' => 'The ' . realpath($path) . ' directory is not writable.',
                    'detail' => 'Please chmod this directory' . ($path !== public_path() ? ' and its contents' : '') . ' to 0775.',
                ];
            }
        }
    }
}
