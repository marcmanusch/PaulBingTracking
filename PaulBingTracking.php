<?php
namespace PaulBingTracking;
use Shopware\Components\Plugin\Context\InstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Shopware\Components\Plugin;

class PaulBingTracking extends Plugin
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('paul_bing_tracking.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
?>
