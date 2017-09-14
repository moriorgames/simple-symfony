<?php

namespace AppBundle\Command;

use DateTime;
use AppBundle\Entity\User;
use AppBundle\Entity\ShopProduct;
use AppBundle\Entity\ShopPurchase;
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
class LoadFixturesCommand extends ContainerAwareCommand
{
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
        $this->now = $this->getContainer()->get('app.mysql_now')->get();
    }

    /**
     * This method is executed after interact() and initialize(). It usually
     * contains the logic to execute to complete this command task.
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $startTime = microtime(true);

        $user = $this->loadUserFixtures($output);
        $this->em->flush();
        $output->writeln(sprintf('[OK] User was successfully created'));

        $shopProduct = $this->loadShopProductFixtures($output);
        $this->em->flush();
        $output->writeln(sprintf('[OK] Shop Products were successfully created'));

        $this->loadShopPurchase($user, $shopProduct, $output);
        $this->em->flush();
        $output->writeln(sprintf('[OK] Shop Purchase was successfully created'));

        $output->writeln('');

        $finishTime = microtime(true);
        $elapsedTime = $finishTime - $startTime;

        $output->writeln(sprintf('[INFO] Elapsed time: %.2f ms', $elapsedTime * 1000));
    }

    /**
     * @param OutputInterface $output
     *
     * Load Shop Products fixtures
     *
     * @return User
     */
    private function loadUserFixtures(OutputInterface $output): User
    {
        foreach (Fixtures::USERS as $data) {

            $user = new User;
            $user
                ->setName($data['name'])
                ->setCreatedAt($this->now)
                ->setUpdatedAt($this->now);
            $this->em->persist($user);
            $output->writeln(sprintf('[OK] User ' . $data['name'] . ' Has been inserted'));

        }

        return $user;
    }

    /**
     * @param OutputInterface $output
     *
     * Load Shop Products fixtures
     *
     * @return ShopProduct
     */
    private function loadShopProductFixtures(OutputInterface $output): ShopProduct
    {
        foreach (Fixtures::SHOP_PRODUCTS as $data) {

            $shopProduct = new ShopProduct;
            $shopProduct
                ->setDescription($data['description'])
                ->setProductType($data['product_type'])
                ->setPrice($data['price'])
                ->setQuantity($data['quantity'])
                ->setAvailableInShop($data['available_in_shop'])
                ->setPriority($data['priority']);
            $this->em->persist($shopProduct);
            $output->writeln(sprintf('[OK] Shop Product ' . $data['description'] . ' Has been inserted'));

        }

        return $shopProduct;
    }

    /**
     * @param OutputInterface $output
     *
     * Load Shop Products fixtures
     */
    private function loadShopPurchase(User $user, ShopProduct $shopProduct, OutputInterface $output)
    {
        $shopPurchase = new ShopPurchase;
        $shopPurchase
            ->setUser($user)
            ->setShopProduct($shopProduct)
            ->setCreatedAt($this->now)
            ->setUpdatedAt($this->now);
        $this->em->persist($shopPurchase);
        $output->writeln(sprintf('[OK] Shop Purchase has been registered on the System!'));
    }
}
