<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Contracts\Queue\ShouldQueue;

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

    // // URL QR Code
    // $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=512x512&data=' . urlencode($this->qrCode);

    // // Download QR Code
    // $qrCodeImage = file_get_contents($qrCodeUrl);

    // // Simpan gambar QR Code ke penyimpanan sementara
    // $tempPath = storage_path('app/public/qrcodes/');
    // $qrCodeFileName = 'qr_code_' . $this->userId . '.png';
    // file_put_contents($tempPath . $qrCodeFileName, $qrCodeImage);

    // // Lampirkan gambar QR Code ke email
    // $qrCodePath = 'public/qrcodes/' . $qrCodeFileName;
    // $qrCodeUrl = Storage::url($qrCodePath);

    // return (new MailMessage)
    //     ->line('Selamat, Anda telah berhasil terdaftar!')
    //     ->line('ID Pengguna Anda: ' . $this->userId)
    //     ->line('Silakan scan QR Code di bawah untuk informasi lebih lanjut:')
    //     // Menggunakan attachData untuk melampirkan gambar
    //     ->attachData($qrCodeImage, $qrCodeFileName, [
    //         'mime' => 'image/png'
    //     ])
    //     ->line('Terima kasih telah bergabung.');

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
