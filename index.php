<?php
if ((isset($_POST["submit"])) && ($_POST["submit"] == "(GENERATE SLUG)")) {

    $slug_input = $_POST["slugInput"];
    if (isset($_POST["removeNumbers"])) {
        // removing number from input
        $no_number_array = explode(" ", $slug_input);
        $new_array = array();
        $index = 0;
        foreach ($no_number_array as $key => $value) {
            if (is_numeric($value) != 1) {
                $new_array[$index] = $value;
                $index++;
            }
        }

        if ((isset($_POST["btnradio"])) && ($_POST["btnradio"] == "dash")) {
            $separator = $_POST["btnradio"];
            // make slug with dash
            $generate_slug = join("-", $new_array);
        } else if ((isset($_POST["btnradio"])) && ($_POST["btnradio"] == "underscore")) {
            $separator = $_POST["btnradio"];
            // make slug with underscore
            $generate_slug = join("_", $new_array);
        }
    } else {
        $include_all_array = explode(" ", $slug_input);
        if ((isset($_POST["btnradio"])) && ($_POST["btnradio"] == "dash")) {
            $separator = $_POST["btnradio"];
            $generate_slug = join("-", $include_all_array);

        } else if ((isset($_POST["btnradio"])) && ($_POST["btnradio"] == "underscore")) {
            $separator = $_POST["btnradio"];
            $generate_slug = join("_", $include_all_array);
        }
    }
}
// by clicking the clear button the page will return to its initial state
else if ((isset($_POST["clear"])) && ($_POST["clear"] == "CLEAR")) {
    unset($generate_slug);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section class="container my-5">
        <h2 class="py-4 text-center">Welcome to Slug Generator</h2>
        <form action="index.php" method="post">

            <input type="text" class="form-control my-3" name="slugInput" placeholder="Please Input Text">


            <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="dash"
            <?php if (!isset($_POST["submit"])) {echo "checked";} else if (isset($_POST["submit"]) && ($separator == "dash")) {echo "checked";}?> >
            <label class="btn btn-outline-primary me-3" for="btnradio4">Separate With Dash ( - )</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="underscore"
            <?php if (!isset($_POST["submit"])) {echo "";} else if (isset($_POST["submit"]) && ($separator != "dash")) {echo "checked";}?> >
            <label class="btn btn-outline-primary mx-0 mx-md-4" for="btnradio2">Separate With Underscore ( _ )</label>

            <input type="checkbox" name="removeNumbers" id="removeNumbers">
            <label for="removeNumbers">Remove numbers</label>

            <div class="row gy-3 my-4">
                <input class="col-6 mx-2 btn btn-primary" type="submit" name="submit" value="(GENERATE SLUG)">

                <input class="col-2 mx-2 btn btn-outline-primary" type="submit" name="clear" value="CLEAR">

                <input class="col-2 mx-2 btn btn-outline-primary" type="reset" name="reset" value="RESET">
            </div>

        </form>
    </section>

    <!-- section to show Generated slug -->
    <section class="container">
        <?php if ((isset($generate_slug)) && ($_POST["slugInput"] != "")) {?>
            <div class="my-4 py-4 border border-2">
                <h2 class="text-center py-3">Generated Slug</h2>
                <input id="slug" class="form-control text-center" type="text" value=<?php echo "{$generate_slug}" ?> aria-label="Disabled input example" disabled readonly>
                <div class="container my-4 row g-2 px-0">
                    <button class="col-12 mx-1 btn btn-outline-primary fw-bold" onclick="copyFunction()"><img src="copy-icon.png" alt=""> COPY</button>
                </div>
                <div id="success-message">

                </div>
            </div>
        <?php
}
?>
    </section>


<!-- bootstrap script  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- custom script -->
<script src="app.js"></script>
</body>
</html>
