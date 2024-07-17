<div class="main-content">
<div class="page-content">
    <div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
        <div
            class="page-title-box d-flex align-items-center justify-content-between"
        >
            <h4 class="mb-0 font-size-18">Category List</h4>

            <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                <a href="javascript: void(0);">Home</a>
                </li>
                <li class="breadcrumb-item active">Category</li>
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
            <div class="TableHeader">
                <div class="row">
                <div class="col-lg-3">
                    <h4 class="card-title">Category</h4>
                </div>
                <div class="col-lg-9 text-right">
                    <div class="headerButtons">
                    <?php 
                        echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'mdi mdi-plus')) . ' Add Category',
                            array('controller' => 'category', 'action' => 'addcategory'),
                            array('class' => 'btn btn-sm btn-success', 'escape' => false)
                        );
                        
                    ?>
                    </div>
                </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 listingData dt-responsive" id="datatable">
                <thead>
                    <tr>
                    <th>S. No.</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Category as $key=>$cat):?>
                    <tr>
                        <th scope="row"><?php echo $key+1; ?></th>
                        <td><?php echo $cat['Category']['id']?></td>
                        <td><?php echo $cat['Category']['categories_name']?></td>
                        <td>
                            <span class="badge badge-pill badge-<?php echo $cat['Category']['status']==="Active"?'success':'danger' ?>"><?php echo $cat['Category']['status']?></span>
                        </td>
                        <td>
                        <?php
                            echo $this->Html->Link(
                                'Edit',
                                array('action' => 'editCategory', $cat['Category']['id'])
                            );
                        ?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>

            <div class="row pt-3">
                <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                    Showing 1 to 5 of 5 entries
                </div>
                </div>
                <div class="col-sm-12 col-md-7 dataTables_wrapper">
                <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                    <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="datatable_previous">
                        <a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                    </li>
                    <li class="paginate_button page-item active">
                        <a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                    </li>
                    <li class="paginate_button page-item next disabled" id="datatable_next">
                        <a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
