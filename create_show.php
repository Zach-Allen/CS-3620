<?php
    require_once('sessioncheck.php'); 
    require_once('header.php');
?>  

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    h1 {
        text-align: center;
    }

    div {
        text-align: center;
        font-size: 20px;
    }

    th {
        text-align: left;
    }

    a {
        color: blue;
        font-size: 20px;
    }
</style>

<title>Add Show</title>


<form method="POST" action="insert_show.php">
            <div>Show name:<input class="w3-input" type="text" name="show_name" onfocus="this.value=''" /></div>
            <div>Show Rating:<input class="w3-input" type="text" name="show_rating" onfocus="this.value=''" /></div>
            <div>Show description:<input class="w3-input" type="text" name="show_description" onfocus="this.value=''" /></div>
            <center>
                <input 
                    class="btn btn-primary w3-button w3-round w3-blue buttonStyle" 
                    type="submit"
                    value="Create Show" 
                />
            </center>
</form>


<?php
    require_once('./footer.php');
?>