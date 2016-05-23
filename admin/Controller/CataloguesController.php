<?php

/**
 * Description of CataloguesController
 * @author : Trung Tong
 * @since 12-10-2012
 */
class CataloguesController extends AppController {

    public $name = 'Catalogues';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * List all catalogues
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    public function index($id = null) {
        $Catalogue = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.parent_id' => $id
            ),
            'order' => array('Catalogue. pos ASC', 'Catalogue.modified DESC')
            ));
        $this->set('Catalogue', $Catalogue);

        // List for combo box
        $list_cat = $this->Catalogue->generateTreeList(null, null, null, '-- ');

        // set ID
        $this->set('catId', $id);
        $this->set(compact('list_cat'));
    }

    /**
     * add catalogues
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function add($id = null) {
        if (!empty($this->request->data)) {            

            $this->Catalogue->create();
            $data = $this->request->data;
            $data['Catalogue']['parent_id'] = $data['Catalogue']['catId'];
            if ($this->Catalogue->save($data['Catalogue'])) {
                $this->redirect('/catalogues/index/' . $data['Catalogue']['catId']);
                exit;
            }
        }
        $this->set('tendm', $this->Catalogue->read(null, $id));
        $list_cat = $this->Catalogue->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        $this->set('catId', $id);
    }

    /**
     * editl catalogues
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function edit($id = null) {
        $this->Catalogue->setLanguage('vie', 'eng');
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($this->Catalogue->save($data['Catalogue'])) {
                $this->redirect('/catalogues/index/' . $data['Catalogue']['catId']);
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Catalogue->read(null, $id);
        }
        $list_cat = $this->Catalogue->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));

        // Edit ting viet
        $this->Catalogue->setLanguage('vie');
        $edit_vie = $this->Catalogue->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
        $this->Catalogue->setLanguage('eng');
        $edit_eng = $this->Catalogue->findById($id);
        $this->set('edit_eng', $edit_eng);
    }

    /**
     * delete catalogues
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại danh mục này', true));
            $this->redirect($this->referer());
        }
        if ($this->Catalogue->delete($id)) {
            $this->redirect($this->referer());
        }
        $this->redirect($this->referer());
    }

    /**
     * Change position
     * @author Trung -Tong
     */
	  function changepos() {

        $vitri = $_REQUEST['order'];

        $display = $_REQUEST['display'];


        foreach ($vitri as $k => $v) {

			if($v == "") {

				$v = null;

			}

            $this->Catalogue->updateAll(

                array(

                'Catalogue.pos' => $v,

                'Catalogue.display' => $display[$k],
             

                ), array(

                'Catalogue.id' => $k)

            );

        }

        if($this->Session->check('pageproduct')) {

			$this->redirect($this->Session->read('pageproduct'));

			exit;

		} else {

			$this->redirect('/catalogues');

			exit;

		}

    }



    function changepos11() {
        $vitri = $_REQUEST['order'];
        // Update order
        foreach ($vitri as $k => $v) {
            $this->Catalogue->updateAll(array('Catalogue.pos' => $v), array('Catalogue.id' => $k));
        }
        $this->redirect($this->referer());
    }

    //close danh muc
    function close($id = null) {
        $this->Catalogue->id = $id;
        $this->Catalogue->saveField('status', 0);
        $this->redirect($this->referer());
    }

    // active danh muc
    function active($id = null) {
        $this->Catalogue->id = $id;
        $this->Catalogue->saveField('status', 1);
        $this->redirect($this->referer());
    }

}