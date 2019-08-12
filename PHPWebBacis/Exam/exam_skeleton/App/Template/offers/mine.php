<h1>MY ITEMS</h1>

<?php
/** @var \App\Data\MyOfferDTO[] $data */

?>

<a href="add_offer.php">Add new Offer</a> | <a href="profile.php">My Profile</a> |
<a href="logout.php">Logout</a>
<br/>

<table border="1">
    <thead>
    <tr>
        <th>Town</th>
        <th>Type</th>
        <th>Days</th>
        <th>Price</th>
        <th>Is Available</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $offer): ?>
    <tr>
        <td><?=$offer->getTownName();?></td>
        <td><?=$offer->getRoomType();?></td>
        <td><?=$offer->getDays();?></td>
        <td>$<?=$offer->getPrice();?></td>
        <td><?=$offer->getIsOccupied() == 1 ? "No" : "Yes";?></td>
        <td><a href="edit.php?id=<?=$offer->getId();?>">Edit Offer</a></td>
        <td><a href="delete.php?id=<?=$offer->getId();?>">Delete Offer</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

