<?php

namespace CodeCommerce\Listeners;
use Mail;
use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user = $event->getUser();
        $order = $event->getOrder();

        Mail::send(
            'emails.store.checkout',
            ['user'  => $user,
             'order' => $order],
            function($m) use ($user){
                $m->from('loja@localhost.com','Loja Laravel');

                $m->to($user->email,$user->name)->subject('Pedido Recebido!!');
            }
        );
    }
}
