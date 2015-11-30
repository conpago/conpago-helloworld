<?php
	/**
	 * Created by PhpStorm.
	 * User: Bartosz Gołek
	 * Date: 2014-05-21
	 * Time: 21:27
	 */

	namespace Conpago\HelloWorld\Presentation\Controller;

	use Conpago\Helpers\Contract\IRequestData;
	use Conpago\HelloWorld\Presentation\Contract\Controller\IHelloWorldController;
	use Conpago\HelloWorld\Business\Contract\Interactor\IHelloWorld;

	class HelloWorldController implements IHelloWorldController
	{

		/**
		 * @var IHelloWorld
		 */
		private $listUsers;

		function __construct(IHelloWorld $listUsers)
		{
			$this->listUsers = $listUsers;
		}

		/**
		 * @param IRequestData $data
		 *
		 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
		 */
		function execute(IRequestData $data)
		{
			$this->listUsers->run();
		}
	}
