
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
        <!-- start page title -->
        <?php echo $this->Flash->render(); ?>
        <div class="row">
            <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Category</h4>
                <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                    <?php echo $this->Html->link('Home', array('controller' => 'Category', 'action' => 'index')); ?>
                    </li>
                    <li class="breadcrumb-item">
                    <?php echo $this->Html->link('Category', array('controller' => 'Category', 'action' => 'listcategory')); ?>
                    </li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <?php echo $this->Form->create('Category',['novalidate' => true,'class' => 'sample']); ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <?php echo $this->Form->input('categories_name',array(
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'id' => 'FirstName',
                                            'placeholder' => '',
                                            'data-rule-mandatory' => 'true'));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <?php echo $this->Form->input('categories_slug',array(
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'id' => 'FirstName',
                                            'placeholder' => '',
                                            'data-rule-mandatory' => 'true'));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <?php   echo $this->Form->input('status', [
                                            'type' => 'select',
                                            'class' => 'form-control',
                                            'options' => [
                                                'Active' => 'Active',
                                                'Inactive' => 'Inactive'
                                            ],
                                            'data-rule-mandatory' => 'true',
                                            'default' => $this->request->data['Category']['status'] // Set the default value
                                        ]);
                                        echo $this->Form->input('id', array('type' => 'hidden'));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mt-4 text-right">
                            <?php echo $this->Form->end(array(
                                'label' => 'Submit',
                                'class' => 'btn btn-primary mb-2 mt-1',
                                'div' => false
                            )); ?>
                            <button style="background-color: white; color: white;" class="btn btn-secondary ml-2 mb-2 mt-1">
                                <?php echo $this->Html->link(
                                    'Cancel',
                                    array('action' => 'listcategory'));
                                ?>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
