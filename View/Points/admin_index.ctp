<?php

if (!isset($url)) {
    $url = array();
}

if (!empty($foreignId) && !empty($foreignModel)) {
    $url = array($foreignModel, $foreignId);
}
?>
<div id="PointsAdminIndex">
    <h2><?php echo __('點', true); ?></h2>
    <div class="btn-group">
        <?php echo $this->Html->link(__('Add', true), array_merge($url, array('action' => 'add')), array('class' => 'btn btn-default dialogControl')); ?>
    </div>
    <div><?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table class="table table-bordered" id="PointsAdminIndexTable">
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
                    echo $this->Html->link($item['Issue']['fid'], 'https://law.judicial.gov.tw/FJUD/data.aspx?ty=JD&id=' . urlencode($item['Issue']['fid']), array('target' => '_blank'));
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
                    echo $item['Point']['modified'];
                    ?></td>
                <td>
                    <div class="btn-group">
                                <?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Point']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['Point']['id']), array('class' => 'btn btn-default dialogControl')); ?>
                                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Point']['id']), array('class' => 'btn btn-default'), __('Delete the item, sure?', true)); ?>
                    </div>
                </td>
            </tr>
            <?php } // End of foreach ($items as $item) {  ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <div id="PointsAdminIndexPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
        });
        //]]>
    </script>
</div>