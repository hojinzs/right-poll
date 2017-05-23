<div class="row">
<?php
$polecat = \App\Common::getPolecatList($elected['id']);
foreach ($polecat as $num)
{
?>
  <div class="wr_panel">
      <div class="wr_panel-body">
        <div class="row">
          <div class="col-md-8">
            <h4><?php echo $num['label']?></h4>
            <p><?php echo $num['desc']?></p>
          </div>
          <div class="col-md-4">
            <span class="progress_title">이행률</span>
            <div class="w3-progress-container">
              <div class="w3-progressbar w3-blue" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">0%</div>
            </div>
          </div>
        </div>
      </div>

      <ul class="wr_list-group">
<?php
$policy = \App\Common::getPolicyList($num['id']);
foreach ($policy as $polnum) {
?>
         <li class="wr_list-group-item">
            <div class="row">
                <div class="col-md-8 col-xs-9"><a href="/policy_info.php?id=<?php echo $polnum['elected_id']?>&pol=<?php echo $polnum['id']?>"> <?php echo $polnum['title'];?></a>
                    <span class="wr_like_c"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <?php echo $polnum['likesum'];?></span>
                    <span class="wr_comment_c"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $polnum['likesum'];?></span>
                </div>
                <div class="col-md-4 col-xs-3">
                    <span class="evl">준비중</span>
                </div>
            </div>
        </li>
<?php
}
?>
      </ul>

  </div>

<?php
}
?>
</div>
