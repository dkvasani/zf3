<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Form\RegistrationForm;
use Zend\Session\Container;
use restapi\Controller\ApiController;

/**
 * This is the controller class displaying a page with the User Registration form.
 * User registration has several steps, so we display different form elements on
 * each step. We use session container to remember user's choices on the previous
 * steps.
 */
class RegistrationController extends ApiController
{

    /**
     * Session container.
     * @var Zend\Session\Container
     */
    private $sessionContainer;

    /**
     * Session container.
     * @var Zend\Session\Container
     */
    private $entityManager;

    /**
     * UserManager.
     * @var Zend\Session\Container
     */
    private $userManager;

    /**
     * Constructor. Its goal is to inject dependencies into controller.
     */
    public function __construct($sessionContainer, $entityManager, $userManager)
    {
        $this->sessionContainer = $sessionContainer;
        $this->entityManager = $entityManager;
        $this->userManager = $userManager;
    }

    /**
     * This is the default "index" action of the controller. It displays the
     * User Registration page.
     */
    public function indexAction()
    {
        // Determine the current step.
        $step = 1;
        //$this->userManager->addUser(['email' => 'dkvasani1', 'full_name' => 'Dharmesh', 'status' => 1, 'password' => 'thinker99']);
        if (isset($this->sessionContainer->step)) {
            $step = $this->sessionContainer->step;
        }

        // Ensure the step is correct (between 1 and 3).
        if ($step < 1 || $step > 3)
            $step = 1;

        if ($step == 1) {
            // Init user choices.
            $this->sessionContainer->userChoices = [];
        }

        $form = new RegistrationForm($step);

        // Check if user has submitted the form
        if ($this->getRequest()->isPost()) {

            // Fill in the form with POST data
            $data = $this->params()->fromPost();

            $form->setData($data);

            // Validate form
            if ($form->isValid()) {

                // Get filtered and validated data
                $data = $form->getData();

                // Save user choices in session.
                $this->sessionContainer->userChoices["step$step"] = $data;

                // Increase step
                $step ++;
                $this->sessionContainer->step = $step;

                // If we completed all 3 steps, redirect to Review page.
                if ($step > 3) {
                    return $this->redirect()->toRoute('user-review');
                }

                // Go to the next step.
                return $this->redirect()->toRoute('user');
            }
        }

        $viewModel = new ViewModel([
            'form' => $form
        ]);
        $viewModel->setTemplate("user/registration/step$step");

        return $viewModel;
    }

    /**
     * The "review" action shows a page allowing to review data entered on previous
     * three steps.
     */
    public function reviewAction()
    {
        // Validate session data.
        if (!isset($this->sessionContainer->step) ||
            $this->sessionContainer->step <= 3 ||
            !isset($this->sessionContainer->userChoices)) {
            throw new \Exception('Sorry, the data is not available for review yet');
        }

        // Retrieve user choices from session.
        $userChoices = $this->sessionContainer->userChoices;
        $userData = [ 'email' => $userChoices['step1']['email'],
            'full_name' => $userChoices['step1']['full_name'],
            'status' => 1,
            'password' => $userChoices['step1']['password'],
            'phone' => $userChoices['step2']['phone'],
            'street_address' => "Street Address",
            'city' => $userChoices['step2']['city'],
            'state' => $userChoices['step2']['state'],
            'post_code' => $userChoices['step2']['post_code'],
            'country' => $userChoices['step2']['country'],
            'billing_plan' => $userChoices['step3']['billing_plan'],
            'payment_method' => $userChoices['step3']['payment_method'],
        ];
        $this->userManager->addUser($userData);
        return new ViewModel([
            'userChoices' => $userChoices
        ]);
    }

    public function demoAction()
    {
        $this->apiResponse = ['data' => 'dkvasani'];
        return $this->createResponse();
    }
}
