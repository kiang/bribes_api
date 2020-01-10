<div id="IssuesView">
    <h3><?php echo __('View 案件', true); ?></h3><hr />
    <div class="col-md-12">

        <div class="col-md-2">判決字號</div>
        <div class="col-md-9"><?php
            if ($this->data['Issue']['fid']) {

                echo $this->data['Issue']['fid'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">日期</div>
        <div class="col-md-9"><?php
            if ($this->data['Issue']['date']) {

                echo $this->data['Issue']['date'];
            }
?>&nbsp;
        </div>
        <div class="col-md-2">批次</div>
        <div class="col-md-9"><?php
            if ($this->data['Issue']['round']) {

                echo $this->data['Issue']['round'];
            }
?>&nbsp;
        </div>
    </div>
    <div class="btn-group">
        <?php echo $this->Html->link(__('案件 List', true), array('action' => 'index'), array('class' => 'btn btn-default')); ?>
        <?php echo $this->Html->link(__('View Related 點', true), array('controller' => 'points', 'action' => 'index', 'Issue', $this->data['Issue']['id']), array('class' => 'btn btn-default IssuesAdminViewControl')); ?>
    </div>
    <div id="IssuesViewPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.IssuesViewControl').click(function () {
                $('#IssuesViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>