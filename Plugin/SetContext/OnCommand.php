<?php declare(strict_types=1);

namespace MateuszMesek\Console\Plugin\SetContext;

use MateuszMesek\Console\Console\ContextInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OnCommand
{
    public function __construct(
        private readonly ContextInterface $context
    )
    {
    }

    public function beforeRun(
        Command         $command,
        InputInterface  $input,
        OutputInterface $output
    ): void
    {
        $this->context->setInput($input);
        $this->context->setOutput($output);
    }
}
