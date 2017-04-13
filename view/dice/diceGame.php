<h1 id="dice">Dice Game</h1>

<?php
$session = new \Radchasay\Session\Session("r");
$session->start();

$session->set("dice", $session->has("dice") ? $session->get("dice") : new \Radchasay\DiceGame\Game());

if (isset($_POST["roll"])) {
    $session->get("dice")->game("roll");
}

if (isset($_POST["save"])) {
    $session->get("dice")->game("save");
}

if (isset($_POST["reset"])) {
    unset($_SESSION["dice"]);
    header("Location: diceGame");
    exit;
}

?>


<h1 id="currentPlayer">Player <?= $session->get("dice")->getCurrentPlayer() ?></h1>
<div class="info">
    <p>History: <?= $session->get("dice")->getRolls() ?></p>
    <p>Score: <?= $session->get("dice")->getCurrentScore() ?></p>

    <p>Player0 Score: <?= $session->get("dice")->getPlayerScore(0) ?> </p>
    <p>Player1 Score: <?= $session->get("dice")->getPlayerScore(1) ?>
</div>
<div class="wutToDo">
    <p>Samla ihop poäng för att komma först till 100.</p>
    <p>I varje omgång kastar en spelare tärning tills hon väljer att stanna och spara poängen eller tills det dyker upp
        en 1:a och hon förlorar alla poäng som samlats in i rundan.</p>
    <p>Rundan går då över till nästa spelare. Det gäller att komma först till 100.</p>
</div>
<form class="form" action="" method="POST">
    <?php if ($session->get("dice")->won == false) : ?>
        <div class="buttons">
            <input type="submit" value="save" name="save">
            <input type="submit" value="roll" name="roll">
        </div>
    <?php else : ?>
        <div class="buttons">
            <input type="submit" value="save" name="save" disabled>
            <input type="submit" value="roll" name="roll" disabled>
            <input type="submit" value="Reset" name="reset">
        </div>
    <?php endif; ?>
</form>
