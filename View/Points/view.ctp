<div id="PointsView">
    <h3><?php echo __('View 點', true); ?></h3><hr />
    <div class="col-md-12">
        <div class="col-md-2">案件</div>
        <div class="col-md-9"><?php
if (empty($this->data['Issue']['id'])) {
    echo '--';
} else {
    echo $this->Html->link($this->data['Issue']['id'], array(
        'controller' => 'issues',
        'action' => 'view',
        $this->data['Issue']['id']
    ));
}
?></div>

        <div class="col-md-2">縣市</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['city']) {

                echo $this->data['Point']['city'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">鄉鎮市區</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['town']) {

                echo $this->data['Point']['town'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">村里</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['cunli']) {

                echo $this->data['Point']['cunli'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">年度</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['year']) {

                echo $this->data['Point']['year'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">公職名稱</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['title']) {

                echo $this->data['Point']['title'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">候選人</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['candidate']) {

                echo $this->data['Point']['candidate'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">每票單價</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['money']) {

                echo $this->data['Point']['money'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">連線代碼</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['sess_id']) {

                echo $this->data['Point']['sess_id'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">更新時間</div>
        <div class="col-md-9"><?php
            if ($this->data['Point']['modified']) {

                echo $this->data['Point']['modified'];
            }
?>&nbsp;
        </div>
    </div>
    <div class="btn-group">
        <?php echo $this->Html->link(__('點 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
    </div>
    <div id="PointsViewPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.PointsViewControl').click(function () {
                $('#PointsViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>