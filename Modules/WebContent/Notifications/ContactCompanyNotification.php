<?php

namespace Modules\WebContent\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactCompanyNotification extends Notification
{
    use Queueable;

    protected $data;


    public function __construct($data)
    {
        $this->data = $data;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {

        $mailMessage = new MailMessage();
        $app_name = config('global.app_name');
        $subject = 'Mensaje de Contacto EMPRESA - ' . $this->data['name'] . ' - ' . now()->format('Y-m-d H:i:s');
        return (new MailMessage)
                    ->subject($subject)
                    ->view('webcontent::website.notifications.contactCompany', $this->data);

        return $mailMessage;
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
