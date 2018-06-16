<?php
namespace Smile\Courses\Setup;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Store\Api\Data\StoreInterfaceFactory;
use Magento\Store\Api\StoreRepositoryInterface;
use Magento\Store\Model\ResourceModel\Store;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\Store as ModelStore;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface as ConfigResource;
use Magento\Theme\Model\Config as ThemeConfig;
use Magento\Theme\Model\ResourceModel\Theme\Collection as ThemeCollection;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**#@+
     * Xpath
     */
    const XPATH_LOCALE_CODE = 'general/locale/code';
    /**#@-*/

    /**#@+
     * Store consts
     */
    const GERMAN_STORE_CODE = 'de';
    const GERMAN_STORE_NAME = 'German';
    /**#@-*/

    /**
     * @var ModelStore
     */
    protected $store;

    /**
     * @var \Magento\Store\Model\StoreRepository
     */
    protected $storeResource;

    /**
     * @var StoreRepositoryInterface
     */
    protected $storeRepository;

    /**
     * @var ConfigResource
     */
    protected $configResource;

    /**
     * @var ThemeCollection
     */
    protected $themeCollection;

    /**
     * @var ThemeConfig
     */
    protected $themeConfig;

    /**
     * UpgradeData constructor.
     *
     * @param StoreInterfaceFactory    $store
     * @param Store                    $storeResource
     * @param StoreRepositoryInterface $storeRepository
     * @param ConfigResource           $configResource
     * @param ThemeCollection          $themeCollection
     * @param ThemeConfig              $themeConfig
     */
    public function __construct(
        StoreInterfaceFactory $store,
        Store $storeResource,
        StoreRepositoryInterface $storeRepository,
        ConfigResource $configResource,
        ThemeCollection $themeCollection,
        ThemeConfig $themeConfig
    ) {
        $this->store = $store;
        $this->storeResource = $storeResource;
        $this->storeRepository = $storeRepository;
        $this->configResource = $configResource;
        $this->themeCollection = $themeCollection;
        $this->themeConfig = $themeConfig;
    }

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface   $context
     *
     * @return void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '0.0.1', '<')) {
            /** @var ModelStore $store */
            try {
                $store = $this->storeRepository->get(static::GERMAN_STORE_CODE);
            } catch (\Exception $e) {
                $store = $this->store->create();
                $store->setStoreGroupId(1)
                    ->setWebsiteId(1);
            }
            $store->setCode(static::GERMAN_STORE_CODE)
                ->setIsActive(1)
                ->setName(static::GERMAN_STORE_NAME);
            $this->storeResource->save($store);

            $this->configResource->saveConfig(
                static::XPATH_LOCALE_CODE,
                static::GERMAN_STORE_CODE . '_' . strtoupper(static::GERMAN_STORE_CODE),
                ScopeInterface::SCOPE_STORES,
                $store->getId()
            );
        }

        if (version_compare($context->getVersion(), '1.0.4', '==')) {
            $themes = $this->themeCollection->getItems();
            $stores = $this->storeRepository->getList();
            $storeIds = [];
            foreach ($stores as $store) {
                $storeIds[] = $store->getId();
            }
            foreach ($themes as $theme) {
                /** @var $theme \Magento\Theme\Model\Theme */
                if ($theme->getCode() == 'Fest/NewTheme') {
                    $this->themeConfig->assignToStore(
                        $theme,
                        $storeIds,
                        ScopeConfigInterface::SCOPE_TYPE_DEFAULT
                    );
                }
            }
        }
    }
}
