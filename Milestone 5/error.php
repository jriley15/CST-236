<html>
    <head>

        <?php include 'navBar.php'; ?>
        <title>Home</title>
    </head>

    <body>

    <div class="welcome">
        <div class="wrapper">

            <div class="error">
                <?php

                //gets error type
                $type = isset($_GET['type']) ? $_GET['type'] : "";

                if ($type == "secure") {
                    echo "You must be logged in to view this page.";
                } else if ($type == "404") {

                    echo "Page doesn't exist!";
                } else if (isset($error)) {
                    echo $error;
                }?>
            </div>
        </div>
    </div>



    </body
</html>
