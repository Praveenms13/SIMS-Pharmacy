<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<?php
Session::loadTemplate('_head')
?>

<body>
    <?php
    Session::loadTemplate('_header');
    Session::loadTemplate(Session::currentScript());
    Session::loadTemplate('_footer');
    Session::loadTemplate('_script');
    ?>
    <script>
        //alert("Hi!, Due to unavoidable situations, All the datas in the database are deleted, even I dont have any backup for this database 😭. I am working on it and will fix as soon as possible 🥰. Users Can't Login, Signup, Post Images, Videos, do likes and shares.")
        const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
            .then(FingerprintJS => FingerprintJS.load())
        fpPromise
            .then(fp => fp.get())
            .then(result => {
                const visitorId = result.visitorId
                console.log("Here");
                console.log("Your Fingerprint: " + visitorId);
                setCookie("fingerprintJSid", visitorId, 1);
            });
    </script>
</body>

</html>