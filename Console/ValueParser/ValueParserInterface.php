<?php declare(strict_types=1);

namespace MateuszMesek\Console\Console\ValueParser;

interface ValueParserInterface
{
    /**
     * @param mixed $input
     * @return mixed
     */
    public function parse($input);
}
