<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\RentModel;
use App\Models\Book;
use DB;

class RentMail extends Mailable
{
    use Queueable, SerializesModels;

      public $user;
      public $books;

    /**
     * Create a new message instance.
     */
    public function __construct(RentModel $user)
    {
        $this->user = $user;
        $this->books = DB::table('rentlist')->join('books', 'rentlist.book_id', '=', 'books.id')->where('rent_user_id', $this->user->id)->get();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Book Rent Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    public function build()
    {
        return $this->view('emails.rent');
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
