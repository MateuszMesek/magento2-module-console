<?php declare(strict_types=1);

namespace MateuszMesek\Console\Plugin\WrapInput;

use MateuszMesek\Console\Input\WrappedInputFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OnCommand
{
    private WrappedInputFactory $wrappedInputFactory;

    public function __construct(
        WrappedInputFactory $wrappedInputFactory
    )
    {
        $this->wrappedInputFactory = $wrappedInputFactory;
    }

    public function beforeRun(
        Command $command,
        InputInterface $input,
        OutputInterface $output
    ): array
    {
        $wrappedInput = $this->wrappedInputFactory->create(['input' => $input]);

        return [$wrappedInput, $output];
    }
}
