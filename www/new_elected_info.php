<h3>
    정보
</h3>
<ul>
    <li>
        <?=$elected['name']?>
    </li>
    <li>
        <?=$elected['chair']?>
    </li>
    <li>
        선거: <?=$elected['election_name']?>
    </li>
    <li>
        당선일: <?=$elected['elected_at']?>
    </li>
    <li>
        임기 시작일: <?=$elected['duty_start']?>
    </li>
    <li>
        임기 종료일: <?=$elected['duty_end']?>
    </li>
    <li>
        공약집: <a href="<?=$elected['policy_file']?>" target="_blank">다운로드</a>
    </li>
</ul>
