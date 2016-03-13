<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?
  foreach ($notice->result_array() as $row) {
  ?>
  <div class="panel panel-default">
    <div class="panel-heading notice_heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="font-12">
          <?=$row['title']?>
        </a>
      </h4>
    </div>
    <div id="notice_<?=$row['idx']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body font-10">
        <?=$row['content']?>
      </div>
    </div>
  </div>
<? }?>

</div>
