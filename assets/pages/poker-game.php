
<body>

<?php 
    foreach (CardExamples::getRoyalFlush() as $i=>$card):
    ?>
        <img src="<?=$card->getImagePath()?>" alt="stock image" class="rounded" width="20%" id="<?=$i?>">
        <label class="h2" for="<?=$i?>" id="label-<?=$i?>"><?=$card->getName()?></label>
    <?php
    endforeach;
?>
<h3 id="to-change1">this should be changed</h3>
<h3 id="to-change2">this should be changed</h3>

</body>

<script src="assets/request/handleRequestPokerGame.js"></script>