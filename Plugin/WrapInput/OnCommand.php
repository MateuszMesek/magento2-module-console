<?php declare(strict_types=1);

namespace MateuszMesek\Console\Plugin\WrapInput;

use MateuszMesek\Console\Console\Input\WrappedInputFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OnCommand
{
    public function __construct(
        private readonly WrappedInputFactory $wrappedInputFactory
    )
    {
    }

    public function beforeRun(
        Command         $command,
        InputInterface  $input,
        OutputInterface $output
    ): array
    {
        $wrappedInput = $this->wrappedInputFactory->create(['input' => $input]);

        return [$wrappedInput, $output];
    }
}
