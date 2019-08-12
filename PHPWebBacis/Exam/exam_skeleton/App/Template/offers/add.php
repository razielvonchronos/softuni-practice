<h1>ADD OFFER</h1>

<?php /** @var array $errors |null */
use App\Data\RoomDTO;
use App\Data\TownDTO; ?>
<?php /** @var TownDTO[] $data['towns'] */ ?>
<?php /** @var RoomDTO[] $data['rooms'] */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<a href="profile.php">My Profile</a>
<br/>
<br/>


<form method="post">
    <label>
        Town:<br>
        <select name="townId">
            <?php foreach ($data['towns'] as $t): ?>
            <option value="<?= $t->getId() ?>"> <?= $t->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <br/>
    <label>
        Room:<br>
        <select name="roomId">
            <?php foreach ($data['rooms'] as $r): ?>
            <option value="<?= $r->getId() ?>"> <?= $r->getType() ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <br/>
    <label>
        Image: <br>
        <input type="text" name="picture_url"/> <br/>
    </label>
    <br/>
    <label>
        Description: <br>
        <textarea name="description"></textarea>
    </label>
    <br/>
    <label>
        Days: <br>
        <input type="text" name="days"/> <br/>
    </label>
    <br/>
    <label>
        Price:<br>
        <input type="text" name="price"/> <br/>
    </label>
    <input type="submit" name="add" value="Add Offer"/> <br/>

</form>
