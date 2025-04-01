<?php
$mailbox = imap_open('{imap.skyblue.co.in:993/imap/ssl/novalidate-cert}INBOX', 'prasanth', 'Prasanth968@@');
if (!$mailbox) {
    echo "Failed to connect to mailbox.";
    exit;
}

$messageNumber = 9;
$structure = imap_fetchstructure($mailbox, $messageNumber);

function getContentType($structure) {
    $primaryTypes = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");
    if (isset($primaryTypes[$structure->type])) {
        return $primaryTypes[$structure->type] . '/' . $structure->subtype;
    }
    return "UNKNOWN";
}

$contentType = getContentType($structure);
echo "Content-Type: " . $contentType;

imap_close($mailbox);
?>