<?php

namespace App\Command;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ScrapingCommand extends Command
{
    protected static $defaultName = 'app:scraping';
    protected static $defaultDescription = 'Execute scraping tasks';

    private $taskRepository;
    private $entityManager;

    public function __construct(
        string $name,
        TaskRepository $taskRepository,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($name);
        $this->taskRepository = $taskRepository;
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        /** @var Task $task */
        //        foreach ($this->taskRepository->findBy(['dateexecute' => null]) as $task) {
        foreach ($this->taskRepository->findAll() as $task) {

            shell_exec(__DIR__ . '/../../node_modules/.bin/cypress run --spec "' . $task->getPathScraping().'"');

            $task->setDateexecute(new \DateTime());
            $user = $task->getUser();
            $user->setEtatScraping(true);
            $user->addTask($task);
            $this->entityManager->persist($user);
        }

        $this->entityManager->flush();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
