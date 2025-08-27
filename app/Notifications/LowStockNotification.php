<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection; // Import Collection

class LowStockNotification extends Notification implements ShouldQueue
{
    use Queueable;

    // Tambahkan properti untuk menampung produk yang stoknya menipis
    protected $lowStockProducts;

    /**
     * Create a new notification instance.
     *
     * @param \Illuminate\Support\Collection $lowStockProducts
     */
    public function __construct(Collection $lowStockProducts)
    {
        $this->lowStockProducts = $lowStockProducts;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        // Kita akan mengirim via email. Anda bisa menambahkan channel lain seperti 'database'.
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
                    ->subject('Notifikasi Stok Menipis')
                    ->line('Pemberitahuan, beberapa produk di inventaris Anda telah mencapai batas stok minimum.')
                    ->line('Harap segera lakukan pemesanan ulang.');

        // Tambahkan daftar produk ke email
        foreach ($this->lowStockProducts as $product) {
            $message->line(" - **{$product->name}** (SKU: {$product->sku}) - Stok Sisa: **{$product->stock}**");
        }

        $message->action('Lihat Dashboard', url('/dashboard'))
                ->line('Terima kasih telah menggunakan aplikasi kami!');

        return $message;
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            // Representasi untuk channel 'database' jika digunakan
        ];
    }
}
