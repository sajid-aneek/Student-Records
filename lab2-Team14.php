<html>
<head>
    <meta charset="UTF-8">
    <link rel="" type="text/css" href="">
    <title>Art Work Database</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header-container">
        <h1>Art Work Database</h1>
        <p>
            This database comprises many digital artworks from the 21<sup>st</sup> century.
        </p>
        <hr>
    </div>
    
    <div>
        <p>Enter the fields below to add an artwork to the database:</p>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onreset="resetAll()">
        <div class="form-container">
            <div class="form-input-container">
                <table>
                    <tr>
                        <td>
                            <table class="form-input-table">
                                <tr>
                                    <td>
                                    <input id="title" type="text" name="title" placeholder="Title" oninput="getTitle()">
                                        <br>
                                        <input id="description" type="text" name="description" placeholder="Description" oninput="getDescription()">
                                    </td>
                                    <td>
                                    <input id="year" required type="text" name="year" placeholder="Year" oninput="getYear()">
                                        <br>
                                        <input id="museum" required type="text" name="museum" placeholder="Museum" oninput="getMuseum()">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Choose Genre</h3>
                                        <select id="genre" name="genre" oninput="getGenre()">
                                            <option selected disabled value="">Genre</option>
                                            <option value="Abstract">Abstract</option>
                                            <option value="Baroque">Baroque</option>
                                            <option value="Gothic">Gothic</option>
                                            <option value="Renaissance">Renaissance</option>
                                        </select>
                                    </td>
                                    <td>
                                        <h3>Type of Artwork</h3>
                                        <select id="type" name="type" oninput="getType()">
                                            <option selected disabled value="">Type</option>
                                            <option value="Sculpture">Sculpture</option>
                                            <option value="Painting">Painting </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3>Choose Subject</h3>        
                                        <select id="subject" name="subject" oninput="getSubject()">
                                            <option selected disabled value="">Subject</option>
                                            <option value="Landscape">Landscape</option>
                                            <option value="Portrait">Portrait</option>
                                        </select>
                                    </td>
                                    <td>
                                        <h3>Specification</h3>
                                        <select id="spec" name="specification" oninput="getSpec()">
                                            <option selected disabled value="">Specification</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Non-Commercial">Non-commercial</option>
                                            <option value="Derivative Work">Derivative Work</option>
                                            <option value="Non-Derivative Work">Non-Derivative Work</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="option-container">
                <button type="submit" value="save">Save Record</button>
                <button type="reset" value="clear">Clear Record</button>
            </div>

            <div class="sample-container">   
                <h3>Sample<h3>
                 
                <table class="record.container">
                    <tr>
                        <td>Title: </td>
                        <td><p id="titleH">--------------------</p></td>
                    </tr>

                    <tr>
                        <td>Decription: </td>
                        <td><p id="desH">--------------------</p></td>
                    </tr>

                    <tr>
                        <td>Genre: </td>
                        <td><p id="genreH">--------------------</p></td>
                    </tr>
                    <tr>
                        <td>Type: </td>
                        <td> <p id="typeH">--------------------</p></td>
                    </tr>
                    <tr>
                        <td>Subject: </td>
                        <td><p id="subjectH">--------------------</p></td>
                    </tr>
                    <tr>
                        <td>Specification: </td>
                        <td><p id="specH">--------------------</p></td>
                    </tr>
                    <tr>
                        <td>Year: </td>
                        <td><p id="yearH">--------------------</p></td>
                    </tr>
                    <tr>
                        <td>Museum: </td>
                        <td><p id="museumH">--------------------</p></td>
                    </tr>
                </table> 
            </div>
        </div>
    </form>

    <hr>

    <div class="record-container">
        <?php
            $artwork = [
                "Title" =>
                    $_POST["title"] ?? "N/A",
                "Description" =>
                    $_POST["description"] ?? "N/A",
                "Year" => 
                    $_POST["year"] ?? "N/A",
                "Museum" => 
                    $_POST["museum"] ?? "N/A",
                "Genre" => 
                    $_POST["genre"] ?? "N/A",
                "Artwork" => 
                    $_POST["type"] ?? "N/A",
                "Subject" => 
                    $_POST["subject"] ?? "N/A",
                "Specification" => 
                    $_POST["specification"] ?? "N/A",
            ];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Print the data submitted in the form
                echo '<h3>Created Record:</h3>';
                foreach ($artwork as $key => $value)
                    echo '<b>'. $key .'</b><br>' . $value .'<br><br>';
            }
        ?>
    </div>

    <script>
            function getTitle() {
                var title = document.getElementById("title").value;
                document.getElementById("titleH").innerHTML = title || "--------------------";
            }

            function getDescription() {
                var des = document.getElementById("description").value;
                document.getElementById("desH").innerHTML = des || "--------------------";
            }

            function getSubject() {
                var subject = document.getElementById("subject");
                document.getElementById("subjectH").innerHTML = subject.options[subject.selectedIndex].value || "--------------------";
            }

            function getType() {
                var type = document.getElementById("type");
                document.getElementById("typeH").innerHTML = type.options[type.selectedIndex].value || "--------------------";
            }

            function getGenre() {
                var genre = document.getElementById("genre");
                document.getElementById("genreH").innerHTML = genre.options[genre.selectedIndex].value || "--------------------";
            }

            function getSpec() {
                var spec = document.getElementById("spec");
                document.getElementById("specH").innerHTML = spec.options[spec.selectedIndex].value || "--------------------";
            }

            function getYear() {
                var year = document.getElementById("year").value;
                document.getElementById("yearH").innerHTML = year || "--------------------";
            }

            function getMuseum() {
                var museum = document.getElementById("museum").value;
                document.getElementById("museumH").innerHTML = museum || "--------------------";
            }

            function resetAll() {
                document.getElementById("title").value = "";
                document.getElementById("description").value = "";
                document.getElementById("subject").value = "";
                document.getElementById("type").value = "";
                document.getElementById("genre").value = "";
                document.getElementById("spec").value = "";
                document.getElementById("year").value = "";
                document.getElementById("museum").value = "";

                getTitle();
                getDescription();
                getSubject();
                getType();
                getGenre();
                getSpec();
                getYear();
                getMuseum();
            }
    </script>                 
</body>
</html