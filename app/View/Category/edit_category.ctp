<!-- <h1>Edit Category</h1> -->
<?php
// echo $this->Form->create('Category');
// echo $this->Form->input('categories_name');
// echo $this->Form->input('categories_slug');
// echo $this->Form->input('status');
// echo $this->Form->input('id', array('type' => 'hidden'));
// echo $this->Form->end('Save Post');
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Category</h4>
                <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                    <a href="javascript: void(0);">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                    <a href="javascript: void(0);">Category</a>
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
                    <?php echo $this->Form->create('Category'); ?>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
