<?php

namespace AppBundle\Command;

use DateTime;
use AppBundle\Entity\ShopProduct;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * A command console that creates shop products and stores them in the database.
 *
 * Class LoadFixturesCommand
 * @package AppBundle\Command
 */
class LoadShopFixturesCommand extends ContainerAwareCommand
{
    const MAX_ATTEMPTS = 5;

    const COMMAND_NAME = 'app:fixtures';

    /**
     * @var ObjectManager
     */
    private $em;

    /**
     * @var DateTime
     */
    private $now;

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Create basic data shop to have an operational app in database');
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
        $this->now = $this->getContainer()->get('app.mysql_now')->get();
        $startTime = microtime(true);

        $this->loadShopProductFixtures();
        $this->em->flush();
        $output->writeln(sprintf('[OK] Shop Products were successfully created'));

        $output->writeln('');

        $finishTime = microtime(true);
        $elapsedTime = $finishTime - $startTime;

        $output->writeln(sprintf('[INFO] Elapsed time: %.2f ms', $elapsedTime * 1000));
    }

    /**
     * @param OutputInterface $output
     *
     * Load Shop Products fixtures
     */
    private function loadShopProductFixtures(OutputInterface $output)
    {
        foreach (FixturesShopProducts::PRODUCTS as $data) {

            $shopProduct = new ShopProduct;
            $shopProduct
                ->setDescription($data['description'])
                ->setCurrencyType($data['currency_type'])
                ->setProductType($data['product_type'])
                ->setPrice($data['price'])
                ->setQuantity($data['quantity'])
                ->setAvailableInShop($data['available_in_shop'])
                ->setPriority($data['priority']);
            $this->em->persist($shopProduct);
            $output->writeln(sprintf('[OK] Shop Product ' . $data['description'] . ' Has been inserted'));

        }
    }
}
