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

  .cardContainer {
    width: 90%;
    margin: 0 auto;
    padding: 0.5em 0;
    display: flex;
    flex-flow: wrap;

  }

  .cards {
    width: 90%;
    margin: 0.5em auto;
    flex: 1 0 24%;
    margin: 1%;
  }

  .card {
    color: #FFF5EE;
  }
</style>

<main role="main" class="container">

  <br />
  <div class="cardContainer">
  <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('./show/show.php');

        $show = new show();
        $shows = $show->getMyShows($_SESSION["user_id"]);

        $listLength = count($shows);

        for($i = 0; $i < $listLength; $i++) {
            echo '<div class="cards w3-card-4 w3-grey">
                    <div class="card">
                        <h1 >' . $shows[$i]->getShowName() . '</h1>
                        <h4 >Rating: ' . $shows[$i]->getShowrating() . '</h4>
                        <p >Description: ' . $shows[$i]->getShowDescription() . '</p>
                        <a href="delete_show.php?show_id=' . $shows[$i]->getShowId() . '">Delete Show</a>
                    </div>
                  </div>
                  <br />';
        }
      ?>
  </div>
  <form action="create_show.php">
    <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="Add Show" /></center>
  </form>
</main>
<?php require_once('footer.php'); ?>
