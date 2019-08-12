<h1>EDIT ITEM</h1>

<?php /** @var array $errors |null */ ?>
<?php /** @var \App\Data\EditOfferDTO $data */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<a href="profile.php">My Profile</a>
<br/>
<br/>

<form method="post">
    <label>
        Town:<br>
        <select name="town_id">
            <?php foreach ($data->getTowns() as $town): ?>
                <option <?= $town->getId() == $data->getTownId() ? 'selected' : ''?> value="<?=$town->getId();?>"><?=$town->getName();?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <br/>
    <label>
        Room Type:<br>
        <select name="room_id">
            <?php foreach ($data->getRooms() as $room): ?>
                <option <?= $room->getId() == $data->getRoomId() ? 'selected' : ''?> value="<?=$room->getId();?>"><?=$room->getType();?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <br/>
    <label>
        Image URL: <br>
        <input type="text" name="picture_url" value="<?=$data->getPictureUrl();?>"/><br />
    </label>
    <br>
    <label>
        Description:<br>
        <textarea name="description"><?=$data->getDescription();?></textarea>
    </label>
    <br/>
    <label>
        Days: <br>
        <input type="text" name="days" value="<?=$data->getDays();?>"/> <br />
    </label>
    <label>
        Price: <br>
        <input type="text" name="price"/ value="<?=$data->getPrice();?>"> <br />
    </label>
    <label>
        Is Occupied:
        <input type="checkbox" name="is_occupied" value="1" <?= $data->getIsOccupied() == 1 ? "checked" : ""?>> <br />
    </label>
    <input type="submit" name="edit" value="Edit Offer"/> <br />

</form>
