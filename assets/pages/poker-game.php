
<body>

<?php 
    foreach (CardExamples::getRoyalFlush() as $i=>$card):
    ?>
        <img src="<?=$card->getImagePath()?>" alt="stock image" class="rounded" width="20%" id="<?=$i?>">
        <label for="<?=$i?>" id="lable<?=$i?>"><?=$card->getName()?></label>
    <?php
    endforeach;
?>

</body>

<script src="assets/js/handleRequestPokerGame.js"></script>