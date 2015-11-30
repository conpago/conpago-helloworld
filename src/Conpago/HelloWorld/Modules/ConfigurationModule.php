<?php

namespace Conpago\HelloWorld\Modules;

use Conpago\Config\ArrayConfig;
use Conpago\Config\PhpConfig;
use Conpago\Config\PhpConfigBuilder;
use Conpago\DI\IContainer;
use Conpago\DI\IContainerBuilder;
use Conpago\DI\IModule;
use Conpago\Helpers\Contract\IAppMask;

class ConfigurationModule implements IModule {
	public function build(IContainerBuilder $builder) {

		$builder->registerType('Conpago\Utils\SessionAccessor');
		$builder->registerType('Conpago\Utils\ServerAccessor');

		$builder
			->registerType('Conpago\Helpers\AppMask')
			->asA('Conpago\Helpers\Contract\IAppMask');

		$builder
			->registerType('Conpago\Core\WebApp')
			->asA('Conpago\Contract\IApp');

		$builder
			->register(function(IContainer $c)
			{
				/** @var IAppMask $appMask */
				$appMask = $c->resolve('Conpago\Helpers\Contract\IAppMask');
				return new ArrayConfig((new PhpConfigBuilder(
					$c->resolve('Conpago\File\Contract\IFileSystem'),
					$appMask->configMask()
				))->build());
			})
			->asA('Conpago\Config\Contract\IConfig')
			->singleInstance();

		$builder
			->registerType('Conpago\HelloWorld\AppConfig')
			->asA('Conpago\Config\Contract\IAppConfig');

		$builder
			->registerType('Conpago\TimeService')
			->asA('Conpago\Contract\ITimeService');

		$builder
			->registerType('Conpago\Helpers\Response')
			->asA('Conpago\Helpers\Contract\IResponse');

		$builder
			->registerType('Conpago\HelloWorld\LoggerConfigProvider')
			->asA('Conpago\Logging\Contract\ILoggerConfigProvider');

		$builder
			->registerType('Conpago\HelloWorld\LoggerConfig')
			->asA('Conpago\ILoggerConfig');

		$builder
			->registerType('Conpago\Logs\MonologLogger')
			->asA('Conpago\ILogger');
	}
}
