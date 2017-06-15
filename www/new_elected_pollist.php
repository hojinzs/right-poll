<h4>우리 이니, 하고 싶은거 목록</h4>

<?php
$polecat = \App\Common::getPolecatList($elected['id']);
foreach ($polecat as $num)
{
?>
<div class="wr_panel">
  <div class="wr_panel-body row">
      <div class="wr_panel-left col-md-8">
        <h4><?php echo $num['label']?></h4>
        <p><?php echo $num['desc']?></p>
      </div>
      <div class="wr_panel-right col-md-4">
        이행률<span class="progress_per">0%</span>
        <div class="w3-progress-container">
          <div class="w3-progressbar w3-blue" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0.3em;"></div>
        </div>
      </div>
  </div>

      <ul class="wr_list-group">
<?php
$policy = \App\Common::getPolicyList($num['id']);
foreach ($policy as $polnum) {
?>
         <li class="wr_list-group-item">
             <a href="/@<?php echo $elected['url']?>/policy/<?php echo $polnum['id']?>"> <?php echo $polnum['title'];?></a>
             <span class="wr_like_c"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <?php echo $polnum['likesum'];?></span>
             <span class="wr_comment_c"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $polnum['cmt_sum'];?></span>
        </li>
<?php
}
?>
      </ul>

  </div>

<?php
}
?>
