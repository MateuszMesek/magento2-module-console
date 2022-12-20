<?php declare(strict_types=1);

namespace MateuszMesek\Console\Console;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface ContextInterface
{
    public function setInput(InputInterface $input): void;

    public function getInput(): ?InputInterface;

    public function setOutput(OutputInterface $output): void;

    public function getOutput(): ?OutputInterface;
}
