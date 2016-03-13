<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?
  foreach ($notice->result_array() as $row) {
  ?>
  <div class="panel panel-default">
    <div class="panel-heading notice_heading" role="tab" id="heading<?=$row['idx']?>">
      <h4 class="panel-title">
        <a class="collapsed font-12" role="button" data-toggle="collapse" data-parent="#accordion" href="#notice_<?=$row['idx']?>" aria-expanded="true" aria-controls="notice_<?=$row['idx']?>" >
          <?=$row['title']?>
        </a>
      </h4>
    </div>
    <div id="notice_<?=$row['idx']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$row['idx']?>">
      <div class="panel-body font-10">
        <?=$row['content']?>
      </div>
    </div>
  </div>
<? }?>

</div>
