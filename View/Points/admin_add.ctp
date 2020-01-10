<div id="PointsAdminAdd">
        <?php
    $url = array();
    if (!empty($foreignId) && !empty($foreignModel)) {
        $url = array('action' => 'add', $foreignModel, $foreignId);
    } else {
        $url = array('action' => 'add');
        $foreignModel = '';
    }
    echo $this->Form->create('Point', array('type' => 'file', 'url' => $url));
    ?>
    <div class="Points form">
        <fieldset>
            <legend><?php
                echo __('Add 點', true);
                ?></legend>
            <?php
            foreach ($belongsToModels AS $key => $model) {
                echo $this->Form->input('Point.' . $model['foreignKey'], array(
                    'type' => 'select',
                    'label' => $model['label'],
                    'options' => $$key,
                    'div' => 'form-group',
                    'class' => 'form-control',
                ));
            }
            echo $this->Form->input('Point.city', array(
                'label' => '縣市',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.town', array(
                'label' => '鄉鎮市區',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.cunli', array(
                'label' => '村里',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.year', array(
                'label' => '年度',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.title', array(
                'label' => '公職名稱',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.candidate', array(
                'label' => '候選人',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.money', array(
                'label' => '每票單價',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.sess_id', array(
                'label' => '連線代碼',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            echo $this->Form->input('Point.modified', array(
                'label' => '更新時間',
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