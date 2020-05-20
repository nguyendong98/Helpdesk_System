<div class="phantrang">
    <?php if($current>3){
        $first_page=1; ?>
        <a class="btn btn-light"
           href="?content=suafaq&per_page=<?php echo $item_per_page ?>&page=<?php echo $first_page ?>"><?php echo 'First' ?></a>
    <?php }
    if($current>1){
        $prev_page=$current-1;
        ?>
        <a class="btn btn-light"
           href="?content=suafaq&per_page=<?php echo $item_per_page ?>&page=<?php echo $prev_page ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
    <?php } ?>
    <?php for($num=1;$num<=$total_page;$num++){ ?>
        <?php if ($num != $current){ ?>
            <?php if($num >$current-3 && $num<$current+3){	?>
                <a class="btn btn-light"
                   href="?content=suafaq&per_page=<?php echo $item_per_page ?>&page=<?php echo $num ?>"><?php echo $num ?></a>
            <?php } ?>
        <?php } else { ?>
            <!-- end nháy if -->
            <strong class="btn btn-dark"><?php echo $num ?></strong>
        <?php } ?>
        <!-- end nháy else -->
    <?php } ?>
    <!--end nháy for-->
    <?php
    if($current <$total_page ){
        $next_page=$current + 1;?>
        <a class="btn btn-light"
           href="?content=suafaq&per_page=<?php echo $item_per_page ?>&page=<?php echo $next_page ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
    <?php }
    if($current<$total_page - 2){
        $end_page=$total_page; ?>
        <a class="btn btn-light"
           href="?content=suafaq&per_page=<?php echo $item_per_page ?>&page=<?php echo $end_page ?>"><?php echo 'Last' ?></a>
    <?php } ?>
</div>