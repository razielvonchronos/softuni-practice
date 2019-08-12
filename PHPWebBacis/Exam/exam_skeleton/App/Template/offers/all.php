<h1>ALL OFFERS</h1>

<?php /** @var \App\Data\FullOfferDTO[] $data */ ?>

<a href="add_offer.php">Add new Offer</a> | <a href="profile.php">My Profile</a> |
<a href="logout.php">Logout</a>
<br/>

<table border="1">
    <thead>
    <tr>
        <th>Picture</th>
        <th>Town</th>
        <th>Type</th>
        <th>Days</th>
        <th>Total Price</th>
        <th>Is available</th>
        <th>Detail</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $offer): ?>
    <tr>
        <td><img src="<?=$offer->getPictureUrl();?>" width="150"></td>
        <td><?=$offer->getTown();?></td>
        <td><?=$offer->getPrice();?></td>
        <td><?=$offer->getDays();?></td>
        <td><?=$offer->getPrice();?></td>
        <td><?=$offer->getIsOccupied() == 0 ? '<a href="#">rent</a>' : 'No' ;?></td>
        <td><a href="view.php?id=<?=$offer->getId();?>">Details</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

