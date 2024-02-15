<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationNotification extends Notification
{
    use Queueable;

    protected $qrCode;
    protected $userId;

    /**
     * Create a new notification instance.
     */
    public function __construct($qrCode, $userId)
    {
        $this->qrCode = $qrCode;
        $this->userId = $userId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Selamat, Anda telah berhasil terdaftar!')
            ->line('ID Pengguna Anda: ' . $this->userId)
            ->line('Silakan scan QR Code di bawah untuk informasi lebih lanjut:')
            ->line('')
            ->line($this->qrCode)
            ->line('')
            ->line('Terima kasih telah bergabung.');
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
