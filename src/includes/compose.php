<?php
// redirect user in case of unauthorized access
redirect();

if(isset($_POST['send'])){
        $recipEmail = sanitizeData($_POST['recip-email']);
        $recipfname = sanitizeData($_POST['recip-fname']);
        $emailSubj = sanitizeData($_POST['emailSubject']);
        $emailBody = sanitizeData($_POST['emailBody']);

        $sendQuery = "INSERT INTO j_mail (j_mail_recipient_email, j_mail_recipient_fullname,
                                          j_mail_sender_email, j_mail_sender_fullname, j_mail_subject,
                                          j_mail_text, j_mail_date, j_mail_draft)
                        VALUES ('{$recipEmail}', '{$recipfname}',
                                '{$_SESSION['email']}', '{$_SESSION['fname']} {$_SESSION['lname']}',
                                '{$emailSubj}', '{$emailBody}',
                                current_date, 0)";

        $conn->query($sendQuery);

        header("Location: index.php?show=inbox");
        die();
    }

    if(isset($_POST['save'])){
        $recipEmail = sanitizeData($_POST['recip-email']);
        $recipfname = sanitizeData($_POST['recip-fname']);
        $emailSubj = sanitizeData($_POST['emailSubject']);
        $emailBody = sanitizeData($_POST['emailBody']);

        $saveQuery = "INSERT INTO j_mail (j_mail_recipient_email, j_mail_recipient_fullname,
                                          j_mail_sender_email, j_mail_sender_fullname, j_mail_subject,
                                          j_mail_text, j_mail_date, j_mail_draft)
                        VALUES ('{$recipEmail}', '{$recipfname}',
                                '{$_SESSION['email']}', '{$_SESSION['fname']} {$_SESSION['lname']}',
                                '{$emailSubj}', '{$emailBody}',
                                current_timestamp , 1)";

        $conn->query($saveQuery);

        header("Location: index.php?show=inbox");
        die();
    }
?>

<form id="composeEmailForm" action="index.php?show=compose" method="post">
    <div id="composeEmailInputs">
        <label for="recipNameBox">Recipient full name:</label>
        <input type="text" name="recip-fname" id="recipNameBox" required>
        <label for="recipEmailBox">Recipient email:</label>
        <input type="text" name="recip-email" id="recipEmailBox" required>
        <label for="emailSubjectBox">Email subject:</label>
        <input type="text" name="emailSubject" id="emailSubjectBox" required>
        <label for="emailBodyBox">Email text content:</label>
        <textarea name="emailBody" id="emailBodyBox" form="composeEmailForm" required></textarea>
    </div>
    <div id="composeEmailButtons">
        <input type="submit" id="sendButton" name="send" value="Send email">
        <input type="submit" id="saveButton" name="save" value="Save draft">
        <input type="reset" id="composeClearButton" name="clear" value="Clear contents">
    </div>
</form>