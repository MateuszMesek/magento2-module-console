<?php declare(strict_types=1);

namespace MateuszMesek\Console\Console\ValueResolver;

interface ValueResolverInterface
{
    /**
     * @return mixed
     */
    public function get(): mixed;
}
