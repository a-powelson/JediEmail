<?php
// redirect user in case of unauthorized access
redirect();

echo "<h2>";

if(!isset($_SESSION['fname']))
    echo "Login to JediMail";

else if(isset($_GET['draft']))
    echo "Drafts/saved emails";

else if(isset($_GET['show']) && !isset($_GET['draft'])) {
    if ($_GET['show'] === 'sent')
        echo "Sent Emails";
    elseif ($_GET['show'] == 'compose')
        echo "Compose a new email";
    else
        echo "Inbox";
}

else
    echo "Inbox";

echo "</h2>";
echo "<div id='border'></div>";
?>