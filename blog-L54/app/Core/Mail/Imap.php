<?php

namespace App\Core\Mail;

// Buil up Imap handler UI

use Illuminate\Database\Eloquent\Model;
use App\Core\MailMailbox as ImapMailbox;
use App\Core\Mail\IncomingMail;
use App\Core\Mail\IncomingMailAttachment;

class Imap extends Model
{




    //
}



//Usage example

// 4. argument is the directory into which attachments are to be saved:
/* $mailbox = new PhpImap\Mailbox('{imap.gmail.com:993/imap/ssl}INBOX', 'some@gmail.com', '*********', __DIR__);

// Read all messaged into an array:
$mailsIds = $mailbox->searchMailbox('ALL');
if(!$mailsIds) {
    die('Mailbox is empty');
}

// Get the first message and save its attachment(s) to disk:
$mail = $mailbox->getMail($mailsIds[0]);

var_dump($mail);
echo "\n\n\n\n\n";
var_dump($mail->getAttachments());
*/
