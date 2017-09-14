<?php

namespace AppBundle\Command;

use AppBundle\Entity\Card;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * Update cards with fixtures data in the database.
 *
 * Class UpdateCardsCommand
 * @package AppBundle\Command
 */
class UpdateCardsCommand extends ContainerAwareCommand
{
    const MAX_ATTEMPTS = 5;

    const COMMAND_NAME = 'app:cards';

    /**
     * @var ObjectManager
     */
    private $em;

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Update cards stats with the new data');
    }

    /**
     * This method is executed before the interact() and the execute() methods.
     * It's main purpose is to initialize the variables used in the rest of the
     * command methods.
     *
     * Beware that the input options and arguments are validated after executing
     * the interact() method, so you can't blindly trust their values in this method.
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();
    }

    /**
     * This method is executed after interact() and initialize(). It usually
     * contains the logic to execute to complete this command task.
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $startTime = microtime(true);

        $this->updateCards($output);
        $this->em->flush();
        $output->writeln(sprintf('[OK] Cards were was successfully Updated'));

        $output->writeln('');

        $finishTime = microtime(true);
        $elapsedTime = $finishTime - $startTime;

        $output->writeln(sprintf('[INFO] Elapsed time: %.2f ms', $elapsedTime * 1000));
    }

    /**
     * Load avatar fixtures
     *
     * @param OutputInterface $output
     */
    private function updateCards(OutputInterface $output)
    {
        $cards = $this->em->getRepository('AppBundle:Card')->findAllAndOrdered();
        foreach (FixturesData::CARDS as $data) {

            /** @var Card $card */
            foreach ($cards as $card) {
                if ($data['name'] === $card->getName()) {
                    $card
                        ->setName($data['name'])
                        ->setTypology($data['typology'])
                        ->setSkill($data['skill'])
                        ->setBehaviour($data['behaviour'])
                        ->setRarity($data['rarity'])
                        ->setCooldown($data['cooldown'])
                        ->setFury($data['fury'])
                        ->setDamage($data['damage'])
                        ->setHealth($data['health'])
                        ->setMovement($data['movement'])
                        ->setMoveFrames($data['moveFrames'])
                        ->setAttackSpeed($data['attackSpeed'])
                        ->setAttackFrames($data['attackFrames'])
                        ->setRanged($data['ranged'])
                        ->setArea($data['area'])
                        ->setSize($data['size'])
                        ->setSight($data['sight'])
                        ->setRank($data['rank'])
                        ->setUnits($data['units'])
                        ->setExtra($data['extra'])
                        ->setAgro($data['agro'])
                        ->setBlockable($data['blockable'])
                        ->setDirectionable($data['directionable'])
                        ->setFlyer($data['flyer']);
                    $this->em->persist($card);
                    $output->writeln(sprintf('[OK] Card ' . $data['name'] . ' Has been updated'));
                }
            }
        }
    }
}
