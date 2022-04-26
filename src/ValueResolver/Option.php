<?php declare(strict_types=1);

namespace MateuszMesek\Console\ValueResolver;

use MateuszMesek\Console\Command\ContextInterface;

class Option implements ValueResolverInterface
{
    private ContextInterface $context;
    private string $name;

    public function __construct(
        ContextInterface $context,
        string $name
    )
    {
        $this->context = $context;
        $this->name = $name;
    }

    public function get()
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
