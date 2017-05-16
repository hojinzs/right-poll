<div class="row">
<?php
$polecat = \App\Common::getPolecatList($electedid);
foreach ($polecat as $num)
{
?>
  <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-8">
            <h4><?php echo $num['label']?></h4>
            <p><?php echo $num['desc']?></p>
          </div>
          <div class="col-md-4">
            <p>전체 이행률</p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">0%</div>
            </div>
          </div>
        </div>
      </div>

      <ul class="list-group">
<?php
$policy = \App\Common::getPolicyList($num['id']);
foreach ($policy as $polnum) {
?>
         <li class="list-group-item">
            <div class="row">
                <div class="col-md-7 col-xs-9"><a href="/policy_info.php?id=<?php echo $polnum['elected_id']?>&pol=<?php echo $polnum['id']?>"> <?php echo $polnum['title'];?></a>
                    | <span class="like"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span><?php echo $polnum['likesum'];?></span></div>
                <div class="col-md-1 col-xs-3">
                    <!-- 나중에 공약 목록에서 좋아요 하긔
                        <button type="button" class="btn btn-default btn-xs"a;lsdkjf;jlkasdfasdf>
                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 좋아요
                    </button> -->
                </div>
                <div class="col-md-4 col-xs-12">[공약이행평가]</div>
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
