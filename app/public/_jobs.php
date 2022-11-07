<?php

if (file_exists('_jobs.json') && filemtime('_jobs.json') + 3600 > time()) {
  $jobs = json_decode(file_get_contents('_jobs.json'), true);
} else {
  $list = file_get_contents('http://americafence.hrmdirect.com/employment/job-openings.php?search=true');
  preg_match_all('/<tr class="reqitem.? ReqRowClick ReqRowClick".*?\>(.*?)<\/tr>/mis', $list, $out);
  $jobs = [];

  foreach ($out[1] as $job) {
    preg_match('/\?req=(\d+).*?>(.*?)</mis', $job, $link);
    $jobId = trim($link[1]);
    $title = trim($link[2]);

    preg_match('/cities.*?>(.*?)<\/td/mis', $job, $city);
    $city = trim($city[1]);

    preg_match('/state.*?>(.*?)<\/td/mis', $job, $state);
    $state = trim($state[1]);

    $jobs[] = [
      'id' => $jobId,
      'title' => $title,
      'city' => $city,
      'state' => $state,
      'about' => '',
      'full' => ''
    ];
  }

  foreach ($jobs as &$job) {
    $details = file_get_contents('http://americafence.hrmdirect.com/employment/job-opening.php?req=' . $job['id']);
    $details = mb_convert_encoding($details, 'HTML-ENTITIES', "UTF-8");
    preg_match('/class="jobDesc">(.*?)<!--HTML/mis', $details, $out);
    $lines = explode("\n", $out[1]);
    $job['about'] = trim(strip_tags($lines[0]));
    $job['full'] = $out[1];
  }
  file_put_contents('_jobs.json', json_encode($jobs));
}

usort($jobs, function($a, $b) {
  return $a['title'] > $b['title'];
});

// Details
?>
<div id="job-list">
  <?php foreach ($jobs as $job): ?>
    <div class="accordion">
      <h3 class="accordion-toggle">
        <?php echo $job['title'] ?>
        <?php if ($job['city'] && $job['state']): ?>
         - <?php echo $job['city'] ?>, <?php echo $job['state'] ?>
        <?php elseif ($job['state']): ?>
         - <?php echo $job['state'] ?>
        <?php endif ?>
      </h3>
      <div class="accordion-content">
        <?php echo preg_replace('/&#\d+?;/mis', '-', $job['full']) ?>
        <p><a href="http://americafence.hrmdirect.com/employment/job-opening.php?req=<?php echo $job['id'] ?>">Learn More</a></p>
      </div>
    </div>
  <?php endforeach ?>
</div>
<p style="margin-top: 1rem"><a href="http://americafence.hrmdirect.com/employment/job-openings.php?search=true&" style="text-decoration: uppercase; font-size: 26px; font-weight: bold; color: #fff; background: #1e315f; display: inline-block; padding: 15px 25px; border-radius: 10px; text-decoration: none">Apply Online</a></p>
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery('#job-list').find('.accordion-toggle').click(function() {
    if (jQuery(this).parent().hasClass('active')) {
      jQuery('.accordion').removeClass('active');
    } else {
      jQuery('.accordion').removeClass('active');
      jQuery(this).parent().addClass('active');
    }
  });
});
</script>
<style>
  .accordion {
    border: 1px solid #ccc;
    margin-bottom: 1em;

  }
  .accordion-toggle {
    cursor: pointer;
    position: relative;
    margin: 0 !important;
    padding: 1rem;
    padding-right: 55px;
    line-height: 1.5 !important;
  }
  .accordion-toggle:after {
    content: '+';
    display: block;
    position: absolute;
    right: 15px;
    top: 15px;
    height: 30px;
    width: 30px;
    text-align: center;
    line-height: 30px;
    border-radius: 100%;
    background: #253864;
    color: #fff;
    font-weight: bold;
  }
  .accordion-content {
    display: none;
    padding: 0 1rem;
  }
  .accordion-content a {
    color: #9f071a !important;
    font-weight: bold;
  }
  .accordion.active .accordion-content {
    display: block;
  }
  .accordion.active .accordion-toggle {
    background: #253864;
    color: #fff;
  }
  .accordion.active .accordion-toggle:after {
    color: #253864;
    background: #fff;
    content: '-';
    line-height: 26px;
  }
</style>