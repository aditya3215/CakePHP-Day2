<div class="main-content">
<div class="page-content">
    <div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Add Article</h4>
            <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                <a href="javascript: void(0);">Home</a>
                </li>
                <li class="breadcrumb-item">
                <a href="javascript: void(0);">Article</a>
                </li>
                <li class="breadcrumb-item active">Add Article</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <?php echo $this->Form->create('Article',['novalidate' => true]); ?>
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                    <?php 
                    echo $this->Form->input('Article.category_id', array(
                        'type' => 'select',
                        'options' => $categories,
                        'class' => 'form-control',
                        'empty' => 'Select a Category',
                        'label' =>['text' => 'Category', 'class' => 'form-label']
                    ));
                    ?>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <?php
                            echo $this->Form->input('articles_name', [
                                'label' => ['text' => 'Article Name', 'class' => 'form-label'],
                                'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => '',
                                'required' => true,
                                'data-rule-mandatory' => 'true',
                            ]);
                        ?>
                    </div>
                </div>

                <div class="w-100"></div>

                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                    <?php 
                        echo $this->Form->input('articles_description', [
                            'label' => ['text' => 'Article Description<em>*</em>', 'class' => 'form-label'],
                            'type' => 'textarea',
                            'rows' => 4,
                            'class' => 'form-control',
                            'placeholder' => '',
                            'required' => true,
                            'data-rule-mandatory' => 'true',
                        ]);
                    ?>
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-lg-6 col-md-6 mt-4 text-right">
                    <?php echo $this->Form->end(array(
                        'label' => 'Submit',
                        'class' => 'btn btn-primary mb-2 mt-1',
                        'div' => false
                    )); ?>
                    <button style="background-color: white; color: white;" class="btn btn-secondary ml-2 mb-2 mt-1">
                        <?php echo $this->Html->link(
                            'Cancel',
                            array('action' => 'listarticle'));
                        ?>
                    </button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>

    <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>