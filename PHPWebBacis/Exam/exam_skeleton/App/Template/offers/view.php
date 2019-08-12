
<?php /** @var array $errors |null */ ?>
<?php /** @var \App\Data\FullOfferDTO $data */ ?>

<h1>Offer № <?= $data->getId(); ?></h1>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<a href="profile.php">My Profile</a>
<br/>

<img src="<?=$data->getPictureUrl();?>"/><br>

<b>Town: </b> <?= $data->getTown(); ?><br/>
<b>Room Type: </b> <?= $data->getRoom(); ?><br/>
<b>Description: </b> <?= $data->getDescription(); ?><br/>
<b>Days: </b> <?= $data->getDays(); ?><br/>
<b>Price: </b> $<?= $data->getPrice(); ?><br/>
<b>Is Available: </b> $<?= $data->getIsOccupied() == 0 ? 'Yes' : 'No'; ?><br/>
<hr>
<b>Offer Author: </b> <?= $data->getUser()->getName(); ?><br/>
<b>Offer Phone: </b> <?= $data->getUser()->getPhone(); ?><br/>

