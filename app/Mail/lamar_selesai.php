<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class lamar_selesai extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $nama,$sekolah,$judul,$perusahaan,$tgl_selesai;
    public function __construct($nama,$sekolah,$judul,$perusahaan,$tgl_selesai)
    {
        $this->nama = $nama;
        $this->sekolah = $sekolah;
        $this->judul = $judul;
        $this->perusahaan = $perusahaan;
        $this->tgl_selesai = $tgl_selesai;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Siswa Telah Menyelesaikan PKL',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.lamar_selesai',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
