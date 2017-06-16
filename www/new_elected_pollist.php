<?php

// 당선자의 공약 카테고리 목록을 가져옴
$polecat = \App\Common::getPolecatList($elected['id']);

// 당선자의 공약 목록을 가져옴
$policy_list = \App\Common::getPolicyListByElected($elected['id']);

// $tmp_policy에 출력을 위한 배열을 생성
foreach ($polecat as $num) {

    $tmp_policy[$num['id']] = $num;

    foreach ($policy_list as $policy) {

        if ($policy['polcat_id'] == $num['id']) {

        $tmp_policy[$num['id']]['child'][] = $policy;

        }

    }
}

if(isset($tmp_policy)):

?>

<h4>우리 이니, 하고 싶은거 목록</h4>

<?php foreach ($tmp_policy as $num): ?>
    <div class="wr_panel">
      <div class="wr_panel-body row">
          <div class="wr_panel-left col-md-8">
            <h4><?=$num['label']?></h4>
            <p><?=$num['desc']?></p>
          </div>
          <div class="wr_panel-right col-md-4">
            이행률<span class="progress_per">0%</span>
            <div class="w3-progress-container">
              <div class="w3-progressbar w3-blue" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0.3em;"></div>
            </div>
          </div>
      </div>

      <?php if (isset($num['child'])): //카테고리에 공약이 있는지 확인. 없으면 출력 안함. ?>
          <ul class="wr_list-group">
            <?php foreach ($num['child'] as $polnum): ?>
                 <li class="wr_list-group-item">
                     <a href="/el/<?=$elected['url']?>/policy/<?=$polnum['id']?>"> <?=$polnum['title'];?></a>
                     <span class="wr_like_c"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <?=$polnum['likesum'];?></span>
                     <span class="wr_comment_c"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?=$polnum['cmt_sum'];?></span>
                </li>
            <?php endforeach; ?>
          </ul>
      <?php endif;?>

    </div>
<?php endforeach; ?>

<?php endif; ?>
