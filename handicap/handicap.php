<!--
The MIT License (MIT)
Copyright (c) 2015 Clement Allen
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
-->

<!-- fork this project on GitHub! http://github.com/clementallen/gliding-tools/ -->

<!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Calculates handicapped speed of task">
    <meta name="author" content="Clement Allen">

    <title>Handicapped speed calculator</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/gliding.css" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

<a class="banner-hide" target="_blank" href="https://github.com/clementallen">
<img class="github-fork-banner" style="position: absolute; top: 0; left: 0; border: 0;" src="https://camo.githubusercontent.com/c6625ac1f3ee0a12250227cf83ce904423abf351/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_gray_6d6d6d.png">
</a>

<?php

date_default_timezone_set('UTC');

if ($_POST['submit']) { //check if submit button as been clicked

    $speed = $_POST['speed']; //gets speed from the form
    $handicap = $_POST['handicap']; //gets handicap from the form

    function validate($input){ //validates inputs
        if (!$input) { //if the input has not been entered
            $error = 'Please enter a value';
        }
        elseif (!is_numeric($input)){ //if the input is not a number
            $error = 'Please enter a number';
        }
        else {
            $error = null; //if validation has passed don't define the variable
        }

        return $error;
    }


    $errSpeed = validate($speed); //validates speed
    $errHandicap = validate($handicap); //validates handicap

    $handicapSpeed = ($speed / $handicap) * 100;

    $handicapSpeed = round($handicapSpeed, 1);

    if (!$errSpeed && !$errHandicap) { // If there are no errors print out result
        $result = '<div class="alert alert-success">You flew at a handicapped speed of ' . $handicapSpeed . '</div>';
    }

}
?>

    <div class="container">

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="panel panel-default center-text">
                        <h1>Handicapped speed calculator</h1>
                        <br />

                            <form novalidate class="form-horizontal" role="form" method="post">

                                <div class="form-group">
                                <label for="speed" class="col-sm-2 control-label center-block">Speed</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="speed" name="speed" placeholder="Enter flown task speed" value="<?php if(!isset($errSpeed)){echo$speed;} ?>">
                                <?php echo "<p class='text-danger'>$errSpeed</p>";?>
                                </div>
                                </div>

                                <div class="form-group">
                                <label for="handicap" class="col-sm-2 control-label">Handicap</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="handicap" name="handicap" placeholder="Enter handicap" value="<?php if(!isset($errHandicap)){echo$handicap;} ?>">
                                <?php echo "<p class='text-danger'>$errHandicap</p>";?>
                                </div>
                                </div>


                                <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                <input id="submit" name="submit" type="submit" value="Calculate" class="btn btn-primary">
                                </div>
                                </div>

                                <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                <?php echo $result; ?>
                                </div>
                                </div>

                            </form>

                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-12" id="footer">
            <p>Created by <a target="_blank" href="http://clementallen.com">Clement Allen</a> - <?php echo date('Y'); ?>.</p>
            </div>

    </div><!-- /container -->

</body>

</html>
