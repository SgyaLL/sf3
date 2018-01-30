<?php

namespace AppBundle\Controller;

use AppBundle\Forms\UserSubmission;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolation;
use Tiquette\Domain\User;
use Tiquette\Infrastructure\Repositories\InMemoryUserRepository;

class UsersController extends Controller
{
    public function submitUserAction(Request $request): Response
    {
        $userSubmission = new UserSubmission();
        $userSubmission->userName = $request->request->get('user_name');
        $userSubmission->userEmail = $request->request->get('user_email');
        $userSubmission->userPassword = $request->request->get('user_password');

        if ($request->isMethod('POST')) {
            $violations = $this->get('validator')->validate($userSubmission);
            if (\count($violations) > 0) {

                /** @var ConstraintViolation[] $violations */
                return $this->render('@App/Sales/submit_user.html.twig', ['violations' => $violations]);
            }

            $user = User::submit(
                $userSubmission->userName,
                $userSubmission->userEmail,
                $userSubmission->userPassword

            );

            $this->get('repositories.user')->save($user);

            return $this->redirectToRoute('user_sub');
        }

        return $this->render('@App/Sales/submit_user.html.twig', ['violations' => []]);
    }

    public function userSubmissionSuccessfulAction(Request $request): Response
    {
        return $this->render('@App/Sales/user_sub_successfull.html.twig');
    }
}
