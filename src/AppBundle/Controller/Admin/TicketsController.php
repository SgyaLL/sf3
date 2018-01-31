<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Forms\BuyTicket;
use AppBundle\Forms\Types\BuyTicketType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketsController extends Controller
{
    public function listAllTicketsAction(Request $request): Response
    {
        $tickets = $this->get('repositories.ticket')->findAll();

        return $this->render('@App/Admin/Tickets/list_all_tickets.html.twig', ['tickets' => $tickets]);
    }

    public function listTicketsAction(Request $request, string $name): Response
     {
         $tickets = $this->get('repositories.ticket')->findTicket($name);

         return $this->render('@App/Admin/Tickets/ticket_info.html.twig', ['tickets' => $tickets]);}


    public function buyTicket(Request $request): Response
    {
        $buyTicket = new BuyTicket();

        $memberSignUpForm = $this->createForm(BuyTicketType::class, $buyTicket);

        if ($request->isMethod('POST')) {

            $memberSignUpForm->handleRequest($request);
            if ($memberSignUpForm->isSubmitted() && $memberSignUpForm->isValid()) {

                $member = $this->get('member_factory')->fromSignUp($buyTicket);

                $this->get('repositories.member')->save($member);

                $this->get('member_user_account_authenticator')->authenticate($member);

                return $this->redirectToRoute('member_sign_up_successful');
            }
        }

        return $this->render('@App/Members/member_sign_up.html.twig', ['signUpForm' => $memberSignUpForm->createView()]);
    }
}
