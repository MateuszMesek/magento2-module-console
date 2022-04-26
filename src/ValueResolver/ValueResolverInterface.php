<?php declare(strict_types=1);

namespace MateuszMesek\Console\ValueResolver;

interface ValueResolverInterface
{
    /**
     * @return null|mixed
     */
    public function get();
}
