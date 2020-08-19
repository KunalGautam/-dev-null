<?php
include 'createFile.php';

$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
$username = 'email@gmail.com';
$password = '********';

if ($imap = imap_open($hostname, $username, $password))
{
    // Checks the inbox
    if ($messages = imap_search($imap, 'UNSEEN')) //UNSEEN or ALL
	{
        // Sorts the messages newest first
        rsort($messages);

      //  var_dump($messages);

        // Loops through the messages
        foreach ($messages as $message_number)
        {
            // Grabs the header, body and structure of the email
            $header = imap_headerinfo($imap, $message_number);
            $message  = imap_fetchbody($imap, $message_number, 2);
            $structure = imap_fetchstructure($imap, $message_number);




            $unixtime = $header->udate;
            $from =  $header->fromaddress;
            $to =  $header->to[0]->mailbox . "@" . $header->to[0]->host;
            $subject = $header->subject;
            $attachments = array();




            $folder = $to . '/' . date("Y/M/d", $unixtime ) . "/". $unixtime;
            $file = $unixtime . '.html';
            //Save Subject
            writeData($folder, 'Subject - ' . $file, $subject);
            //Save Email Body
            writeData($folder, $file, $message);


             /* if any attachments found... */
        if(isset($structure->parts) && count($structure->parts))
        {
            for($i = 0; $i < count($structure->parts); $i++)
            {
                $attachments[$i] = array(
                    'is_attachment' => false,
                    'filename' => '',
                    'name' => '',
                    'attachment' => ''
                );

                if($structure->parts[$i]->ifdparameters)
                {
                    foreach($structure->parts[$i]->dparameters as $object)
                    {
                        if(strtolower($object->attribute) == 'filename')
                        {
                            $attachments[$i]['is_attachment'] = true;
                            $attachments[$i]['filename'] = $object->value;
                        }
                    }
                }

                if($structure->parts[$i]->ifparameters)
                {
                    foreach($structure->parts[$i]->parameters as $object)
                    {
                        if(strtolower($object->attribute) == 'name')
                        {
                            $attachments[$i]['is_attachment'] = true;
                            $attachments[$i]['name'] = $object->value;
                        }
                    }
                }

                if($attachments[$i]['is_attachment'])
                {
                    $attachments[$i]['attachment'] = imap_fetchbody($imap, $message_number, $i+1);

                    /* 3 = BASE64 encoding */
                    if($structure->parts[$i]->encoding == 3)
                    {
                        $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                    }
                    /* 4 = QUOTED-PRINTABLE encoding */
                    elseif($structure->parts[$i]->encoding == 4)
                    {
                        $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                    }
                }
            }
        }

        /* iterate through each attachment and save it */
        foreach($attachments as $attachment)
        {
            if($attachment['is_attachment'] == 1)
            {
                $filename = $attachment['name'];
                if(empty($filename)) $filename = $attachment['filename'];

                if(empty($filename)) $filename = time() . ".dat";

                /* prefix the email number to the filename in case two emails
                 * have the attachment with the same file name.
                 */
                $fp = fopen($folder . '/' . $filename, "w+");
                fwrite($fp, $attachment['attachment']);
                fclose($fp);
            }

        }



        }

    }
	else
	{
        exit('No messages on the IMAP server.');
    }
}
else
{
    exit('Unable to connect to the IMAP server.');
}
