<div id="PointsIndex">
    <h2><?php echo __('點', true); ?></h2>
    <div class="btn-group">
    </div>
    <p>
        <?php
        $url = array();

        if (!empty($foreignId) && !empty($foreignModel)) {
            $url = array($foreignModel, $foreignId);
        }

        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></p>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="PointsIndexTable">
        <thead>
            <tr>
                <?php if (empty($scope['Point.Issue_id'])): ?>
                <th><?php echo $this->Paginator->sort('Point.Issue_id', '案件', array('url' => $url)); ?></th>
                <?php endif; ?>

                <th><?php echo $this->Paginator->sort('Point.city', '縣市', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.town', '鄉鎮市區', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.cunli', '村里', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.year', '年度', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.title', '公職名稱', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.candidate', '候選人', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.money', '每票單價', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.sess_id', '連線代碼', array('url' => $url)); ?></th>
                <th><?php echo $this->Paginator->sort('Point.modified', '更新時間', array('url' => $url)); ?></th>
                <th class="actions"><?php echo __('Action', true); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($items as $item) {
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
            <tr<?php echo $class; ?>>
                    <?php if (empty($scope['Point.Issue_id'])): ?>
                <td><?php
                if (empty($item['Issue']['id'])) {
                    echo '--';
                } else {
                    echo $this->Html->link($item['Issue']['id'], array(
                        'controller' => 'issues',
                        'action' => 'view',
                        $item['Issue']['id']
                    ));
                }
                        ?></td>
                    <?php endif; ?>

                <td><?php
                    echo $item['Point']['city'];
                    ?></td>
                <td><?php
                    echo $item['Point']['town'];
                    ?></td>
                <td><?php
                    echo $item['Point']['cunli'];
                    ?></td>
                <td><?php
                    echo $item['Point']['year'];
                    ?></td>
                <td><?php
                    echo $item['Point']['title'];
                    ?></td>
                <td><?php
                    echo $item['Point']['candidate'];
                    ?></td>
                <td><?php
                    echo $item['Point']['money'];
                    ?></td>
                <td><?php
                    echo $item['Point']['sess_id'];
                    ?></td>
                <td><?php
                    echo $item['Point']['modified'];
                    ?></td>
                <td>
                    <div class="btn-group">
                            <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Point']['id']), array('class' => 'btn btn-default PointsIndexControl')); ?>
                    </div>
                </td>
            </tr>
            <?php }; // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="PointsIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('#PointsIndexTable th a, div.paging a, a.PointsIndexControl').click(function () {
                $('#PointsIndex').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>