<?php declare(strict_types=1);

namespace MateuszMesek\Console\Console\ValueResolver;

use MateuszMesek\Console\Console\ContextInterface;

class Option implements ValueResolverInterface
{
    public function __construct(
        private readonly ContextInterface $context,
        private readonly string           $name
    )
    {
    }

    public function get(): mixed
    {
        $input = $this->context->getInput();

        if (!$input) {
            return null;
        }

        if (!$input->hasOption($this->name)) {
            return null;
        }

        return $input->getOption($this->name);
    }
}
