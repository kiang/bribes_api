<?php

class IssueShell extends AppShell {

    public $uses = array('Issue');

    public function main() {
        $pool = $this->Issue->find('list', array(
            'fields' => array('fid', 'fid'),
        ));
        foreach (glob('/home/kiang/public_html/judicial/case/*.json') AS $jsonFile) {
            $json = json_decode(file_get_contents($jsonFile));
            if (!isset($pool[$json->id])) {
                $parts = explode(',', $json->id);
                $this->Issue->create();
                $this->Issue->save(array('Issue' => array(
                        'fid' => $json->id,
                        'date' => implode('-', array(
                            substr($parts[4], 0, 4),
                            substr($parts[4], 4, 2),
                            substr($parts[4], 6, 2),
                        )),
                        'round' => 0,
                )));
            }
        }
    }

}
