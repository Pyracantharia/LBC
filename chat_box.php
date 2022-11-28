<?php
require 'template/head.php';
?>

<link rel="stylesheet" href="/css/chat_box_style.css">

<?php
require 'template/header.php';
?>
<div class="chat-global">

<div class="nav-top">
    <div class="location">
        <img src="ressources/left-chevron.svg">
        <p>Back</p>
    </div>

    <div class="utilisateur">
        <p>Nicolai</p>
        <p>Active Now</p>
    </div>

    <div class="logos-call">
        <img src="ressources/phone.svg">
        <img src="ressources/video-camera.svg">
    </div>
</div>




<form class="chat-form">

    <div class="container-inputs-stuffs">

        <div class="files-logo-cont">
            <img src="ressources/paperclip.svg">
        </div>

        <div class="group-inp">
            <textarea placeholder="Enter your message here" minlength="1" maxlength="1500"></textarea>
            <img src="ressources/smile.svg">
        </div>


        <button class="submit-msg-btn">
        <img src="ressources/send.svg">
    </button>
    </div>

</form>
</div>
<div class="header-separ"></div>

<?php
require 'template/footer.php';
?>