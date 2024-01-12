<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Game</title>
    <link rel="stylesheet" href="style.css">
    <script src="rain.js" defer></script>
</head>
<body id="container">
	<!-- TODO: add a form for the user to play the game -->
    <main id="main">
        <form method="POST">
            <?php if (isset($player)): ?>

                <h1>Translate <i>this</i>!!!</h1>
                <h2>Player: <?= $player->getName(); ?></h2>
                <h2>Word: <?= $word->getWord(); ?></h2>
                <p>Right answers: <?= $player->getRightAnswers(); ?></p>
                <p>Wrong answers: <?= $player->getWrongAnswers(); ?></p>

                <?php if (empty($_POST) || isset($_POST["nickname"])): ?>

                    <label for="translationBar">Translation?</label>
                    <input type="text" id="translationBar" name="translationBar" placeholder="Enter word here...">
                    <button type="submit">Submit!</button>

                <?php elseif (!isset($_POST["gameover"])): ?>

                    <button type="submit">New word!</button>
                            
                <?php endif;?>

                <p><?= $_SESSION["message"] ?></p>
                <button name="reset" type="submit">Reset</button>
                <button name="new" type="submit">New Game</button>

            <?php else: ?>

                <h2>Please choose a nickname!</h2>
                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname" placeholder="Enter a nickname here...">
                <button type="submit">Submit!</submit>

            <?php endif; ?>
        </form>
    </main>
</body>
</html>