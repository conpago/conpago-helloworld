<?php

	namespace Conpago\HelloWorld\Business\Interactor;

	use Conpago\HelloWorld\Business\Contract\Interactor\IHelloWorld;
	use Conpago\HelloWorld\Business\Contract\Presenter\IHelloWorldPresenter;

	class HelloWorld implements IHelloWorld
	{
		/**
		 * @var IHelloWorldPresenter
		 */
		private $presenter;

		public function __construct(
			IHelloWorldPresenter $presenter
		)
		{
			$this->presenter = $presenter;
		}

		public function run()
		{
			$this->presenter->showHelloWorld();
		}
	}
