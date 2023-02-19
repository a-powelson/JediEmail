/*
* scripts.js
* creates and sends ajax requests for
* asynchronous email count and list updates
*/

document.body.onload = function() {
    // get initial count and then update periodically
    getEmailCountFromServer();
    setInterval(getEmailCountFromServer, 2000);

    //update list periodically
    setInterval(updateEmailList, 2000);
}

function getEmailCountFromServer() {
    let inboxLink = document.querySelector("#inboxNavLink");

    let ajax = new XMLHttpRequest();

    ajax.open("GET", "includes/emailCount.php", true);

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200)
            inboxLink.innerHTML = "Inbox (" + this.responseText + ")";
    }

    ajax.send();
}

function updateEmailList() {
    let mailList = document.querySelector("#mailList");

    let ajax = new XMLHttpRequest();

    ajax.open("GET", "includes/updateEmailList.php", true);

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200)
            mailList.innerHTML = this.responseText;
    }

    ajax.send();
}
