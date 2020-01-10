<div id="IssuesAdminEdit">
    <?php echo $this->Form->create('Issue', array('type' => 'file')); ?>
    <div class="Issues form">
        <fieldset>
            <legend><?php
                echo __('Edit 案件', true);
                ?></legend>
            <?php
            echo $this->Form->input('Issue.id');
            echo $this->Form->input('Issue.fid', array(
                'label' => '判決字號',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.date', array(
                'label' => '日期',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Issue.round', array(
                'label' => '批次',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </fieldset>
    </div>
            <?php
            echo $this->Form->end(__('Submit', true));
            ?>
</div>